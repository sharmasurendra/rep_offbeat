<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<base href="http://localhost/buytradesell/">
    <title>Buy-Trade-Sell Verify Page</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>

<body>

<br /><br /><br /><br />
<?php include 'common/header.php';?>
   
 <?php 
 $username = $password = $expectedPassword = '';
 $usernameError = '';
 $allOk = true;
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $username = "Name is required";
	$allOk = false;
  } else {
    $username = $_POST["username"];
  }
  
    if (empty($_POST["password"])) {
    $password = "Pasword is required";
	$allOk = false;
  } else {
    $password = $_POST["password"];
  }
  
  if($allOk) {	  
	$expectedPassword = getExpectedPassword($username);
		
	if(strcmp(trim($expectedPassword), trim($password)) == 0) {
		$_SESSION["user"] = $username;
		include 'accountlist.php';
	} else {
		$_SESSION["error"] = "Either Username/Password is incorrect or You Are not allowed to access this page.";
		echo "<div class='container'>";
		include 'login.php';
		echo "</div></div>";
	}

  }
  
 }
 else {
	 echo "<div class='container'><br/><br/><h3>Access not allowed . Please Login</h3><br/><br/><br/></div>";
 }
 
 function getExpectedPassword($username) {
	 
	$sourceFile = file_get_contents('../resources/text/login.txt');
	$fileContents = explode("\n", $sourceFile);	
	$pwd = '';

	foreach($fileContents as $value) {
		$userpwd = explode(" ", $value);
		if(strcmp(trim($username), trim($userpwd[0])) == 0) {			
			$pwd = $userpwd[1];	
			break;
		}
		$userpwd = '';
	}
	return $pwd;
 }
 ?>  
   

<?php include 'common/footer.php';?>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	

</body>

</html>
