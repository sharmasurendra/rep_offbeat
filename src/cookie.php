<?php
function array_key_lookup($haystack, $needle)
{
    $matches = preg_grep("/$needle/", array_keys($haystack));
    return array_intersect_key($haystack, array_flip($matches));
}

?>

<?php

echo "<br><br> FIVE MOST VISITED PRODUCTS ARE :<br>";
 $servername = "us-cdbr-iron-east-05.cleardb.net";
 $username = "b1069ce4ee0339";
 $password = "7ee6e563";
 $dbname = "heroku_5eaa584d7cda171";
 $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$lvl = $_COOKIE;
$arr_lvl = array();
$filtered_lvl = array_key_lookup($lvl, "item");
arsort($filtered_lvl);
$lvl5 = array_slice($filtered_lvl, 0, 5);
//echo "Last 5 visited products:";
foreach ($lvl5 as $key => $value) {
	  
     // echo "$key\n";
     $productId=substr($key,4,5);
     // echo "$productId";
	$stmt = $conn->prepare("SELECT * FROM products where 1 and product_id = '$productId'" );
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    $product_name = $result['product_name'];
 	echo "$product_name<br>";


    array_push($arr_lvl, $key);
}
// print_r($arr_lvl);
?>