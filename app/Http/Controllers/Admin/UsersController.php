<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;




class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
        if(auth()->user()->isAdminOrStaff())
        {
            $users = User::all();
        }else{
            $users = User::where('id',auth()->user()->id)->get();
        }
        return view('admin.users.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'role' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']
            
        ]);

         User::create([
            
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now(),
            'phone' => $request->phone,
            'role' => $request->role,
            'image' => $this->uploadImage($request->image)
        ]);

    
        return redirect()->route('users.index')->with('success', 'User created Success');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.view', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'password' => ['nullable', 'min:8'],
            'phone' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048']

            
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->image = $this->uploadImage($request->image, $user->image);

        if (isset($request->password)) {
            $user->password = bcrypt($request->password);
        }
        
        if (auth()->user()->isAdmin()) {
            $user->status = $user->id == 1 ? 1 : $request->status;
            $user->role = $request->role;
        }
        $user->save();


        if(auth()->id() == $user->id){
            return redirect()->route('dashboard')->with('success', 'User Updated Success');


        }
        return redirect()->route('users.index')->with('success', 'User Updated Success');

    }   


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id==1) {
            return redirect()->route('users.index')->with('deleted', 'User cannot be deleted');
        } 

        if (auth()->user()->isAdmin()) {
            Storage::disk('public')->delete('user_image/' .$user->image);
            Storage::disk('public')->delete('thumb/' . $user->image);

            $user->delete();
            return redirect()->route('users.index')->with('deleted', 'User Deleted Success');
        }
        return redirect()->route('users.index')->with('deleted', 'User cannot be deleted');

        
       

    }

    private function uploadImage($image, $imagePath = Null)
    {

        if (isset($image)) {

            if (isset($imagePath)) {
                Storage::disk('public')->delete('user_image/' . $imagePath);
                Storage::disk('public')->delete('thumb/' . $imagePath);
            }

            $currentdate = Carbon::now()->toDateString();
            $imagename = $currentdate . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('user_image')) {
                Storage::disk('public')->makeDirectory('user_image');
            }
            $mainImage = Image::make($image)->stream();

            if (!Storage::disk('public')->exists('thumb')) {
                Storage::disk('public')->makeDirectory('thumb');
            }

            $thumb = Image::make($image)->resize(100, 100)->stream();

            Storage::disk('public')->put('thumb/' . $imagename, $thumb);
            Storage::disk('public')->put('user_image/' . $imagename, $mainImage);


             return $imagename;
        } else {
            return $imagePath;
        }


    }
}
