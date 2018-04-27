<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<base href="#">
    <title>Our Products</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
		<?php 
			$id = $_GET['id'];

			$servername = "us-cdbr-iron-east-05.cleardb.net";
			$username = "b1069ce4ee0339";
			$password = "7ee6e563";
			$dbname = "heroku_5eaa584d7cda171";

			// $servername = "localhost";
			// $username = "cmpe272user";
			// $password = "cmpe272user";
			// $dbname = "cmpe272";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				//$_SESSION['error'] = "Connection error: ".$conn->connect_error;
			}
			else {
				$sql = "select * from Products where id=$id";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					$name = $row['name'];
					$description = $row['description'];
					$price = $row['price'];
					$interest = $row['ppl_interest'];
					$rating = $row['rating'];
					$image = $row['image'];
					$prod = true;
					$id = $row['id'];
					if(isset($_COOKIE['items'])) {
						$curVal = $_COOKIE['items'];
						echo $curVal;
						$data = $curVal.",".$id;
						setcookie('items', $data);
					}
					else {
						setcookie('items', $id);
						
					}
					
				}
				}
				else {
					$prod = false;
					
				}
			
				
			}
		
		?>
		<?php include 'common/header.php';?>
	

        <div class="row" style="padding-top: 40px;">

		<?php 
		
		if($prod) {
			include 'product_details.php';
		}
		else {
			echo "<div class='container'>";
			 include 'common/menu.php';
			echo "<div class='col-xs-8 alert alert-danger'>No Product Found</div></div>";
		}
		?>

		</div>	
    <!-- /.container -->

    <!-- /.container -->
		
			
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
