<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function status()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }


    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function products()
    {
        return $this->HasMany(Product::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status',1);
    }

    public function getThumbImage()
    {
        return $this->image ? url('storage/thumb/' . $this->image) : '/images/logo.png';
    }


    public function getImage()
    {
        return url('storage/images/' . $this->image);
    }


}
