<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class xmlApiController extends Controller
{
    public function getProducts()
    {
        $products = DB::table('countries')->get();

        $xml = new \SimpleXMLElement('<products/>');
        foreach ($products as $product) {
            $product_xml = $xml->addChild('product');
            $product_xml->addChild('id', $product->id);
            $product_xml->addChild('name', $product->name);
           
        }
        return response($xml->asXML(), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    
}
