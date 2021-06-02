<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {   
        if (count(cart()->items()) < 1) {
            return redirect()->route('welcome')->with('error', 'No Items in Cart, Please Add Before Processing');
        }
        return view('frontend.cartView',[
            'items' => cart()->items(),
            'total' => cart()->getSubtotal(),
        ]);
    }
    public function addToCart(Request $request)
    {
        $cart = Product::addToCart($request->product_id, $request->product_quantity);
        return redirect()->route('cart.view')->with('success', 'Product Added to Cart.') ;
    }


    public function incrementQuantity(Request $request)
    {
    
        cart()->incrementQuantityAt($request->index);
        return redirect()->route('cart.view')->with('success', 'Product Increased.') ;

    }

    public function decrementQuantity(Request $request)
    {
        if (count(cart()->items()) < 1) {
            return redirect()->route('welcome')->with('error', 'No Items in Cart, Please Add Before Processing');
        }
        cart()->decrementQuantityAt($request->index);
        return redirect()->route('cart.view')->with('success', 'Product Decreased.') ;

    }
}
