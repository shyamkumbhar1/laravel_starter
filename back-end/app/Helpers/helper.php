<?php 

use App\Models\Product;

function messaage ($msg){
    // return "hello";
    return $msg;
}
function index()
{
    $products = Product::latest()->paginate(5);

 
}


?>