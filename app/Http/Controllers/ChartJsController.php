<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartJsController extends Controller
{
    public function pieChart(){
       $result = DB::select(DB::raw('SELECT COUNT(*) as total_city , city  FROM users GROUP BY city'));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .="['".$list->city ."',  " .$list->total_city ."],"; 
            // ['Work',     11],
        }
        $arr['chartData'] = rtrim($chartData,",");
      
              
        return view('pai_chart',$arr);
    }

    public function barChart (){
        $result = DB::select(DB::raw('SELECT COUNT(*) as total_city , city  FROM users GROUP BY city'));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .="['".$list->city ."',  " .$list->total_city ."],"; 
          
        }
        $arr['chartData'] = rtrim($chartData,",");
        return view('bar_chart',$arr);
    }
    public function lineChart (){
        $result = DB::select(DB::raw('SELECT COUNT(*) as total_city , city  FROM users GROUP BY city'));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .="['".$list->city ."',  " .$list->total_city ."],"; 
          
        }
        $arr['chartData'] = rtrim($chartData,",");
        return view('line_chart',$arr);
    }
}
