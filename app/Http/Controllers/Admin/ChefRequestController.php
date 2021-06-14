<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChefRegister;

class ChefRequestController extends Controller
{
    public function index()
    {
        return view('admin.chefRequest.index',[
            'chefRegisters' => ChefRegister::paginate(10)

        ]);
    }


    public function show(Request $request)
    {


       $chefRegister = ChefRegister::find($request->id);

        if (is_null($chefRegister->user_id)) {
            $chefRegister->update(['user_id' => auth()->id()]);
        }

        return view('admin.chefRequest.view',[
            'chefRegister' => $chefRegister
        ]);
    }
}
