<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){
        return view('ajax');
    }
    public function handleAjaxRequest(Request $request){
        $myData = $request->input('my_name');
        $response = ['success' => true, 'data' => $myData];
        return response()->json($response);
    }
}
