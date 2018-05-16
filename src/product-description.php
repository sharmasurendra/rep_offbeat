<?php
 extract($_POST);
 
 $myHost = "###"; 
$myUserName = "###";  
$myPassword = "###";   
$myDataBaseName = "####"; 


$pId = htmlspecialchars($_GET["pId"]);
$id = $_POST['action'];
 


 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM product_mp where 1 and productId= :value" );
    $stmt->bindParam(':value', $pId);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    $value = $result['productName'];


    $id = $result['productId'];
    $pImage = $id .'.jpg';
    $imagePath ='../resources/img/'.$pImage;

    if($id == 1 ){
        if(!isset($_COOKIE['visitedcountproduct1'])){
            $cookie = 1;
            setcookie("visitedcountproduct1",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct1'] + 1;
                setcookie("visitedcountproduct1",$cookie);
            }
          setcookie("item1",time());

    } elseif($id == 2 ){
            if(!isset($_COOKIE['visitedcountproduct2'])){
            $cookie = 1;
            setcookie("visitedcountproduct2",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct2'] + 1;
                setcookie("visitedcountproduct1",$cookie);
            }
          setcookie("item2",time());

    }elseif($id == 3 ){
                if(!isset($_COOKIE['visitedcountproduct3'])){
            $cookie = 1;
            setcookie("visitedcountproduct3",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct3'] + 1;
                setcookie("visitedcountproduct3",$cookie);
            }
          setcookie("item3",time());

    }elseif($id == 4 ){
                if(!isset($_COOKIE['visitedcountproduct4'])){
            $cookie = 1;
            setcookie("visitedcountproduct4",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct4'] + 1;
                setcookie("visitedcountproduct4",$cookie);
            }
          setcookie("item4",time());

    }elseif($id == 5 ){
               if(!isset($_COOKIE['visitedcountproduct5'])){
            $cookie = 1;
            setcookie("visitedcountproduct5",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct5'] + 1;
                setcookie("visitedcountproduct5",$cookie);
            }
          setcookie("item5",time());

    }elseif($id == 6 ){
                if(!isset($_COOKIE['visitedcountproduct6'])){
            $cookie = 1;
            setcookie("visitedcountproduct6",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct6'] + 1;
                setcookie("visitedcountproduct6",$cookie);
            }
          setcookie("item6",time());

    }elseif($id == 7 ){
                if(!isset($_COOKIE['visitedcountproduct7'])){
            $cookie = 1;
            setcookie("visitedcountproduct7",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct7'] + 1;
                setcookie("visitedcountproduct7",$cookie);
            }
          setcookie("item7",time());

    }elseif($id == 8 ){
               if(!isset($_COOKIE['visitedcountproduct8'])){
            $cookie = 1;
            setcookie("visitedcountproduct8",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct8'] + 1;
                setcookie("visitedcountproduct8",$cookie);
            }
          setcookie("item8",time());

    }elseif($id == 9 ){
                if(!isset($_COOKIE['visitedcountproduct9'])){
            $cookie = 1;
            setcookie("visitedcountproduct9",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct9'] + 1;
                setcookie("visitedcountproduct9",$cookie);
            }
          setcookie("item9",time());

    }elseif($id == 10 ){
               if(!isset($_COOKIE['visitedcountproduct10'])){
            $cookie = 1;
            setcookie("visitedcountproduct10",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct10'] + 1;
                setcookie("visitedcountproduct10",$cookie);
            }
          setcookie("item10",time());

    }elseif($id == 11 ){
                if(!isset($_COOKIE['visitedcountproduct11'])){
            $cookie = 1;
            setcookie("visitedcountproduct11",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct11'] + 1;
                setcookie("visitedcountproduct11",$cookie);
            }
          setcookie("item11",time());

    }elseif($id == 12 ){
               if(!isset($_COOKIE['visitedcountproduct12'])){
            $cookie = 1;
            setcookie("visitedcountproduct12",$cookie);
            }
            else{
             $cookie = $_COOKIE['visitedcountproduct12'] + 1;
                setcookie("visitedcountproduct12",$cookie);
            }
          setcookie("item12",time());

    }



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
 -->    <h1>Details</h1> <h2><?php print($result['productName']); ?></h2>
    <h2><?php print($result['ProductDesc']); ?></h2>
     <br><br><img src= <?php echo($imagePath); ?>>

</body>
</html>
