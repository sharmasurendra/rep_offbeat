<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Offbeat Jewelry</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



<style>
.divf:nth-child(7n) {clear: left;}

</style>

</head>

<body>

<?php include 'src/common/header.php';?>
   
  
	
    <!-- Page Content -->
    <div class="container">

        <div class="row" style="padding-top: 59px;">
		
		
			<?php include 'src/common/menu.php';?>
            <div class="col-md-9">
				
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="resources/img/39.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="resources/img/40.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="resources/img/42.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class='row'>

				<?php 
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						
						echo "<div class='col-xs-4 divf'><div class='thumbnail'><img class='img-responsive' src='resources/img/".$row['image']."' alt=''/>";
                        echo "<div class='caption'><h4 class='pull-right'>".$row['price']."</h4><h4><a href='src/product.php?id=".$row['id']."'>".$row['name']."</a></h4>";
                        echo "<p>".$row['description']."</p></div>";
						echo "<div class='ratings'><p class='pull-right'>".$row['ppl_interest']." people interested</p><p><span class='glyphicon glyphicon-star'></span>";
						echo "<span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span>";
						echo "</p></div></div></div>";
					}
				}
			
			?>
             </div> 

					


                </div>

				</div>
            </div>

   

    </div>
    <!-- /.container -->

    <!-- /.container -->
<?php include 'src/common/footer.php';?>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>

</html>
