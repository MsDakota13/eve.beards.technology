<?php
include_once 'include/db_connect.php';
include_once 'include/functions.php';
?>

		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Dashboard</a> 
            </div>
		<div style="color: white; padding: 15px 50px 0px 50px; float: right; font-size: 16px;"> 
			<?php
				if (isset($_GET['error'])) {
					echo '<p class="error">Error Logging In!</p>';
				}
			?> 
			
			<?php if (login_check($mysqli) == true) : ?>
				<?php echo 'Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '. <a href="include/logout.php" class="btn btn-danger square-btn-adjust">Log out</a>'; ?>
			<?php else : ?>
				<form action="include/process_login.php" method="post" name="login_form">                      
					<div class="col-md-2 col-sm-2" style="font-size: 20px;"> Email: </div><div class="col-md-3 col-sm-3"> <input type="text" name="email" class="form-control" /> </div>
					<div class="col-md-2 col-sm-2" style="font-size: 20px;"> Password: </div><div class="col-md-3 col-sm-3"> <input type="password" name="password" id="password" class="form-control" /> </div>
					<div class="col-md-2 col-sm-2"> <input type="button"  class="btn btn-danger square-btn-adjust" value="Login" onclick="formhash(this.form, this.form.password);" /> </div>
				</form>
			<?php endif; ?>
		</div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
			<br />
				<div class="sidebar-collapse">
					<ul class="nav" id="main-menu">
						<li>
							<a <?php echo ($nav == 1) ? 'class="active-menu"' : ''; ?> href="index.php"><i class="fa fa-home fa-3x"></i> Home</a>
						</li>
						<?php if (login_check($mysqli) == true) : ?>
							<li>
								<a <?php echo ($nav == 2) ? 'class="active-menu"' : ''; ?> href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Top 100 Trades<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a <?php echo ($subNav == 1) ? 'class="active-menu"' : ''; ?> href="jita100.php">Trade Hub: Jita</a>
									</li>
								</ul>
							</li>  
							<li>
								<a <?php echo ($nav == 3) ? 'class="active-menu"' : ''; ?> href="#"><i class="fa fa-clock-o fa-3x"></i> Top 100 Future Trades<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a <?php echo ($subNav == 2) ? 'class="active-menu"' : ''; ?> href="jitaf100.php">Trade Hub: Jita</a>
									</li>
								</ul>
							</li>  
							<li>
								<a <?php echo ($nav == 4) ? 'class="active-menu"' : ''; ?> href="lookup.php"><i class="fa fa-edit fa-3x"></i> Look Up Item</a>
							</li> 
						<?php else : ?>
							<li>
								<a <?php echo ($nav == 5) ? 'class="active-menu"' : ''; ?> href="register.php"><i class="fa fa-id-card fa-3x"></i> Register</a>
							</li> 
						<?php endif; ?>
						<?php if ($_SESSION['rank'] == 1) : ?>
							<li>
								<a <?php echo ($nav == 6) ? 'class="active-menu"' : ''; ?> href="manage.php"><i class="fa fa-clipboard fa-3x"></i> Admin</a>
							</li> 
						<?php endif; ?>
						<li>
							<a <?php echo ($nav == 7) ? 'class="active-menu"' : ''; ?> href="release.php"><i class="fa fa-list fa-3x"></i> Release notes</a>
						</li>
					</ul>
				   
				</div>
            
        </nav>  