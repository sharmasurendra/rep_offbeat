<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<base href="http://localhost/buytradesell/">
    <title>Buy-Sell-Trade Most Visited Products</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
.divf:nth-child(4n) {clear: left;}
</style>

</head>

<body>



<?php include 'common/header.php';?>
   
	<?php
	
		if(isset($_COOKIE['items'])){
			$itemsAvailable = true;
			$idList = $_COOKIE['items'];
			$idArray = explode(",", $idList);
			$prodCount = array_count_values($idArray);
			arsort($prodCount);
	
			$idSize = sizeof($idArray)-1;
			$maxCnt = 1;
			$finalIds = array();
			
			foreach ($prodCount as $key => $value) {
				if($maxCnt <= 5) {
				
					array_push($finalIds, $key);
					$maxCnt++;
			
				}
				else {
					break;
				}
			}
			
			
			if(sizeof($finalIds) > 0) {
				
				$servername = "localhost";
			$username = "cmpe272user";
			$password = "cmpe272user";
			$dbname = "cmpe272";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				//$_SESSION['error'] = "Connection error: ".$conn->connect_error;
			}
			else {
				
				switch(sizeof($finalIds)) {
					case 1: $sql = "select * from Products where id IN ($finalIds[0])";
							$result = $conn->query($sql);						
							break;
					case 2: $sql = "select * from Products where id IN ($finalIds[0], $finalIds[1]) ORDER BY FIELD(id, $finalIds[0], $finalIds[1])";
							$result = $conn->query($sql);
							break;		
					case 3: $sql = "select * from Products where id IN ($finalIds[0], $finalIds[1], $finalIds[2]) ORDER BY FIELD(id, $finalIds[0], $finalIds[1], $finalIds[2])";
							$result = $conn->query($sql);
							break;
					case 4: $sql = "select * from Products where id IN ($finalIds[0], $finalIds[1], $finalIds[2], $finalIds[3]) ORDER BY FIELD(id, $finalIds[0], $finalIds[1], $finalIds[2], $finalIds[3])";
							$result = $conn->query($sql);
							break;
					case 5: $sql = "select * from Products where id IN ($finalIds[0], $finalIds[1], $finalIds[2], $finalIds[3], $finalIds[4]) ORDER BY FIELD(id, $finalIds[0], $finalIds[1], $finalIds[2], $finalIds[3], $finalIds[4])";
							$result = $conn->query($sql);
							break;
				}
			}
				
			}
			
		}
		else {
			$itemsAvailable = false; 
		}
	?>
	
	
    <!-- Page Content -->
    <div class="container">

        <div class="row" style="padding-top: 59px;">
		
		
			<?php include 'common/menu.php';?>
            <div class="col-md-9">
			<?php 
				if($itemsAvailable) {
					echo "<h3>Most Visited Products</h3>";
					include 'recent_products.php';
				}
				else {
					echo "<div class='alert alert-danger'>No Products Visited </div>";
				}
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

</body>

</html>
