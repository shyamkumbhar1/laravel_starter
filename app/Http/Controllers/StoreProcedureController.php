<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreProcedureController extends Controller
{
    public function StoreProcedure (){
        $Param1 = 1;
        $Param2 = 1;
        $result = DB::select("call All_user($Param1,$Param2);");
       dd($result);
    }
}
