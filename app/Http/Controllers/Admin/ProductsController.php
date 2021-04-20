<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',[
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create',[
            'categories' => Category::where('status',1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'min:3', 'max:256'],
            'description' => ['required', 'min:5', 'max:256'],
            'price' => ['required', 'min:1', 'max:256',],
            'cover' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
           
        ]);
        Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'cover' => $this->uploadImage($request->cover),
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => auth()->id(),
            'category_id' => $request->categories_id 

        ]);

        return redirect()->route('products.index')->with('success', 'Product created Success');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::where('status',1)->get()        
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:256'],
            'description' => ['required', 'min:5', 'max:256'],
            'price' => ['required', 'min:1', 'max:256',],
            'cover' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
           
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->cover = $this->uploadImage($request->image, $product->cover);
        $product->status = $request->status;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    private function uploadImage($image, $imagePath = Null)
    {

        if (isset($image)) {

            if (isset($imagePath)) {
                Storage::disk('public')->delete('images/' . $imagePath);
                Storage::disk('public')->delete('thumb/' . $imagePath);
            }

            $currentdate = Carbon::now()->toDateString();
            $imagename = $currentdate . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('images')) {
                Storage::disk('public')->makeDirectory('images');
            }
            $mainImage = Image::make($image)->stream();

            if (!Storage::disk('public')->exists('thumb')) {
                Storage::disk('public')->makeDirectory('thumb');
            }

            $thumb = Image::make($image)->resize(100, 100)->stream();

            Storage::disk('public')->put('thumb/' . $imagename, $thumb);
            Storage::disk('public')->put('images/' . $imagename, $mainImage);


             return $imagename;
        } else {
            return $imagePath;
        }
        

    }
}
