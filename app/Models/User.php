<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'role',
        'status',
        'image'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        User::creating(function ($model) {
            $userId = User::latest()->first() ? User::latest()->first()->id : 0; 
            $model->slug = Str::slug($model->first_name) . '-' . ($userId + 1);
        });
        //latest sorts in descending order from id
    }


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function userRole()
    {
        $roles = [
            0 => 'User',
            1 => 'Admin',
            2 => 'Staff',
            3 => 'Chef'
        ];

        return $roles[$this->role];
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getImage()
    {
        return url('storage/users/' . $this->image);
    }


}
