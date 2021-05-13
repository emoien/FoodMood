<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChefProductsController extends Controller
{
    public function __invoke(User $user)
    {
        return view('frontend.productList',[
            'productList' => $user->load('products')
        ]);

    }
}
