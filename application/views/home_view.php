<!DOCTYPE html>
<html>
<head>
<title>SewaCar</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Car Rental Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/galleryeffect.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.flipster.css" type="text/css" media="all"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dscountdown.css" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet"/>  -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet"/>
<link href="//fonts.googleapis.com/css?family=Faster+One" rel="stylesheet"/>
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"/>

</head>
<body>

<!-- banner -->
<div class="banner-w3ls" id="home">
<!-- header -->
<div class="header-w3l-agile">
		<div class="header_left">
			<ul>
				<li><a href="mailto:alifmauludi24@gnail.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>sewacar@gmail.com</a></li>
				<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>085330177117</li>
			</ul>
		</div>
		<div class="header_right">
		      <div class="w3ls-social-icons">
					<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
					<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
					<a class="pinterest" href="#"><i class="fa fa-google-plus"></i></a>
					<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
					
				</div>

		</div>
		<div class="clearfix"></div>
</div>
<!-- //header -->
	<div class="container">
		<div class="header-nav">
			<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a  href="<?php echo base_url(); ?>index.php/home"><img src="<?php echo base_url(); ?>assets/images/logo.png"></a></h1>
					</div>
					<!-- navbar-header -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="index.html" class="hvr-underline-from-center active">Home</a></li>
							<li><a href="#about" class="hvr-underline-from-center scroll">About Us</a></li>
							<li><a href="#gallery" class="hvr-underline-from-center scroll">Cars</a></li>
							<li><a href="#team" class="hvr-underline-from-center scroll">Team</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>	
				</nav>
		</div>			
		</div>
	</div>
<!-- //banner -->
<!-- bootstrap-pop-up -->
									

<!-- about -->
<div class="about" id="about">
		<div class="container">
		 <div class="wthree_title_agile two">
				<h3>About <span>Us</span></h3>
				</div>
				<p class="sub_para two">It’s time to drive</p>
		 <div class="inner_w3l_agile_grids">
            <div class="col-md-6 about-left-w3layouts">
				<h6 class="sub">Welcome To SewaCar</h6>
				<p>SewaCar adalah penyedia mobil sewaan yang siap melayani Anda selama 24 jam. Kami
				memiliki mobil yang berkualitas dengan harga sewa yang terjangkau. </p>
			</div>
			<div class="col-md-6 about-right-w3layouts">
			<iframe frameborder="0"><img src="<?php echo base_url(); ?>images/g2.jpg"></iframe>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
 </div>
<!--about-section-->

<!-- //gallery -->
<div class="gallery" id="gallery">
<!-- gallery -->
	<div class="container">

			<div class="wthree_title_agile">
	        <h3 id="latestCar"> Our <span>Cars</span></h3>
				</div>
		<div class="inner_w3l_agile_grids">

<?php 
	foreach ($car as $data) {
		echo '
		<div class="col-md-4 gal-gd wow fadeInLeft animated" data-wow-delay=".5s" id="car'.$data->ID_MOBIL.'">
				<a href="'.base_url('index.php/home#'.$data->ID_MOBIL.'').'" >
					<div class="nd-wrap nd-style-8">
						<img src="'.base_url('uploads/mobil/'.$data->FOTO_MOBIL.'').'" class="img-responsive" alt=" " />
						<div class="nd-content">
				<div class="nd-content_inner">
					<div class="nd-content_inner1">
						<h4 class="nd-title">'.$data->MERK_MOBIL.'</h4>			
					</div>					
				</div>				
			</div>
			</div>
				</a>
			</div>
		';
	}
?>			

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //gallery -->
<?php 
	foreach ($car as $data) {
		echo '
	<div class="lb-overlay" id="'.$data->ID_MOBIL.'">
		<img src="'.base_url().'uploads/mobil/'.$data->FOTO_MOBIL.'" alt="image1" />
		<div class="gal-info">							
			<h3>'.$data->MERK_MOBIL.'</h3>
				<p>'.$data->NO_SERI.'</p>			
				<p>'.$data->HARGA_SEWA.' / Hari</p>			
				<p>'.$data->STATUS.'</p>			
				<p>'.$data->DESKRIPSI.'</p>
		</div>
		<a href="'.base_url('index.php/home#car'.$data->ID_MOBIL.'').'" class="lb-close">Close</a></div>';
	}
?>			

<!--//team-section-->
<div class="middile" id="team">
	<div class="container">
		<div class="wthree_title_agile two">
				<h3>Our <span>Team</span></h3>
				</div>
				  <div class="inner_w3l_agile_grids">
		<!-- Flipster List -->
		<div class="flipster">
		  <ul>
		  	<li>
		  		<div class="about-grid-agile">
					<div class="about-head-w3">
						<h3>Front End Developer</h3>
					</div>
					<div class="about-bottom">
						<div class="about-bottom-image">
							<img src="<?php echo base_url(); ?>assets/images/alif.jpg" alt=" " class="img-responsive">
						</div>
						<div class="about-bottom-bottom">
								<p>Alif</p>
						<div class="agileits_social_list">
								<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</div>
						</div>
						
					</div>
				</div>
		  	</li>
	  		<li>
	  			<div class="about-grid-agile">
					<div class="about-head-w3">
						<h3>Back End Developer</h3>
					</div>
					<div class="about-bottom">
						<div class="about-bottom-image">
							<img src="<?php echo base_url(); ?>assets/images/aji.jpg" alt=" " class="img-responsive">
						</div>
						<div class="about-bottom-bottom">
							<p>Aji</p>
							<div class="agileits_social_list">
								<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</div>
						</div>
						
					</div>
				</div>
	  		</li>
	  		<li>
	  			<div class="about-grid-agile">
					<div class="about-head-w3">
						<h3>SYSTEM ANALYST</h3>
					</div>
					<div class="about-bottom">
						<div class="about-bottom-image">
							<img src="<?php echo base_url(); ?>assets/images/neta.jpg" alt=" " class="img-responsive">
						</div>
						<div class="about-bottom-bottom">
								<p>Neta</p>
							<div class="agileits_social_list">
								<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</div>
						</div>
						
					</div>
				</div>
	  		</li>
	  		
		  </ul>
		</div>
<!-- End Flipster List -->	
		
			</div>	
			
	</div>
</div>
<!--//team-section-->

	<div class="w3_agile_address">
		<div class="container">
				
			<div class="w3ls_footer_grid">
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_leftl">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="w3ls_footer_grid_leftr">
						<h4>Find Us On:</h4>
						<p>Sawojajar, Malang</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_leftl email">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div class="w3ls_footer_grid_leftr ">
						<h4>Email Us On:</h4>
						<a href="mailto:info@example.com">sewacar@gmail.com</a>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_leftl">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<div class="w3ls_footer_grid_leftr">
						<h4>Call Us On:</h4>
						<p>(+62)85330177117</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		</div>


	<div class="newsletter">
		<div class="container">
			<div class="col-md-3 footer-grid">
				<h3>Opening Hours</h3>
					<p>Monday-Friday</p>
						<span id="hours">6.00AM-10.00PM</span>
					​<p>Saturday-Sunday</p>
						​<span id="hours">6.00AM-12.00PM</span>
			</div>
			</div>
				<div class="clearfix"> </div>
			</div>
	
	</div>

<!-- footer -->
	<div class="w3l_footer_agile">
			<p>© 2017 SewaCar. All Rights Reserved</p>
			
		</div>
<!-- //footer -->
	
<!-- js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<!--scripts--> 
<!-- Counter required files -->
		<script type="text/javascript" src="assets/js/dscountdown.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/demo-1.js"></script>
	
	<!--//scripts--> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!--banner Slider starts Here-->
						<script src="<?php echo base_url(); ?>assets/js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
		
							
	<script src="<?php echo base_url(); ?>assets/js/jquery.flipster.js"></script>
<script>

	$(function(){ $(".flipster").flipster({ style: 'carousel', start: 0 }); });


</script>	
<!--banner Slider starts Here-->
							 <!-- required-js-files-->
							<link href="<?php echo base_url(); ?>assets/css/owl.carousel.css" rel="stylesheet">
							    <script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items :5,
									itemsDesktop : [768,4],
									itemsDesktopSmall : [414,3],
							        lazyLoad : true,
							        autoPlay : true,
							        navigation :true,
									
							        navigationText :  false,
							        pagination :false,
									
							      });
								  
							    });
							    </script>
								 <!--//required-js-files-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</body>
</html>