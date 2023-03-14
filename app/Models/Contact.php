<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'phone',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post (){
        return  $this->belongsTo(Post::class);
     }
}

