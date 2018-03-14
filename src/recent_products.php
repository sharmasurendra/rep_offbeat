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
			 
			 
			 
