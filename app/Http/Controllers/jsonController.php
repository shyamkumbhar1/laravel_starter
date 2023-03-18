<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jsonController extends Controller
{
    public function getData()
    {
        $file_path = 'G:\laragon-6.0.0\www\Laravel\Full-Stack\Backend\UI_Assignment_Flight_Data.json';
        if (file_exists($file_path)) {
            $filename = $file_path;
            $data = file_get_contents($filename); //data read from json file
            // print_r($data);
            $users = json_decode($data);  //decode a data

            echo "<pre>";
            print_r($users); //array format data printing
          
        } else {
            echo "JSON file Not found";
        }
    }
}
