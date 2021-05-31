<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ContinueShoppingController extends Controller
{

    public function __invoke()
    {
        if(!count(cart()->items())){

            return redirect()->route('welcome')->with('message','No items in Cart');
        }

        $productId = cart()->items()[0]['modelId'];

        $product = Product::find($productId);
    
        $products = Product::where('status', $product->status)->where('user_id', $product->user_id)->get();

        return view('frontend.allProducts',[
            'products' => $products
        ]);

    }
}
