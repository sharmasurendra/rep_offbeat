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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>

<body>

	<?php include 'common/header.php';?>
	
	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{ 

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
		$sql = "INSERT INTO users (firstname, lastname, email, gender, address, city, home_contactnumber, mobile_contactnumber) VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[gender]', '$_POST[address]', '$_POST[city]', '$_POST[homenumber]', '$_POST[mobilenumber]')";

		if ($conn->query($sql)) {
			$_SESSION['msg'] = "User created successfully";
		} else {
			$_SESSION['error'] = "User Creation failed with : ".$conn->error;
			
		}

		$conn->close();
		}



	}
	
	?>
	

	<div class="row" style="padding-top: 59px;">
		
	<div class="container">
	
		<div class="container">    
		
		<?php
			if(isset($_SESSION['msg'])) {
				echo "<br/>";
				echo "<div class='alert alert-success'>";
				echo $_SESSION['msg'];
				echo "</div>";
				unset($_SESSION['msg']);
			}
			
			if(isset($_SESSION['error'])) {
				echo "<br/>";
				echo "<div class='alert alert-danger'>";
				echo $_SESSION['error'];
				echo "</div>";
				unset($_SESSION['error']);
			}
		?>
            
    <div id="signupbox" style=" margin-top:35px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">User Creation</div>
                
            </div>  
            <div class="panel-body" >
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                    <form  class="form-horizontal" method="post" >

                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> First Name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="firstname" placeholder="enter your first name" style="margin-bottom: 10px" type="text" required />
                            </div>
                        </div>
						
						<div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Last Name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="lastname" placeholder="enter your last name" style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div>
						
                        <div id="div_id_email" class="form-group required">
                            <label for="id_email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="id_email" name="email" placeholder="your current email address" style="margin-bottom: 10px" type="email" required/>
                            </div>     
                        </div>
   
                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Gender<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px" required>Male</label>
                                 <label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Female </label>
                            </div>
                        </div>
                        <div id="div_id_company" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField"> Address<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_company" name="address" placeholder="your address " style="margin-bottom: 10px" type="text" required />
                            </div>
                        </div>  
             
                        <div id="div_id_location" class="form-group">
                            <label for="id_location" class="control-label col-md-4 "> City</label>
                            <div class="controls col-md-8 ">
                                <input class="input-md textinput textInput form-control" id="id_location" name="city" placeholder="your city" style="margin-bottom: 10px" type="text" />
                            </div> 
                        </div>
						
						<div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> Home Phone<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                 <input class="input-md textinput textInput form-control" id="id_number" name="homenumber" placeholder="provide your number" style="margin-bottom: 10px" type="text" required/>
                            </div> 
                        </div>
						
						<div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> Cell Phone<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                 <input class="input-md textinput textInput form-control" id="id_number" name="mobilenumber" placeholder="provide your number" style="margin-bottom: 10px" type="text" required/>
                            </div> 
                        </div>
						

                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Signup" class="btn btn btn-primary" id="submit-id-signup" />
                              
                            </div>
                        </div> 
                            
                    </form>

                </form>
            </div>
        </div>
    </div> 
</div>
    





</div>            
	
	
	</div>
	
	</div>
	<?php include 'common/footer.php';?>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
