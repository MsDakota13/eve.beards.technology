<?php
include_once 'include/db_connect.php';
include_once 'include/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eve Online Market Data Mining & Analysing</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--ANIMATED FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome-animation.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- Login scripts -->
    <script type="text/JavaScript" src="assets/js/sha512.js"></script> 
    <script type="text/JavaScript" src="assets/js/forms.js"></script> 
</head>
<body>
    <div id="wrapper">
		
			<?php
				Global $nav;
				$nav = 1;
				Global $subNav;
				$subNav = 0;
				include 'include/nav.php';
			?>
		
        <!-- /. NAV SIDE  -->
			
			<div id="page-wrapper" >
				<div id="page-inner">
				    <?php if (login_check($mysqli) == true) : ?>
						<div class="row">
							<div class="col-md-12">
							 <h2>Home</h2>   						   
							</div>
						</div>
						<!-- /. ROW  -->
						<hr />
						
						<!--STATS SECTION-->
						<section class="c-yellow">
							<div class="container">
								<div class="row ">
								
									<div class="col-md-3 ">
										<div class="stats-div">
											<i class="fa fa-wrench fa-5x"></i>
										</div>
									</div>
									
									<div class="col-md-6 ">
										<div class="stats-div">
											<h3>Work in Progress</h3>
										</div>
									</div>
									
									<div class="col-md-3 ">
										<div class="stats-div">
											<i class="fa fa-cog fa-5x"></i>
										</div>
									</div>
									
								</div>
							</div>
						</section>
						<!--END STATS SECTION-->
						
					<?php else : ?>
						<!--SERVICES SECTION-->    
						<section  id="services-sec">
							<div class="container">
								<div class="row ">
									<h1>OUR SERVICES:</h1>
									 <div class="col-md-12 g-pad-bottom">
									  <div class="col-md-6">
										<h2>Data Mining done for you!</h2>
										<p>
											We mine the Eve Online CREST API to gather the following data: <i>buy prices, sell prices, buy quantities, sell quantities & region</i>. We in general grab 50% of all orders we mine up to a maximum of 10. Based on this we calculate the lowest price, highest price and average price. This data is saved into our database for later usage.        
										</p>
										  </div>
									 <div class="col-md-6">
										<h2>Data Analysis done for you!</h2>
										<p>
											Besides mining we also analyse the data and provide insight into deals you could make while station trading! We calculate averages, weighted averages, margins, regional averages for prices that are more accurate versus the in-game averages and much more. 
										</p>
										  </div>
										 </div>
								   
									<div class="col-md-12 text-center">
										<div class="col-md-4 ">
											<div class="service-div">
												<i class="fa fa-location-arrow fa-5x"></i>
												<h4>Trade hubs </h4>
												<p>
													We currently only analyse the <b>Jita</b> market. This because we are limited by the amount of requests we can do.
												</p>
												 <p>
													In the future we hope to expand to more trade hubs of Eve Online.
												</p>
											</div>
										</div>
										<div class="col-md-4 ">
											<div class="service-div">
												<i class="fa fa-handshake-o fa-5x"></i>
												<h4>Find the best deals </h4>
												<p>
													With our data mining and data analysing we can provide a list of potential good deals to trade in Eve Online! With our growing data and frequent recalculations we provide the most up to date information about the market.
												</p>
											</div>
										</div>
									   
										<div class="col-md-4">
											<div class="service-div">
												<i class="fa fa-bar-chart fa-5x"></i>
												<h4>Different kinds of charts </h4>
												<p>
													We provide different kinds of charts to help visualize the data we use for our calculations and help you decide on the best trade. We provide: <i>pie charts, bar charts and line charts.</i>
												</p><p></p>
											</div>
										</div>
									</div>
									<div class="col-md-12 g-pad-bottom">
									  <div class="col-md-12">
										<h2>Predictive Analytics done for you!</h2>
										<p>
											Aside from data mining and data analysis, we also do some predictive analytics. We got the data already and we know when we got the data since we track it ourselves. With our tools we can provide insight into the sell price of an item a week from now. With our regular updates and continuous data mining this prediction is also updated to keep the prediction as accurate as possible and have it move with changes is something sudden happens.            
										</p>
										  </div>
									 
										 </div>
								</div>
							</div>
						</section>
						<!--END SERVICES SECTION-->
						
						<!--STATS SECTION-->
						<section class="c-blue">
							<div class="container">
								<div class="row ">
								
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>11000+ </h3>
											<h4>Tracked items</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>5 min. </h3>
											<h4>Update intervals</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>Top 100</h3>
											<h4>Best items to trade</h4>
										</div>
									</div>
									
								</div>
							</div>
						</section>
						<!--END STATS SECTION-->
					<?php endif; ?>
				</div>
				 <!-- /. PAGE INNER  -->
			</div>
			
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
