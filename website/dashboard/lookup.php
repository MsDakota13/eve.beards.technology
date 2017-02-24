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
				$nav = 4;
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
							 <h2>Lookup Item</h2>
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
						<div class="row">
							<div class="col-md-12">
							 <h2>Unauthorized Access</h2>   						   
							</div>
						</div>
						<!-- /. ROW  -->
						<hr />
						<p>Please login and try again to view this page. If you think this is a mistake, please contact the administrator.</p>
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
