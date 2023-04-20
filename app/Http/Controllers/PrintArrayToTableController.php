<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PrintArrayToTableController extends Controller
{
    public function index(){
        $result =DB::table('countries')->get();
        // $data = $result->all();
        $data = $result->toArray();
        return view('arrayData',['data'=>$data]);
    }
}
