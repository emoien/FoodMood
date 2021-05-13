<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryProductsController extends Controller
{
    public function index(Category $category)
    {
        dd($category);

    }
}
