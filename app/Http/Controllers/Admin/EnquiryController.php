<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        return view('admin.enquiries.index',[
            'enquiries' => Enquiry::paginate(15)
        ]);
    }


    public function show(Request $request)
    {
        $enquiry = Enquiry::find($request->id);

        if (is_null($enquiry->user_id)) {
            $enquiry->update(['user_id' => auth()->id()]);
        }

        return view('admin.enquiries.view',[
            'enquiry' => $enquiry
        ]);
    }

}
