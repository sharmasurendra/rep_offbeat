<?php
function array_key_lookup($haystack, $needle)
{
    $matches = preg_grep("/$needle/", array_keys($haystack));
    return array_intersect_key($haystack, array_flip($matches));
}

?>


<?php
$mvl = $_COOKIE;
$arr_mvl = array();
$filtered_mvl = array_key_lookup($mvl, "visitedcount");
arsort($filtered_mvl);

$mvl5 = array_slice($filtered_mvl, 0, 5);
//echo "5 most visited products:";
foreach ($mvl5 as $key => $value) {
    // echo substr($key,12,18);
    $productId=substr($key,19,18);
    // echo "$productId";
    $name="visitedcountproduct"."$productId";
    // echo "$name";
     echo "$key";
     echo "$value";


    array_push($arr_mvl,substr($key,12,strlen($key)));
}
// print_r($arr_mvl);

// $mvl5['visitedcountproduct1']

?>