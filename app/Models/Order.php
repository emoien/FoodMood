<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

     protected $guarded = [];


    public function products()
    {
        return $this->belongsToMany(Product::class,'order_product')->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {

        $status = [ 
            0 => 'Order Placed',
            1 => 'Delivered',
            2 => 'Cancelled'
        ];

        return $status[$this->status];
    }
}
