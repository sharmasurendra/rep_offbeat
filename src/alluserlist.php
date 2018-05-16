<?php
try {

$myHost = "###"; 
$myUserName = "###";  
$myPassword = "###";   
$myDataBaseName = "####"; 


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT first_name,last_name FROM user ");


    $stmt->execute();

    // set the resulting array to associative
   //$stmt->setFetchMode(PDO::FETCH_ASSOC);
    //$result = $stmt->fetchAll();
    //Print_r($result);
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</th></tr>";

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

echo("<h1>Our Users</h1>");
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
curl_setopt($ch, CURLOPT_URL, "https://progresswithus.herokuapp.com/includes/users.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec ($ch);
curl_close ($ch);

//
$obj =json_decode($result);



echo("<h1>progresswithus Users</h1>");
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Firstname</th><th>Lastname</tr>";


//$obj->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRows(new RecursiveArrayIterator ( $obj)) as $k=>$v ) {
        echo $v;

}

  echo "</table>";
        echo("<br>");
?>
