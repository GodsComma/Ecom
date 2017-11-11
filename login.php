<?php
session_start();
if ( isset($_SESSION['login_status']) == true){
     header('Location: product.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="login_form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/login_form.js" type="text/javascript"></script>
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
                    <li><a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>
                    <li class="active"><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div id="padder">
    <div id="cont">
        <form id="login" method="POST" action="get_info.php">
            <!-- <a href="#" id="flipToRecover" class="flipLink">Forgot?</a> -->
            <input type="text" name="username" id="username" placeholder="Username" required="true">
            <input type="password" name="password" id="password" placeholder="Password" required="true">
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</div>
<footer class="footer">
  <div class="container">
        © LiveStock 2017 | All Rights Reserved | <a href="terms.html">Terms &amp; Conditions</a> | <a href="sitemap.html">Sitemap</a> | <strong>Break Away From The Herd.</strong>
    </div>
</footer>
</body>
</html>