			<div class="container">
	<div class="row">
		<?php include 'common/menu.php';?>
				<div class="col-xs-4 item-photo" style="padding-top: 80px;">
                    <?php echo "<img style='max-width:100%;' src='resources/img/$image' />";?>
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?php echo $name; ?></h3>    
                    <h5><?php echo $description ?></h5>

				   <div class="ratings">
					
					<p>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
					</p>
				</div>
				
                    <!-- Precios -->
                    <h6 class="title-price"><small>Buy For</small></h6>
                    <h3 style="margin-top:0px;"><?php echo $price;?></h3>

                    <!-- Detalles especificos del producto -->
      
                    <div class="section" style="padding-bottom:5px;">
                        <h6 class="title-attr"><small>Available</small></h6>                    
                        <div>
                            <div class="attr2">Online</div>
                            <div class="attr2">COD</div>
                        </div>
                    </div>   
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr">Quantity</h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</button>
                        <h6><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> <?php echo $interest." People interested" ;?></h6>
                    </div>                                        
                </div>                              

		
	</div>
</div>