<?php
// Start the session
session_start();
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
    <title>Buy-Trade-Sell Secure Page</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>

<body>

<?php include 'common/header.php';?>
   
 <?php 
 $username = $password = '';
 $usernameError = '';
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $username = "Name is required";
  } else {
    $username = $_POST["username"];
  }
  
    if (empty($_POST["password"])) {
    $password = "Pasword is required";
  } else {
    $password = $_POST["password"];
  }
  
 }
 ?>  
   
	
 <div class="row" style="padding-top: 59px;">
		
			<div class="container">
			<p>&nbsp;</p>
			<?php 
				$_SESSION['user'] = null;
				
					include 'login.php'; 
				

			?>
			</div>       

		</div>

    </div>
    <!-- /.container -->

    <!-- /.container -->
<?php include 'common/footer.php';?>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	
	<?php 
	
	echo "<p>$username</p>";
	echo "<p>$password</p>";
	?>
</body>

</html>
