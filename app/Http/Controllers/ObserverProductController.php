<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product2;

class ObserverProductController extends Controller
{
    public function index (){
        $product2 = Product2::create([
            'name' => 'Platinum 1',
            'price' => 10
        ]);
        dd($product2);
    }
}
