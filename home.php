<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LiveStock</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="about.php">About</a></li>        
        <li><a href="product.php">Products</a></li>
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
	<div class="container">	
		<div class="row">
			<div class="col-lg-12">
        <div class="three-columns">
            <div id="sidebar-left">
                <img src="img/Wine_resize.jpg" class="img-circle">
                <h3>What We Do</h3>
                <p>We negotiate with local farmers and craftmen in the Charlottesville area to deliver high-quality foods to your doorstep, at reasonable prices.</p>
                  
                 <h2>We Are Reliable.</h2>
            </div>
				<div id ="content">
          <div id="middle_message">
          <h1>LiveStock</h1>
          <div id="inner_content">
             <h3>Break Away from the Herd.</h3>
             <hr>
             <div id="button_cols">
             <a href="signup.php"><button class="btn btn-default btn-lg" OnClick = href="signup.php" id ="homebutton"><i class="fa fa-hand-o-right" aria-hidden="true" id ="getstartedfont"></i> Get Started</button></a>  
             <a href="about.php"><button class="btn btn-default btn-lg" OnClick = href="about.php" id ="homebutton"><i class="fa fa-users" aria-hidden="true" id ="getstartedfont"></i> About Us</button></a>  
             <a href="product.php"><button class="btn btn-default btn-lg" OnClick = href="product.php" id ="homebutton"><i class="fa fa-shopping-cart" aria-hidden="true" id ="getstartedfont"></i> Shop</button></a>               
            </div>
          </div>
          </div>
        </div>
            <div id="sidebar-right">
                <img src="img/Meats_resize.jpg" class="img-circle">
                <h3>How Can We Help You?</h3>
                <p>We can connect you with your local community, and provide delicious and healthy foods straight to your doorstep. This can save you time, and makes some of your favorite foods readily available with a few clicks.</p>
                  
                <h2>We Are Convenient.</h2>
            </div>
        <div>
			</div>
		</div>
  </div>
  </div>
  </div>
<div class="tagline">
    <h1>Fast Delivery &amp; Quality Foods <br/> at Affortable Prices</h1>    
</div>

<footer class="footer">
  <div class="container">
    &copy; LiveStock 2017 | All Rights Reserved | <a href="terms.html">Terms &amp; Conditions</a> | <a href="sitemap.html">Sitemap</a> | <strong>Break Away From The Herd.</strong>
  </div>
</footer>




<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
<script type="text/javascript" src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>