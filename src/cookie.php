<?php

$myArray = explode(',', $_COOKIE["last_visited"]);

echo "<br><br>LAST FIVE VISITED PRODUCTS ARE :<br>";
$num = 0;

foreach ($myArray as $name ) {
    $num = $num+1;
    if($num<6)
echo "<br>$name <br>";
else
break;
}

?>