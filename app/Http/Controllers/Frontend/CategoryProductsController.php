<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryProductsController extends Controller
{
    public function __invoke(Category $category)
    {
        if(count(cart()->items())){
            $productId = cart()->items()[0]['modelId'];

            $product = Product::find($productId);

            $products = Category::with(['products' => function($query) use($product){
                $query->where('category_id', $product->category_id)->where('status', $product->status)->where('user_id', $product->user_id)->paginate(10);
            }])->find($product->category_id);
            
        
         }
        
        else {
            $products =  $category->load('products');
        }

       return view('frontend.productList',[
           'productList' => $products
       ]);
    }
}
