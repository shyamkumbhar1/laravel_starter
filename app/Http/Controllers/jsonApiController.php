<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class jsonApiController extends Controller
{
    public function getProducts()
{
    $response = DB::table('countries')->get();
    
$headers = ['Content-Type' => 'application/json'];
    return response()->json($response,200,$headers);
}

}
