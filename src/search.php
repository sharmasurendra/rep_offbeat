<?php
// Start the session
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
    <title>Buy-Trade-Sell Create User</title>

	<style>
	
	.input-group-btn select {
	border-color: #ccc;
margin-top: 0px;
    margin-bottom: 0px;
    padding-top: 7px;
    padding-bottom: 7px;
}

	
	</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>

<body>

	<?php include 'common/header.php';?>

	<div class="row" style="padding-top: 120px;">
		
	<div class="container">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div id="signupbox" style=" margin-top:35px" class="mainbox col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-2">

	      <div class="row">
        <div class="col-xs-6">
            		<div class="input-group">
				  <span class="input-group-btn">
				<select class="btn" name='criteria' required>
				<option value=''>Search By</option>
				  <option value='name'>Name</option>
				  <option value='email'>Email</option>
				  <option value='number'>Phone Number</option>
				</select>
			  </span>
			  <input type="text" class="form-control" name="search" required>
			  
			</div>
        </div>
        <div class="col">
            <div class="input-group">
			<button type="submit" class="btn btn-primary btn-primary col-md-offset-3">Search</button>
			</div>
        </div>
    </div>
	</div>
	</form>
	
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{ 
		$search = $_POST['search'];
		
		$servername = "localhost";
		$username = "cmpe272user";
		$password = "cmpe272user";
		$dbname = "cmpe272";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			$_SESSION['error'] = "Connection error: ".$conn->connect_error;
		}
		else {
			$result = '';
			
			switch ($_POST['criteria']) {
				case "name":
					$sql = "SELECT * FROM users where firstname like '%$search%' or lastname like '%$search%' ";
					$result = $conn->query($sql);
					break;
				case "email":
					$sql = "SELECT * FROM users where email like '%$search%' ";
					$result = $conn->query($sql);
					break;
				case "number":
					$sql = "SELECT * FROM users where home_contactnumber like '%$search%' or mobile_contactnumber like '%$search%' ";
					$result = $conn->query($sql);
					break;
		
			}
			
			if ($result->num_rows > 0) {
				// output data of each row
				
				echo "<h3>Search Results</h3><br/><div class='table-responsive'><table class='table'>";
				echo "<thead><tr><th>Firstname</th><th>Lastname</th><th>Email</th><th>Gender</th><th>Address</th><th>City</th><th>Home Number</th><th>Mobile Number</th></tr></thead><tbody>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td><td>".$row['gender']."</td><td>".$row['address']."</td><td>".$row['city']."</td><td>".$row['home_contactnumber']."</td><td>".$row['mobile_contactnumber']."</td></tr>";
				}
				echo "</tbody></table></div>";
			}
			
			else {
				echo "<h3>No Records Found</h3>";
			}
			
		}
		
		


	}
	
	?>
	</div>
	


	
        <footer class="navbar-fixed-bottom">
		<div class="container">
		<hr/>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; buytradesell.store 2017</p>
                </div>
            </div>
		</div>
        </footer>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
