<?php


echo "<br><br> FIVE MOST VISITED PRODUCTS ARE :<br>";

$count = 0;

    arsort($_COOKIE['cookie']);
    foreach ($_COOKIE['cookie'] as $name => $value)
    {
            $count = $count+1;


            if($count<6)
            {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";
    }
    else
        break;
    }





?>