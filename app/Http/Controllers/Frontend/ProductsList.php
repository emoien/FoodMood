<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsList extends Controller
{
    public function __invoke(){
        return view('frontend.allProducts',[
            'products' => Product::active()->paginate(20)
        ]);
    }
}
