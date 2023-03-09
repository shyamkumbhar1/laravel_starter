<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login (Request $request){

        $data = $request->input('userName');
        echo "<br>";
      $request->session()->put("userName",$data);   // set session

      print_r($request->session()->pull('userName'));    // access session
      print_r($request->session()->forget('userName'));    // delete single  session
      print_r($request->session()->flush());    // delete All session
    //   return redirect('home');

    }
}
