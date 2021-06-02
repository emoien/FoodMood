<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CateringProductsController extends Controller
{
    public function __invoke(){

        return view('frontend.allProducts',[
            'products' => Product::where('status', 2)->get()
        ]);
    }

}
