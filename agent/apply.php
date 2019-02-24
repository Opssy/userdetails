<?php
ob_clean();
ob_start();
session_start();
if (!isset($_COOKIE['user']) || !isset($_COOKIE['password'])) {
	header("location: login.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Travfi-agents</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/styles.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=GFS+Neohellenic:400,400i,700,700i&amp;subset=greek" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
	<div class="center-container">
		<!--header-->
		<div class="header-w3l">
			<a class="navbar-brand" href="index.html">
				<h1 style="color:#89379a;">Travfi</h1>
			</a>
			<!--<p style="color: rgb(111, 116, 121);margin-bottom: 15px;">Thanks for Registering with us. We can’t wait to work with you!
			</p>-->
		</div>
		<!--//header-->
		<!--main-->
	<div class="agileits-register">
		<form action="handlers/process-application.php" method="post">
		<?php
                                if (isset($_SESSION['error'])) {
                                    ?>
                                    <p class="error" style="padding:12px;"><?php echo($_SESSION['error'][0]); unset($_SESSION['error']) ?></p>

                                <?php
                                }
                                ?>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Agency Trade Name:</span>
					<input type="text" name="trade_name" placeholder="Agency Trade Name" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
						<span>Address:</span>
						<input type="text" name="address" placeholder="Address" required=""/>
						<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>State:</span>
					<input type="text" name="state" placeholder="State" required=""/>
					<div class="clear"> </div>
			    </div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>City:</span>
					<input type="text" name="city" placeholder="City" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Postal code:</span>
					<input type="text" name="postal-code" placeholder="Postal Code" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Telephone:</span>
					<input type="text" name="telephone" placeholder="Telephone" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Internet Address/Website:</span>
					<input type="text" name="Website" placeholder="Internet Address/Website" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Active Booking Number:</span>
					<input type="text" name="Website" placeholder="Active Booking Number" required=""/>
					<div class="clear"> </div>
				</div>
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>Registered Company Number:</span>
					<input type="text" name="company-number" placeholder="Registered Company Number" required=""/>
					<div class="clear"> </div>
				</div>	
				<div class="w3_modal_body_grid w3_modal_body_grid1">
					<span>IATA Number:</span>
					<input type="text" name="company-number" placeholder="IATA Number" required=""/>
					<div class="clear"> </div>
		    	</div>	
				<div class="w3_modal_body_grid">
				
				<input type="submit" value="Submit" />
				<div class="clear"></div>
			</form>
		</div>
		
		<!--//main-->
		
	</div>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->		

</body>
</html>