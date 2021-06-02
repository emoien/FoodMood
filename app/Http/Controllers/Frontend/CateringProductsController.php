<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CateringProductsController extends Controller
{
    public function __invoke(){

        if(count(cart()->items())){
            $productId = cart()->items()[0]['modelId'];

            $product = Product::find($productId);

            if($product->status != '2'){
                return redirect()->route('cart.continue.shopping')->with('message','Catering is not available with this order.');
            }
        
            $products = Product::where('status', 2)->where('user_id', $product->user_id)->paginate(10);       
         }
         else {

            $products = Product::where('status', 2)->get(); }

        return view('frontend.allProducts',[
            'products' => $products
        ]);
    }

}
