<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductsController extends Controller
{
    public function __invoke(Category $category)
    {
       return view('frontend.productList',[
           'productList' => $category->load('products')
       ]);
    }
}
