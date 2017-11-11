<?php
session_start();
if ( isset($_SESSION['login_status']) == false){
	 header('Location: login.php');

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LiveStock</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="product.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/twentytwenty.css" type="text/css" media="screen" />	
	<link rel="stylesheet" href="css/style_common.css" type="text/css" media="screen" />	
	<link rel="stylesheet" href="css/style3.css" type="text/css" media="screen" />
	<meta http-equiv="refresh" content="10">	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand" href="home.html">LiveStock</a>
    		</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav" id = "homenav">
					<li><a href="home.html">Home</a></li>
					<li><a href="about.html">About</a></li>					
        			<li class="active"><a href="product.php">Products</a></li>
     		 	</ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['login_status']) == true) : ?>{
        <li><a>Hello! <?php echo($_SESSION['first']);?></a></li>
        <li><a href ="logout.php">logout</a></li>
      <?php else : ?>
        <li><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>
        <li><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
      <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav>
	<!-- Jumbotron -->
	
	<div class = "container">
			<div class="padder"></div>
			<div class = "jumbotron2">
				<h1>Nuts &amp; Seeds</h1>
				<?php 
					require_once("page_visits.php");
				 ?>
			</div>
			<div class="pad_50"></div>
			<div class="multi_cols">
					<img class="side_picture" src='img/walnuts_resize.jpg'/>
					<div class="side_panel_alt">
							<div id="col">
									<p>
										<strong>Classic Bundle</strong> (IN-STOCK); Includes:
										<li style="text-align: left">Peanuts</li>
										<li style="text-align: left">Almonds</li>
										<li style="text-align: left">Cashews</li>
									</p>
									<hr></hr>
									<p>
										<strong>Get Crackin'</strong> (IN-STOCK); Includes:
										<li style="text-align: left">Pecans</li>
										<li style="text-align: left">Walnuts</li>
										<li style="text-align: left">Pistachios</li>
									</p>
									<div class="pad_50"></div>
									<!-- <a href="nuts_payments.php"><button class="btn btn-default btn-lg" OnClick = href="#" id ="buybutton"><i class="fa fa-btc" aria-hidden="true"></i>  Purchase</button></a> -->  
									<form action="https://test.bitpay.com/checkout" method="post" >
										<input type="hidden" name="action" value="checkout" />
										<input type="hidden" name="posData" value="" />
										<input type="hidden" name="data" value="eKH0j0sYXbTiSddl+h3PM1dh8rXx23NhHr3XFlcP0dKZfa6RsU4w0ayWDwY92kHuZzpDb7aPCx77eQBFat5m6hkDhkvTC5cglfjIKBkiJr2aer+gARbUFufRFl419Ne//4O/OkVnJoAmOmaEHoMAIuI//zjwlKBX21WzM4chvbsCr7MBLQ4ZAX7j+ANfTEIF" />
										<input type="image" src="https://test.bitpay.com/img/button-medium.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
									</form>
									<div class="pad_50"></div>
									<div class="pad_50"></div>
									<!-- <a href="nuts_payments.php"><button class="btn btn-default btn-lg" OnClick = href="#" id ="buybutton"><i class="fa fa-btc" aria-hidden="true"></i>  Purchase</button></a> -->
									<form action="https://test.bitpay.com/checkout" method="post" >
										<input type="hidden" name="action" value="checkout" />
										<input type="hidden" name="posData" value="" />
										<input type="hidden" name="data" value="eKH0j0sYXbTiSddl+h3PM1dh8rXx23NhHr3XFlcP0dKZfa6RsU4w0ayWDwY92kHu2KT4K5UIfcCjlYp0lggj9e40pAvt6L2OK6vmSMIfsIpR4aBMNWJMiQTv+jz3IejNK5jwO/4ksceklEDYZGFrXeMPTaLwskMSmj7db1s5AC+qxE7puqZ2v6jjwQC+P2ZE" />
										<input type="image" src="https://test.bitpay.com/img/button-medium.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
									</form>
									<div class="pad_50"></div>
								</div>
								<?php	require_once( "api.php" ); convert_price(5.00)?>
					</div>
			</div>
	</div>
<footer class="footer">
  <div class="container">
  &copy; LiveStock 2017 | All Rights Reserved | <a href="terms.html">Terms &amp; Conditions</a> | <a href="sitemap.html">Sitemap</a> | <strong>Break Away From The Herd.</strong>
    </div>
</footer>		
</body>
</html>