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
    <title>Eve Online Market Data Mining & Analysing: Error</title>
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
				$nav = 7;
				Global $subNav;
				$subNav = 0;
				include 'include/nav.php';
			?>
		
        <!-- /. NAV SIDE  -->
			
			<div id="page-wrapper" >
				<div id="page-inner">
						<div class="row">
							<div class="col-md-12">
							 <h2>All Release notes</h2>   						   
							</div>
						</div>
						<!-- /. ROW  -->
					<hr />
					<!--STATS SECTION-->
						<section class="c-blue">
							<div class="container">
								<div class="row ">
								
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.3 </h3>
											<h4>Data miner</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div" style="color: #696969;">
											<h3>0.1 dev </h3>
											<h4>Data Analyzer</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div" style="color: #696969;">
											<h3>0.2.1 </h3>
											<h4>Website</h4>
										</div>
									</div>
									
								</div>
							</div>
						</section>
						<!--END STATS SECTION-->
						<!--SERVICES SECTION-->    
						<section  id="services-sec">
							<div class="container">
								<div class="row ">								   
									<div class="col-md-12">
										<div class="col-md-4 ">
											<h4>Data Miner Release Notes: </h4>
											<p>
												We rewrote part of the miner to use a better form of multiprocessing. Aside from that we removed the database interaction from the data processing part in the Miner. This way the miner is faster and more stable. Aside from that we made the miner configurable without editing the code. Last not least we contain the Miner in a python virtualenv. To sum it up once more:
												<ul>
												<li>New multiprocessing code</li>
												<li>Faster data processing time</li>
												<li>More stability</li>
												<li>Configurable settings (needed for different environments)</li>
												<li>Contained in a python virtualenv</li>
												</ul>
											</p>
										</div>
										<div class="col-md-4 ">
											<h4>Data Analyzer Release Notes: </h4>
											<p>
												No updates on the Data Analyzer.
											</p>
										</div>
									   
										<div class="col-md-4">
											<h4>Website Release Notes: </h4>
											<p>
												No updates on the website
											</p>
										</div>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<h3>General updates:</h3>
										<p>
											We got a test server going to act as an intermediate testing platform in between development and production. This helps avoid problems and allows more extensive tests. Beyond that we aim to keep the test server as close to production as possible. This way we get more accurate results and we will know exactly what we need to do on production prior to release. Last not least we finally got our version control going with project and issue management. This will help writing updates like this and tracking problems and statuses.
										</p>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<h3>Future plans:</h3>
										<p>
											We are almost done with optimizing the Data Miner. It needs some cleaning up here and there and some small tests for optimizing the small bits. We also would like to finish the bare bones of the websites. This includes looking up specific items and getting the top 100 lists done. This of course includes graphs which is dependant on the data analyzer. Therefor the website and data analyzer depends on each other to be finished.
										</p>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<center style="font-size: 65%;">
											<i>Published: 02-25-2017</i>
										</center>
									</div>
								</div>
							</div>
						</section>
						<!--END SERVICES SECTION-->
					<hr />
						<!--STATS SECTION-->
						<section class="c-blue">
							<div class="container">
								<div class="row ">
								
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.2 </h3>
											<h4>Data miner</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div" style="color: #696969;">
											<h3>0.1 dev </h3>
											<h4>Data Analyzer</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.2.1 </h3>
											<h4>Website</h4>
										</div>
									</div>
									
								</div>
							</div>
						</section>
						<!--END STATS SECTION-->
						<!--SERVICES SECTION-->    
						<section  id="services-sec">
							<div class="container">
								<div class="row ">								   
									<div class="col-md-12">
										<div class="col-md-4 ">
											<h4>Data Miner Release Notes: </h4>
											<p>
												We rewrote the miner to use better call towards the CREST API. This made it so we use less data, more future proof and in general faster. The following features have been added to further help this service develop:
												<ul>
												<li>Increased performance(Data mining time of 23.7 seconds per trade hub)</li>
												<li>Future proof for when new items are added or when items are removed form the game</li>
												<li>Database configurable regions to mine</li>
												<li>Decreased CPU load</li>
												<li>Decreased data usage</li>
												</ul>
											</p>
										</div>
										<div class="col-md-4 ">
											<h4>Data Analyzer Release Notes: </h4>
											<p>
												No updates on the Data Analyzer.
											</p>
										</div>
									   
										<div class="col-md-4">
											<h4>Website Release Notes: </h4>
											<p>
												Small spelling mistakes have been fixed, some small styling errors and other small tweaks.
											</p>
										</div>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<h3>Future plans:</h3>
										<p>
											We need to further optimize the Miner as right now the code works and is stable but not fully optimized yet. We also would like to finish the bare bones of the websites. This includes looking up specific items and getting the top 100 lists done. This of course includes graphs which is dependant on the data analyzer. Therefor the website and data analyzer depends on each other to be finished.
										</p>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<center style="font-size: 65%;">
											<i>Published: 02-23-2017</i>
										</center>
									</div>
								</div>
							</div>
						</section>
						<!--END SERVICES SECTION-->
						<hr />
						<!--STATS SECTION-->
						<section class="c-blue">
							<div class="container">
								<div class="row ">
								
									<div class="col-md-4 ">
										<div class="stats-div" style="color: #696969;">
											<h3>0.1 </h3>
											<h4>Data miner</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div" style="color: #696969;">
											<h3>0.1 dev </h3>
											<h4>Data Analyzer</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.2 </h3>
											<h4>Website</h4>
										</div>
									</div>
									
								</div>
							</div>
						</section>
						<!--END STATS SECTION-->
						<!--SERVICES SECTION-->    
						<section  id="services-sec">
							<div class="container">
								<div class="row ">								   
									<div class="col-md-12">
										<div class="col-md-4 ">
											<h4>Data Miner Release Notes: </h4>
											<p>
												No updates on the Data Miner.
											</p>
										</div>
										<div class="col-md-4 ">
											<h4>Data Analyzer Release Notes: </h4>
											<p>
												No updates on the Data Analyzer.
											</p>
										</div>
									   
										<div class="col-md-4">
											<h4>Website Release Notes: </h4>
											<p>
												We worked on the release notes page, added some work in progress pages and added a mockup for the top 100 lists. A rather minor update overall but further adds to the overall structure of the website.
											</p>
										</div>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<h3>Future plans:</h3>
										<p>
											We hope to expand the crawler to multiple trading hubs as soon as possible. We also would like to finish the bare bones of the websites. This includes looking up specific items and getting the top 100 lists done. This of course includes graphs which is dependant on the data analyzer. Therefor the website and data analyzer depends on each other to be finished.
										</p>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<center style="font-size: 65%;">
											<i>Published: 02-20-2017</i>
										</center>
									</div>
								</div>
							</div>
						</section>
						<!--END SERVICES SECTION-->
						<hr />
						<!--STATS SECTION-->
						<section class="c-blue">
							<div class="container">
								<div class="row ">
								
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.1 </h3>
											<h4>Data miner</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.1 dev </h3>
											<h4>Data Analyzer</h4>
										</div>
									</div>
									
									<div class="col-md-4 ">
										<div class="stats-div">
											<h3>0.1 </h3>
											<h4>Website</h4>
										</div>
									</div>
									
								</div>
							</div>
						</section>
						<!--END STATS SECTION-->
						<!--SERVICES SECTION-->    
						<section  id="services-sec">
							<div class="container">
								<div class="row ">								   
									<div class="col-md-12">
										<div class="col-md-4 ">
											<h4>Data Miner Release Notes: </h4>
											<p>
												The data miner is capable of gathering all sell orders and buy order from Jita every 5 minutes. It processes some of the data prior to inserting it into the database. Because of the crawler we got the following information:
											</p>
											<ul>
												<li>50% of the lowest sell prices(up to 10 orders at a time)</li>
												<li>50% of the highest buy prices(up to 10 orders at a time)</li>
												<li>High Sell price</li>
												<li>Average Sell price</li>
												<li>Lowest Sell Price</li>
												<li>Highest Buy price</li>
												<li>Average Buy price</li>
												<li>Low Buy Price</li>
												<li>Sell Quantity</li>
												<li>Buy Quantity</li>
												<li>Weighted Averages</li>
											</ul>
										</div>
										<div class="col-md-4 ">
											<h4>Data Analyzer Release Notes: </h4>
											<p>
												The data analyzer is not production ready yet. It is able to calculate margins and sort out the best deals based on those margins but the results are not favourable yet. Also no data visualization is ready yet.
											</p>
										</div>
									   
										<div class="col-md-4">
											<h4>Website Release Notes: </h4>
											<ul>
												<li>Front page with information about the system</li>
												<li>Basic navigation in the dashboard</li>
												<li>Secure register and login system</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<h3>Future plans:</h3>
										<p>
											We hope to expand the crawler to multiple trading hubs as soon as possible. We also would like to finish the bare bones of the websites. This includes looking up specific items and getting the top 100 lists done. This of course includes graphs which is dependant on the data analyzer. Therefor the website and data analyzer depends on each other to be finished.
										</p>
									</div>
								</div>
								<div class="row ">								   
									<div class="col-md-12">
										<center style="font-size: 65%;">
											<i>Published: 02-19-2017</i>
										</center>
									</div>
								</div>
							</div>
						</section>
						<!--END SERVICES SECTION-->
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
