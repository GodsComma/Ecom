<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>	
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #login
        {
	        background:url('img/signup_form_s.jpg') no-repeat;
	        z-index:100;
        }
        #congration
        {
            font: 28px 'Segoe UI',Arial,sans-serif;
            width:600px;
            height:600px;
	        position:absolute;
            top: 240px;
            padding-left:85px;
            padding-right:75px;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-inverse">
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
        <li><a href="product.php">Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>
        <li><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="padder">
	<div id="formContainer">
		<form id="login">	
            <div id="congration">
                <p>
                    Thank you for signing up! You will have access to discounts, special deals, and free shipping.
                    Please feel free to browse our stock:
                    <a href="product.php">Products</a>
                </p>
            </div>	
		</form>
	</div>
<!-- Modal -->

<footer class="footer">
  <div class="container">
	&copy; LiveStock 2017 | All Rights Reserved | <a href="terms.html">Terms &amp; Conditions</a> | <a href="sitemap.html">Sitemap</a> | <strong>Break Away From The Herd.</strong>
    </div>
</footer>	
</body>
</html>
