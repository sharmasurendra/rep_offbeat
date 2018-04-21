<?php
extract($_POST);
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "b1069ce4ee0339";
$password = "7ee6e563";
//$username = "root";
//$password = "";
$dbname = "heroku_5eaa584d7cda171";
         if ($_POST['action'] == 'Submit')
            {
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email,address,home,cell_phone)
    VALUES (:first_name, :last_name, :email , :address , :home_phone , :mobile_phone)");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':home_phone', $home_phone);
    $stmt->bindParam(':mobile_phone', $mobile_phone);
$stmt->execute();
    /* insert a row
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();
    // insert another row
    $firstname = "Mary";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt->execute();
    // insert another row
    $firstname = "Julie";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt->execute();
    */
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
}
else  if ($_POST['action'] == 'Search')
{
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $first_name = "%$first_name%";
     $last_name = "%$last_name%";
     $email = "%$email%";
     $home_phone = "%$home_phone%";
     $mobile_phone = "%$mobile_phone%";
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM user where 1
    and first_name like :first_name and last_name like :last_name
    and email like :email
    and home like :home and cell_phone like :cell_phone");
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':home', $home_phone);
    $stmt->bindParam(':cell_phone', $mobile_phone);
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
   foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}
?>