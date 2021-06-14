<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ChefRegister;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChefRequest;

class BecomeChefController extends Controller
{
    public function __invoke(Request $request)
    {



        if(auth()->user())
        {
            $request->validate([
            'message' => ['required', 'min:5']
        ]);

        } else{

        $request->validate([
            'name' => ['required', 'string'],
            'message' => ['required', 'min:5'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        }

        $chefRegister = ChefRegister::create([
            'name' => auth()->user() ? auth()->user()->username() : $request->name,
            'message' => $request->message,
            'phone' => auth()->user() ? auth()->user()->phone : $request->phone,
            'email' => auth()->user() ? auth()->user()->email : $request->email,
           
            

        ]);

        Mail::to('foodmood@gmail.com')->send(new ChefRequest($chefRegister));

        return redirect()->route('upgrade')->with('message','Thank You, We will contact you soon');
    }

    
}
