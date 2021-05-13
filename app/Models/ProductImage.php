<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function thumbPath()
    {
        return url('storage/products/images/thumb/' . $this->path);
    }

    public function path()
    {
        return url('storage/products/images/' . $this->path);
    }
}
