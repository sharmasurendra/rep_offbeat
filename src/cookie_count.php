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
    $stmt = $conn->prepare("SELECT * FROM products where 1 and product_id = '$productId'" );
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    $product_name = $result['product_name'];

    echo "$product_name - $value <br>";
    array_push($arr_mvl,substr($key,12,strlen($key)));
}
// print_r($arr_mvl);

// $mvl5['visitedcountproduct1']

?>