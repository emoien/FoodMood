<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;



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
            'role' => ['required']
            
        ]);

         User::create([
            
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now(),
            'phone' => $request->phone,
            'role' => $request->role
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
            'phone' => ['required']
            
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
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
            $user->delete();
            return redirect()->route('users.index')->with('deleted', 'User Deleted Success');
        }
        return redirect()->route('users.index')->with('deleted', 'User cannot be deleted');
    }
}
