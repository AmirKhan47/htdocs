<div class="headertop_desc">
	<div class="call">
		<p><span>Need help?</span> call us <span class="number">+92-0344-5151822</span></span></p>
	</div>
	<div class="account_desc">
		<ul>
			<li><a href="#">Register</a></li>
			<li><a href="<?php echo URL; ?>backend/login/">Login</a></li>
			<li><a href="#">Delivery</a></li>
			<li><a href="#">Checkout</a></li>
			<li><a href="#">My Account</a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<div class="header_top">
	<div class="logo">
		<a href="index.html"><img src="<?php echo Website_Assets;?>images/logo.png" alt="" /></a>
	</div>
 	<div class="cart">
  	   	<p>Welcome to our Online Store! <span>Cart:</span><div id="dd" class="wrapper-dropdown-2"> 0 item(s) - Rs.0.00
  	   	<ul class="dropdown">
				<li>you have no items in your Shopping cart</li>
		</ul></div></p>
  	</div>
	<script type="text/javascript">
		function DropDown(el) 
		{
			this.dd = el;
			this.initEvents();
		}
		DropDown.prototype = 
		{
			initEvents : function() 
			{
				var obj = this;

				obj.dd.on('click', function(event){
					$(this).toggleClass('active');
					event.stopPropagation();
				});	
			}
		}
		$(function() 
		{
			var dd = new DropDown( $('#dd') );
			$(document).click(function() 
			{
				// all dropdowns
				$('.wrapper-dropdown-2').removeClass('active');
			});
		});
	</script>
	<div class="clear"></div>
	</div>
<div class="header_bottom">
 	<div class="menu">
 		<ul>
	    	<li class="<?php if($active=='index') { ?> active <?php } ?>"><a href="<?php echo URL;?>">Home</a></li>
	    	<li class="<?php if($active=='about') { ?> active <?php } ?>"><a href="<?php echo SURL;?>website/about/">About</a></li>
	    	<li class="<?php if($active=='delivery') { ?> active <?php } ?>"><a href="<?php echo SURL;?>website/delivery/">Delivery</a></li>
	    	<li class="<?php if($active=='news') { ?> active <?php } ?>"><a href="<?php echo SURL;?>website/news/">News</a></li>
	    	<li class="<?php if($active=='contact') { ?> active <?php } ?>"><a href="<?php echo SURL;?>website/contact/">Contact</a></li>
	    	<div class="clear"></div>
			</ul>
 	</div>
 	<div class="search_box">
 		<form>
 			<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
 		</form>
 	</div>
 	<div class="clear"></div>
</div>