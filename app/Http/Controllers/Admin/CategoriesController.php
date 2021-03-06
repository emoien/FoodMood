<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.categories.index',[
            'categories' => Category::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => ['required', 'min:5', 'max:256','unique:categories,name'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $this->slug($request->name),
            'image' => $this->uploadImage($request->image)
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.view', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'max:256','unique:categories,name,' . $category->id],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ]);

        $category->name = $request->name;
        $category->image = $this->uploadImage($request->image, $category->image);
        $category->status = $request->status;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category updated Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        if($category->products()->count())
        {
            return redirect()->route('categories.index')->with('deleted', 'Cannot delete Category. Product exists.'); 
        }

        Storage::disk('public')->delete('images/' .$category->image);
        Storage::disk('public')->delete('thumb/' . $category->image);
        $category->delete();

        return redirect()->route('categories.index')->with('deleted', 'Category Deleted Success');
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

    private function slug($name)
    {
        $slug = Str::slug($name);
        $count = Category::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }


}
