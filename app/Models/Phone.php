<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User1;

class Phone extends Model
{
    use HasFactory;

    public function user1()
    {
        return $this->belongsTo('App\Models\User1');
    }
}
