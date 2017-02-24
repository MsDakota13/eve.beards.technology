<?php
include_once 'include/register.inc.php';
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
				$nav = 5;
				Global $subNav;
				$subNav = 0;
				include 'include/nav.php';
			?>
		
        <!-- /. NAV SIDE  -->
			
			<div id="page-wrapper" >
				<div id="page-inner">
					<div class="row">
						<div class="col-md-12">
						 <h2>Register with us</h2>   						   
						</div>
					</div>
					<!-- /. ROW  -->
					<hr />
						<!-- Registration form to be output if the POST variables are not
						set or if the registration script caused an error. -->
						<?php
						if (!empty($error_msg)) {
							echo $error_msg;
						}
						?>
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									Account Requirements
								</div>
								<div class="panel-body">
									<ul>
										<li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
										<li>Emails must have a valid email format</li>
										<li>Passwords must be at least 8 characters long</li>
										<li>Passwords cannot exceed 128 characters long</li>
										<li>Passwords must contain
											<ul>
												<li>At least one uppercase letter (A..Z)</li>
												<li>At least one lowercase letter (a..z)</li>
												<li>At least one number (0..9)</li>
												<li>At least one punction character(!"#$%&'()*+,\-./:;<=>?@[\]^_`{|}~)</li>
											</ul>
										</li>
										<li>Your password and confirmation must match exactly</li>
									</ul>
								</div>
							</div>
							<form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="registration_form">
								Username: <input type='text' name='username' id='username' class="form-control"  /><br>
								Email: <input type="text" name="email" id="email" class="form-control"  /><br>
								Password: <input type="password" name="password" id="password" class="form-control"  /><br>
								Confirm password: <input type="password" name="confirmpwd" id="confirmpwd"class="form-control" /><br>
								<input class="btn btn-danger btn-lg" type="button" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" /> 
							</form>
						</div>
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
