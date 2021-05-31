<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesList extends Controller
{
    public function __invoke(){
        
        return view('frontend.categoriesList',[
            'categories' => Category::active()->get()
        ]);
    }
}
