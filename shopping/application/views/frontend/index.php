			<div class="header_slide">
				<div class="header_bottom_left">				
					<div class="categories">
					  	<ul>
					  		<h3>Categories</h3>
						    <li><a href="#">Mobile Phones</a></li>
						    <li><a href="#">Desktop</a></li>
						    <li><a href="#">Laptop</a></li>
						    <li><a href="#">Accessories</a></li>
						    <li><a href="#">Software</a></li>
						    <li><a href="#">Sports &amp; Fitness</a></li>
						    <li><a href="#">Footwear</a></li>
						    <li><a href="#">Jewellery</a></li>
						    <li><a href="#">Clothing</a></li>
						    <li><a href="#">Home Decor &amp; Kitchen</a></li>
						    <li><a href="#">Beauty &amp; Healthcare</a></li>
						    <li><a href="#">Toys, Kids &amp; Babies</a></li>
					  	</ul>
					</div>					
		  	    </div>
				<div class="header_bottom_right">					 
				 	<div class="slider">					     
						<div id="slider">
		                    <div id="mover">
		                    	<div id="slide-1" class="slide">			                    
									<div class="slider-img">
									    <a href="<?php echo SURL.'website/preview/';?>">
									    	<img src="<?php echo Website_Assets;?>images/slide-1-image.png" alt="learn more" />
									    </a>
									</div>
						            <div class="slider-text">
			                            <h1>Clearance<br><span>SALE</span></h1>
			                            <h2>UPTO 10% OFF</h2>
										<div class="features_list">
										   	<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>             
								        </div>
								        <a href="<?php echo SURL.'website/preview/';?>" class="button">Shop Now</a>
					                </div>			               
									<div class="clear"></div>				
				                </div>	
					            <div id="slide-1" class="slide">
					            	<div class="slider-text">
	                                	<h1>Clearance<br><span>SALE</span></h1>
	                                	<h2>UPTO 20% OFF</h2>
								   		<div class="features_list">
								   			<h4>Get to Know More About Our Memorable Services</h4>               
						            	</div>
						            	<a href="<?php echo SURL;?>website/preview" class="button">Shop Now</a>
				                   	</div>		
					             	<div class="slider-img">
								    	<a href="<?php echo SURL;?>website/preview"><img src="<?php echo Website_Assets;?>images/slide-3-image.jpg" alt="learn more" /></a>
								  	</div>						             					                 
								  	<div class="clear"></div>				
			                  	</div>
			                  	<div id="slide-1" class="slide">						             	
				                	<div class="slider-img">
								    	<a href="<?php echo SURL;?>website/preview/"><img src="<?php echo Website_Assets;?>images/slide-2-image.jpg" alt="learn more" /></a>
								  	</div>
								  	<div class="slider-text">
	                                	<h1>Clearance<br><span>SALE</span></h1>
	                                	<h2>UPTO 30% OFF</h2>
								   		<div class="features_list">
								   			<h4>Get to Know More About Our Memorable Services Lorem Ipsum is simply dummy text</h4>
						            	</div>
						            	<a href="<?php echo SURL;?>website/preview" class="button">Shop Now</a>
				                   	</div>	
								  	<div class="clear"></div>				
			                  	</div>												
		                 	</div>		
	                	</div>
				 		<div class="clear"></div>					       
	         		</div>
	      		</div>
			   	<div class="clear"></div>
			</div>
		</div>
 		<div class="main">
		    <div class="content">
		    	<div class="content_top">
		    		<div class="heading">
		    		<h3>New Products</h3>
		    		</div>
		    		<div class="see">
		    			<p><a href="#">See all Products</a></p>
		    		</div>
		    		<div class="clear"></div>
		    	</div>
			    <div class="section group">
			      	<?php
						// echo $total=count($products);
			      	foreach ($new_products as $key => $value)
			      	{
			      		if($value['type']=='New') 
			      		{
			      	?>
				      		<div class="grid_1_of_4 images_1_of_4" 
								<?php
							        
							        	if(($key%4)==0)
							        	{
							    ?>
							    			style="margin-left:0px;"	
							    <?php
										}
							        
							    ?>
							">
								<a href="<?php echo SURL.'website/preview/'.$value['product_id'];?>">
									<img src="<?php echo Website_Assets;?>images/<?php echo $value['product_image_name'];?>" class="img-responsive" style="width:212px;height:212px;" alt="" />
								</a>
								<h2><?php echo $value['product_name'];?></h2>
								<div class="price-details">
							       	<div class="price-number">
										<p><span class="rupees">Rs.<?php echo $value['product_price'];?></span></p>
								    </div>
						       		<div class="add-cart">
										<h4><a href="<?php echo SURL.'website/preview/'.$value['product_id'];?>">Add to Cart</a></h4>
								    </div>
									<div class="clear"></div>
								</div>
							</div>
					<?php
						}
			      	}
			      	?>
				</div>
				<div class="content_bottom">
		    		<div class="heading">
		    		<h3>Feature Products</h3>
		    		</div>
		    		<div class="see">
		    			<p><a href="#">See all Products</a></p>
		    		</div>
		    		<div class="clear"></div>
		    	</div>
				<div class="section group">
			      	<?php
						// $total=count($products);
			      		foreach ($feature_products as $key => $value)
			      		{
			      			if ($value['type']=='Feature') 
			      			{
			      	?>
							<div class="grid_1_of_4 images_1_of_4" 
								<?php
							        if(($key%4)==0)
							        {
							    ?>
							    	style="margin-left:0px;"	
							    <?php
							        } 
							    ?>
							">
								<a href="<?php echo SURL.'website/preview/'.$value['product_id'];?>">
								 	<img src="<?php echo Website_Assets;?>images/<?php echo $value['product_image_name']; ?>" class="img-responsive" style="width:212px;height:212px;" alt="" />
								</a>					
								<h2><?php echo $value['product_name'];?></h2>
								<div class="price-details">
							       <div class="price-number">
										<p><span class="rupees">Rs.<?php echo $value['product_price']; ?></span></p>
								    </div>
						       		<div class="add-cart">								
										<h4><a href="<?php echo SURL.'website/preview/'.$value['product_id'];?>">Add to Cart</a></h4>
								    </div>
									<div class="clear"></div>
								</div>
					</div>
					<?php
							}
			      		}
			      	?>
		    	</div>
	 		</div>
	 	</div>
	</body>
</html>