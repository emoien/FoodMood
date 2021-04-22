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
   

    


}
