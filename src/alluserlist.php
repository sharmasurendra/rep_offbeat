<?php
try {

$servername = "localhost";
$username = "aravinda";
$password = "Welcome01@";
//$username = "root";
//$password = "";
$dbname = "aravinda";


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM user ");


    $stmt->execute();

    // set the resulting array to associative
   //$stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetchAll();
    //Print_r($result);
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Home Address</th><th>Email</th><th>Home Phone</th><th>Mobile Phone</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}



  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

echo("<h1>Airwind.me-Users</h1>");
   foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;

    }
    echo "</table>";
echo("<br>");
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$conn = null;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://fabposters.slashbin.in/users/list");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec ($ch);
curl_close ($ch);

//
$obj =json_decode($result);



echo("<h1>fabposters.slashbin.in-Users</h1>");
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Home Address</th><th>Email</th><th>Home Phone</th><th>Mobile Phone</th></tr>";


//$obj->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRows(new RecursiveArrayIterator ( $obj)) as $k=>$v ) {
        echo $v;

}

  echo "</table>";
        echo("<br>");
?>