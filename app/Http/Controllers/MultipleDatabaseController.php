<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Color;

class MultipleDatabaseController extends Controller
{
    public function Multiple (){
    //    $result = DB::Connection('mysql2')->table('colors')->select('*')->get(); // Color table is available on onother table
       $result = Color::all();
        return $result;
    }
}
