<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;


class User extends Authenticatable  implements MustVerifyEmail
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
        'image',
        'slug',
        'email_verified_at'
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
           
            $model->slug = $model->slug($model->first_name);
        });
        
    }


    public function slug($name)
    {
        $slug = Str::slug($name);
        $count = User::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
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


    public function username()
    {
        return $this->first_name . ' ' . $this->last_name;

    
    }

    public function adminlte_image()
    
    {
        return $this->image ?  url('storage/users/' . $this->image) : url('images/logo.png');
    }

    public function adminlte_profile_url()
    {
        return route('users.edit', $this->id);
    }

    public function status()
    {
        return $this->status== 1 ? 'Active' : 'Inactive';
    }

    public function isAdmin()
    {
        return $this->role == 1;
    }

    public function isAdminOrStaff()
    {
        return $this->role == 1 || $this->role == 2; 
    }

}
