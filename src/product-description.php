<?php
extract($_POST);
 $servername = "us-cdbr-iron-east-05.cleardb.net";
 $username = "b1069ce4ee0339";
 $password = "7ee6e563";
 $dbname = "heroku_5eaa584d7cda171";

$id = $_POST['action'];

// $site_url = "https://merkato.herokuapp.com/sellers/1/products/$id/track";

// $ch = curl_init($site_url);
// curl_setopt_array($ch, $options);

// $content  = curl_exec($ch);
// //die($content);
// curl_close($ch);


try {
    echo "111";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $stmt = $conn->prepare("SELECT * FROM products where 1
    and product_id= :value" );

    $stmt->bindParam(':value', $_POST['action']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    $value = $result['product_name'];
    echo "222";

if(isset($_COOKIE['cookie']))
{
    $last = $result['product_name']  .",". $_COOKIE["last_visited"];

    if(isset(($_COOKIE['cookie'])["$value"]))
    $count = ($_COOKIE['cookie'])["$value"] + 1;

  else
 $count = 1;
echo "3333";

}
else
{
    $last = $result['product_name'];
    $count = 1;
}
echo "4444";

    //print_r($_SERVER);
$d = $_SERVER['HTTP_HOST'];
setcookie("last_visited","$last",time()+3600, "/",$d/*"localhost"*/, 0);
setcookie("cookie[$value]","$count",time()+3600, "/",$d/*"localhost"*/, 0);

    //setcookie("last_visited","$last",time()+3600, "/","$_SERVER['HTTP_HOST']", 0);

     //setcookie("cookie[$value]","$count",time()+3600, "/","$_SERVER['HTTP_HOST']", 0);
echo "5555";
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

<html lang="en">
</head>
<body>

<link rel="stylesheet" href="desc.css">
    <h1>Details</h1> <h2><?php print($result['product_name']); ?></h2>
    <h2><?php print($result['product_desc']); ?></h2>
     <br><br><img src= <?php echo($result['product_image']); ?>>

</body>
</html>

