<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Enquiry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {

        return $this->belongsto(User::class);
    }


    public function readBy()
    {
        return is_null($this->user_id) ? 'Unread Message' : $this->user->username();
    }
}
