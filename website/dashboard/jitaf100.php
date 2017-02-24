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
				$nav = 3;
				Global $subNav;
				$subNav = 2;
				include 'include/nav.php';
			?>
		
        <!-- /. NAV SIDE  -->
			
			<div id="page-wrapper" >
				<div id="page-inner">
				    <?php if (login_check($mysqli) == true) : ?>
						<div class="row">
							<div class="col-md-12">
							 <h2>Top 100 Items</h2>   						   
							</div>
						</div>
						<!-- /. ROW  -->
						<hr />
						
						<!-- Start of panel -->
						<div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">#1: Test Item</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#info" data-toggle="tab">Information</a>
												</li>
												<li class=""><a href="#sell" data-toggle="tab">Sell Prices</a>
												</li>
												<li class=""><a href="#buy" data-toggle="tab">Buy Prices</a>
												</li>
												<li class=""><a href="#quantities" data-toggle="tab">Quantities</a>
												</li>
											</ul>

											<div class="tab-content">
												<div class="tab-pane fade active in" id="info">
													<h4>Information Tab</h4>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												</div>
												<div class="tab-pane fade" id="sell">
													<h4>Sell Prices Tab</h4>
													<div class="col-md-12 col-sm-12 col-xs-12">                     
														<div class="panel panel-default">
															<div class="panel-heading">
																Line Chart Example
															</div>
															<div class="panel-body">
																<div id="morris-line-chart"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="buy">
													<h4>Buy Prices Tab</h4>
													<div class="col-md-12 col-sm-12 col-xs-12">                     
														<div class="panel panel-default">
															<div class="panel-heading">
																Area Chart Example
															</div>
															<div class="panel-body">
																<div id="morris-area-chart"></div>
															</div>
														</div>            
													</div> 
												</div>
												<div class="tab-pane fade" id="quantities">
													<h4>Quantities Tab</h4>
													<div class="col-md-12 col-sm-12 col-xs-12">  
														<div class="panel panel-default">
															<div class="panel-heading">
																Bar Chart Example
															</div>
															<div class="panel-body">
																<div id="morris-bar-chart"></div>
															</div>
														</div>  
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
							</div>
						</div>
						<!-- End of panel -->
						
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
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>

      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
