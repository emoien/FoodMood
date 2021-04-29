<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function status()
  {
      return $this->status == 1 ? 'Active' : 'Inactive';
  }

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

    public function getCoverThumb()
    {
        return url('storage/thumb/' . $this->cover);
    }

}
