<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    const CHEF = 3;

    public function __invoke()
    {
        if(count(cart()->items())){

            return redirect()->route('cart.continue.shopping')->with('message', 'More Products By Chef.');
        }


        return view('frontend.home',[
            'categories' => Category::active()->get(),
            'products' => Product::active()->latest()->take(10)->get(),
            'chefs' => User::active()->whereRole(self::CHEF)->get()
        ]);
    }
}
