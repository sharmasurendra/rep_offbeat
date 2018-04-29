<?php
function array_key_lookup($haystack, $needle)
{
    $matches = preg_grep("/$needle/", array_keys($haystack));
    return array_intersect_key($haystack, array_flip($matches));
}

?>

<?php
$lvl = $_COOKIE;
$arr_lvl = array();
$filtered_lvl = array_key_lookup($lvl, "product");
arsort($filtered_lvl);
$lvl5 = array_slice($filtered_lvl, 0, 5);
//echo "Last 5 visited products:";
foreach ($lvl5 as $key => $value) {
    // echo "$key\n";
    array_push($arr_lvl, $key);
}
print_r($arr_lvl);
?>