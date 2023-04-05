<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function test_helper_collection (){
        return collect(['john', 'doe', null])->map(function ($test_name) {
            return strtoupper($test_name);
        })->reject(function ($test_name) {
            return empty($test_name);
        });
    }
    
    public function collection(){
        $my_test_array=['john','doe'];
        return new Collection($my_test_array);
    }

    public function test_collection_instance(){
        $my_test_array=['john','doe'];
        return collect($my_test_array);
    }
}
