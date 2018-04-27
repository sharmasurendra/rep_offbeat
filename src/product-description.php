<?php
 extract($_POST);
 
 $servername = "us-cdbr-iron-east-05.cleardb.net";
 $username = "b1069ce4ee0339";
 $password = "7ee6e563";
 $dbname = "heroku_5eaa584d7cda171";

 $id = $_POST['action'];


 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM products where 1 and product_id= :value" );
    $stmt->bindParam(':value', $_POST['action']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    $value = $result['product_name'];
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<html lang="en">
</head>
<body>

<!-- <link rel="stylesheet" href="desc.css">
 -->    <h1>Details</h1> <h2><?php print($result['product_name']); ?></h2>
    <h2><?php print($result['product_desc']); ?></h2>
     <br><br><img src= <?php echo($result['product_image']); ?>>

</body>
</html>