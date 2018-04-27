<?php
try {

$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "b1069ce4ee0339";
$password = "7ee6e563";
//$username = "root";
//$password = "";
$dbname = "heroku_5eaa584d7cda171";



// $myHost = "us-cdbr-iron-east-05.cleardb.net"; 
// $myUserName = "b1069ce4ee0339";  
// $myPassword = "7ee6e563";   
// $myDataBaseName = "heroku_5eaa584d7cda171"; 


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