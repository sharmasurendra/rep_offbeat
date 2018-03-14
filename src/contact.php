<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Offbeat</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>

<body>

<?php include 'common/header.php';?>
   
   
   
	
 <div class="row" style="padding-top: 59px;">
		
			<div class="container">
			<p>&nbsp;</p>
				<h3>Contact US - </h3>	
				<?php
				$sourceFile = file_get_contents('../resources/text/contacts.txt');
				$fileContents = explode("\n", $sourceFile);	
				?>
				<p>&nbsp;</p>
				 
				<h4> <?php echo $fileContents[0]; ?></h4>
				<h5> <?php echo $fileContents[1]; ?> </h5>
				<h5> <?php echo $fileContents[2]; ?> </h5>
				<h5> <?php echo $fileContents[3]; ?> </h5>
				<a href="https://www.facebook.com" target="_blank" ><i class="fa fa-facebook-square" style="font-size:36px;color:#3b5998"></i></a>	
				
				<a href="https://www.linkedin.com" target="_blank" ><i class="fa fa-linkedin-square" style="font-size:36px;color:#0077B5"></i></a>	
<p>&nbsp;</p>				
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
