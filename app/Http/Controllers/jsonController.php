<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jsonController extends Controller
{

    public function AllFlights()
    {
        $file_path = 'G:\laragon-6.0.0\www\Laravel\Full-Stack\Backend\UI_Assignment_Flight_Data.json';
        if (file_exists($file_path)) {
            $filename = $file_path;
            $data = file_get_contents($filename); //data read from json file
            $flights = json_decode($data, true);  //decode a data            

            return view('AllFlights')->with('flights', $flights);
        } else {
            echo "JSON file Not found";
        }
    }
    public function search($array, $search_list)
    {
        $result = array();
        foreach ($array as $key => $value) {
            foreach ($search_list as $k => $v) {
                if (!isset($value[$k]) || $value[$k] != $v) {
                    continue 2;
                }
            }
            $result[] = $value;
        }
        return $result;
    }


    public function SearchFlight(Request $request)
    {
        $file_path = 'G:\laragon-6.0.0\www\Laravel\Full-Stack\Backend\UI_Assignment_Flight_Data.json';
        if (file_exists($file_path)) {
            $filename = $file_path;
            $data = file_get_contents($filename); //data read from json file
            $flights = json_decode($data, true);  //decode a data   

            // Find Flights
            $search_items = $request->all();
            $search_flights = jsonController::search($flights, $search_items);
            print_r($search_flights);
            
            return view('SearchFlight')->with('flights', $search_flights);
        }
    }
}
