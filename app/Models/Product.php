<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use Freshbitsweb\LaravelCartManager\Traits\Cartable;



class Product extends Model
{
    use HasFactory;
    use Cartable;

    protected $guarded = [];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status','!=', 0);
    }

    public function status()
    {
        $status = [
            0 => 'Inactive',
            1 => 'Active',
            2 => 'Catering',
           
        ];
        return $status[$this->status];
    }

    public function getCoverThumb()
    {
        return url('storage/thumb/' . $this->cover);
    }

    public function getCover()
    {
        return url('storage/images/' . $this->cover);
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    


}
