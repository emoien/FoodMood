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
use App\Models\ProductImage;

class ProductsController extends Controller
{

    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->paginate(10)
        ]);

    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::where('status', 1)->get()
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'min:3', 'max:256'],
            'description' => ['required', 'min:5', 'max:256'],
            'price' => ['required', 'min:1', 'max:256',],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ]);
        $product = Product::create([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'cover' => $this->uploadImage($request->cover),
            'description' => $request->description,
            'price' => $request->price,
            'user_id' => auth()->id(),
            'category_id' => $request->categories_id

        ]);

        $this->uploadImages($product, $request->images);

        return redirect()->route('products.index')->with('success', 'Product created Success');

    }

    public function show(Product $product)
    {


        return view('admin.products.view', [
            'product' => $product->load('category', 'user', 'images')
        ]);

    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::where('status', 1)->get()
        ]);
    }

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

        $this->uploadImages($product, $request->images);

        return redirect()->route('products.index')->with('success', 'Product updated Success');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete('images/' . $product->cover);
        Storage::disk('public')->delete('thumb/' . $product->cover);

        $product->images->each(function ($image) {
            $image->delete();
            Storage::disk('public')->delete('products/images/' . $image->path);
            Storage::disk('public')->delete('products/images/thumb/' . $image->path);
        });
        return redirect()->route('products.index')->with('deleted', 'Product Deleted Success');


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

    private function uploadImages($product, $images)
    {
        if (!empty($images)) {
            foreach ($images as $image) {
                if (request()->method() == 'PATCH') {
                    $product->images->each(function ($image) {
                        $image->delete();
                        Storage::disk('public')->delete('products/images/' . $image->path);
                        Storage::disk('public')->delete('products/images/thumb/' . $image->path);
                    });
                }
                $currentdate = Carbon::now()->toDateString();
                $imagename = $currentdate . uniqid() . '.' . $image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('products/images/')) {
                    Storage::disk('public')->makeDirectory('products/images/');
                }
                $coverimage = Image::make($image)->stream();

                if (!Storage::disk('public')->exists('products/images/thumb/')) {
                    Storage::disk('public')->makeDirectory('products/images/thumb/');
                }

                $thumb = Image::make($image)->resize(100, 100)->stream();

                Storage::disk('public')->put('products/images/thumb/' . $imagename, $thumb);
                Storage::disk('public')->put('products/images/' . $imagename, $coverimage);
                $product->images()->create(['path' => $imagename]);
            }
        }

    }

    private function slug($name)
    {
        $slug = Str::slug($name);
        $count = Product::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}


