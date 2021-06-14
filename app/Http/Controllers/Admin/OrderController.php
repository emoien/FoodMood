<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class OrderController extends Controller
{
    public function index()
    {

        if (auth()->user()->role == 0 ) {
            $orders = Order::where('user_id', auth()->id())->paginate(10);
        }elseif(auth()->user()->role == 3){
            $orders = Order::where('chef_id', auth()->id())->paginate(10);
        }else{
            $orders = Order::paginate(10);
        }

        return view('admin.orders.index',[
        'orders' => $orders
        ]);


    }

    public function show(Request $request)
    {
        
        return view('admin.orders.view', [
            'order' => Order::with('products')->find($request->id)
        ]);
    }

    public function changeStatus(Request $request)
    {

        $order = Order::findOrFail($request->id);
        if($request->status == 2)
        {
              Stripe::refunds()->create($order->charge_id, $order->billing_total, ['reason' => 'requested_by_customer']);
        }
        $order->update(['status' => $request->status]);

        return redirect()->route('orders')->with('success', 'Order Status Changed!');
    }


}
