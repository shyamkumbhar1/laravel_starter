<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderToSql extends Controller
{
    public function index(Request $request){
        // Enable Query Log
    //     \DB::connection()->enableQueryLog();
    //    $query =  DB::table('posts')->select('*')->get();
    //    $queries = \DB::getQueryLog();
    //     print_r($queries);

        // Eloquent to Sql Convertion
    //    $query1 =  DB::table('posts')->select('*');
       
    $nominee_relationship = DB::table('relationship_mapping')
    ->where('nominee_relationship', 12)
    ->select('kjjd')
    ->first();
        print_r($nominee_relationship->toSql());
    }
}
