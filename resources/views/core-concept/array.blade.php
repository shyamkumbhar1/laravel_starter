<?php 
echo "<h1> All Array Function </h1>";

$array1 = ["Shyam", "kumbhar"];
$array2 = ["Deepak","kumbhar"];
$array3 = ["kumbhar"];

$result = array_pop($array);
echo "<pre>";
print_r($result);


//---------------------------------------End-------
// array_search() : Searches the array for a given value and returns the first corresponding key if successful
// array_pop() : Deletes the last element of an array
// array_values() : return all the values of an array.
// array_column() :  Return the values from a single column in the input array
// arra_map() : in array_map() we pass 2 argument first is callback function , and second is $array. and this function should be run for all keys of an array.
// array_slice() : Extract a slice of the array
// array_type()
// array_keys() : Return all the keys or a subset of the keys of an array
// array_filter() : Filters elements of an array using a callback function
// array_unique() : remove duplecate value from an array,
// array_change_key_case();

// array_change_key_case_recursive()
// array_key_exists(); : Checks if the given key or index exists in the array
// array_sum()

?>