<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ammount',
        'discription',
    ];

  // Mutator for Name column
    // when "name" will save, it will convert into lowercase
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    
    //accesor
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }
}
