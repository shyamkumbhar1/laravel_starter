<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;

class RestApiController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function store(Request $request)
    {
        $country = new Country();
        $country->name = $request->input('name');
        $country->save();
        return response()->json($country, 201);
    }

    public function show($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }
        return response()->json($country);
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }
        $country->name = $request->input('name');
        // $country->code = $request->input('code');
        $country->save();
        return response()->json($country);
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['message' => 'Country not found'], 404);
        }
        $country->delete();
        return response()->json(['message' => 'Country deleted']);
    }
}

