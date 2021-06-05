<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatus;
use App\Mail\UserRegistered;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {

        return view('frontend.checkout', [
            'items' => cart()->items(),
            'total' => cart()->getSubtotal(),
        ]);


    }

    public function store(Request $request)
    {

        if (auth()->user()) {

             $request->validate([
                    'city' => ['required'],
                    'add1' => ['required'],
                    'name' => ['required'],
                    'postcode' => ['required'],
                    'datetime' => ['required']
             ]);

             $user = User::find(auth()->id());

             $this->stripePayment($request, $user);

             return redirect()->route('thankyou')->with('message', 'Thank you! Your payment has been successfully accepted!');

        }else{

             $request->validate([
                    'first_name' => ['required','string'],
                    'last_name' => ['required','string'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'phone' => ['required'],  
                    'city' => ['required'],
                    'add1' => ['required'],
                    'name' => ['required'],
                    'postcode' => ['required'],
                    'datetime' => ['required']
             ]);

            $password = Str::random(10);

        
            $user = User::create([
            
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
            'email_verified_at' => Carbon::now(),
            'phone' => $request->phone,
            'role' => 0,
           
            ]);

             Mail::to($user->email)->send(new UserRegistered($user, $password));

            $this->stripePayment($request, $user);

             return redirect()->route('thankyou')->with('message', 'Thank you! Your payment has been successfully accepted!');


        }

         
    
    }


    private function stripePayment($request, $user)
    {

        try {
            $stripe = Stripe::charges()->create([
                'amount' => cart()->getSubtotal(),
                'currency' => 'AUD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $user->email,
            ]);

            $this->addToOrdersTables($request, $stripe, $user);

             cart()->clear();

            return redirect()->route('thankyou')->with('success', 'Thank you! Your payment has been successfully accepted!');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }



private function addToOrdersTables($request, $stripe , $user)
{

  $order = Order::create([
            'user_id' =>  $user->id,
            'name' => $request->name,
            'billing_address1' => $request->add1,
            'billing_address2' => $request->add2,
            'billing_city' => $request->city,
            'charge_id' => $stripe['id'],
            'billing_postcode' => $request->postcode,
            'billing_total' =>  cart()->getSubtotal(),
            'note' => $request->note,
            'delivery_date' => $request->delivery_date,
            'quantity' => count(cart()->items()),
            'status' => '0',
            'delivery_date' => $request->datetime

        ]);
        Mail::to($user->email)->send(new OrderStatus($order));

        // Insert into order_product table
        foreach (cart()->items() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['modelId'],
                'quantity' => $item['quantity'],
            ]);
        }

        return $order;
    }
}
    

