<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
 
}
