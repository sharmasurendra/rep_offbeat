<?php
 extract($_POST);
 
 echo "AAAAAAAAA";
 $servername = "us-cdbr-iron-east-05.cleardb.net";
 $username = "b1069ce4ee0339";
 $password = "7ee6e563";
 $dbname = "heroku_5eaa584d7cda171";

 $id = $_POST['action'];
 echo "$id";


 try {
    echo "111";
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    // // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //  $stmt = $conn->prepare("SELECT * FROM products where 1
    // and product_id= :value" );

    // $stmt->bindParam(':value', $_POST['action']);
    // $stmt->execute();
    // $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // $result = $stmt->fetch();
    // $value = $result['product_name'];
    // echo "222";


}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}