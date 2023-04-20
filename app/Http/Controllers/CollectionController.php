<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


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

    public function inMemoryDatabases(){
       
   // Create an empty collection
$users = new Collection();

$users = new Collection([
    [
        "id" => "1",
        "name" => "John Smith",
        "email" => "john.smith@example.com",
        "age" => 30,
        "gender" => "male"
    ],
    [
        "id" => "2",
        "name" => "Sarah Johnson",
        "email" => "sarah.johnson@example.com",
        "age" => 25,
        "gender" => "female"
    ],
  
]);

// Sample code to retrieve a user from the in-memory database
$user = $users->where("id", "1")->first();
echo $user["name"]; // Output: John Smith

    }
}
