<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChefProductsController extends Controller
{
    public function index(User $user)
    {
        dd($user);

    }
}
