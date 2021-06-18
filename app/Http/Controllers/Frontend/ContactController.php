<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Models\Enquiry;

class ContactController extends Controller
{
    public function __invoke(Request $request)
    {

        $request->validate([
            'name' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'message'=> ['required', 'min:5' ]
        ]);

     $enquiry = Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message'=>  $request->message
        ]);
        
         Mail::to('foodmood@gmail.com')->send(new ContactUs($enquiry));

         return redirect()->route('contact')->with('message','Thank You, We will contact you soon');

    }
}
