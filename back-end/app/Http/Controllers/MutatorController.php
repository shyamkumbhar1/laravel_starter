<?php
// https://dev.to/dalelantowork/laravel-8-accessors-and-mutators-4d8m
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutator;

class MutatorController extends Controller
{
    public function setProduct()
    {
        // return "test";
        $product = new Mutator();

        $product->name = "Sample Product 12";
        $product->amount = 122;
        $product->description = "Sample product created nnn";

        $product->save();
        return response()->json([
            'status' => true,
            'message' => 'Data Save Sucessfully'
        ]);
    }

    public function getProducts()
    {
        $products = Mutator::get();

        foreach ($products as $product) {

            echo $product->name . "<br/>";
        }
    }
}
