<?php
$arr = array(
    1 => array(
'ID' => 4,
'name' =>'Alice',
'city' =>'UK'
    ),
    2 => array(
'ID' => 24,
'name' =>'Amit',
'city' =>'canada'
    ),
    3 => array(
'ID' => 31,
'name' =>'Bob',
'city' =>'canada'
    )
);
function search($array, $search_list) {
    $result = array();
    foreach ($array as $key => $value) {
        foreach ($search_list as $k => $v) {
        if (!isset($value[$k]) || $value[$k] != $v)
            {
               continue 2;
            }
        }
        $result[] = $value;
    }
    return $result;
}

$search_items = array('city'=>'canada');
$res = search($arr, $search_items);
foreach ($res as $var) {
    echo 'ID: ' . $var['ID'] . '<br>';
    echo 'Name: ' . $var['name'] . '<br>';
    echo 'City: ' . $var['city'] . '<br>';
}
?>