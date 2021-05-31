<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsList extends Controller
{
    public function __invoke(){

        if(count(cart()->items())){
            $productId = cart()->items()[0]['modelId'];

            $product = Product::find($productId);
        
            $products = Product::with('user')->where('status', $product->status)->where('user_id', $product->user_id)->paginate(10);       
         }
        
        else {
            $products =  Product::with('user')->active()->paginate(20);
        }
        
        return view('frontend.allProducts',[
            'products' =>$products

        ]);
    }
}
