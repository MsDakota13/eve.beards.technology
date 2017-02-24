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
							 <h2>Latest Release notes</h2>   						   
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
								<div class="row ">								   
									<div class="col-md-12">
											<a href="AllReleases.php" class="btn btn-danger" style="float: right;">All release notes <i class="fa fa-arrow-right"></i></a>
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
