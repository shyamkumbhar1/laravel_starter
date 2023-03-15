<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CollectionController extends Controller
{
    public function index()
    {
        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
            return strtoupper($name);
        })->reject(function ($name) {
            return empty($name);
        });
        dd($collection);
    }
    public function FetchUser()
    {
        $user = User::where('id', '=', '5')->get();
        dd($user->all());
    }

    public function  Ex1()
    {
        $collection = collect([1, 2, 3, 4, 5]);

        $multiplied = $collection->map(function ($item, $key) {
            return $item * 2;
        });

        $multiplied->all();
    }
}
