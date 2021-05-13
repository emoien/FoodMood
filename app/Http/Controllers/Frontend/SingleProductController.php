<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index(Product $product)
    {

        return view('frontend.singleProduct',[
            'product' => $product->load('images')
        ]);
    }


}
