<?php
/**
 * @category    Example1 - Pay-Per-Product (single crypto currency in payment box)
 * @package     GoUrl Cryptocurrency Payment API 
 * copyright 	(c) 2014-2017 Delta Consultants
 * @crypto      Supported Cryptocoins -	Bitcoin, BitcoinCash, Litecoin, Dash, Dogecoin, Speedcoin, Reddcoin, Potcoin, Feathercoin, Vertcoin, Peercoin, MonetaryUnit
 * @website     https://gourl.io/bitcoin-payment-gateway-api.html#p1
 * @live_demo   https://gourl.io/lib/examples/pay-per-product.php
 */ 
	
	require_once( "cryptoapi_php/cryptobox.class.php" );

	
	/**** CONFIGURATION VARIABLES ****/ 
	
	$userID 		= "";				// place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
										// you don't need to use userID for unregistered website visitors
										// if userID is empty, system will autogenerate userID and save in cookies
	$userFormat		= "COOKIE";			// save userID in cookies (or you can use IPADDRESS, SESSION)
	$orderID 		= "invoice000383";	// invoice number - 000383
	$amountUSD		= 5.00;				// invoice amount - 5.00 USD
	$period			= "NOEXPIRY";		// one time payment, not expiry
	$def_language	= "en";				// default Payment Box Language
	$public_key		= "16914AAkUmYCBitcoin77BTCPUBa2dR770wNNstdk7hmp8s3ew"; // from gourl.io
	$private_key	= "16914AAkUmYCBitcoin77BTCPRV6pwgOMgxMq81Fn9nMCnWTGr";// from gourl.io

	// IMPORTANT: Please read description of options here - https://gourl.io/api-php.html#options  
	
	// *** For convert Euro/GBP/etc. to USD/Bitcoin, use function convert_currency_live() with Google Finance
	// *** examples: convert_currency_live("EUR", "BTC", 22.37) - convert 22.37 Euro to Bitcoin
	// *** convert_currency_live("EUR", "USD", 22.37) - convert 22.37 Euro to USD

	/********************************/


	
	
	
	
	/** PAYMENT BOX **/
	$options = array(
			"public_key"  => $public_key, 	// your public key from gourl.io
			"private_key" => $private_key, 	// your private key from gourl.io
			"webdev_key"  => "", 		// optional, gourl affiliate key
			"orderID"     => $orderID, 		// order id or product name
			"userID"      => $userID, 		// unique identifier for every user
			"userFormat"  => $userFormat, 	// save userID in COOKIE, IPADDRESS or SESSION
			"amount"   	  => 0,				// product price in coins OR in USD below
			"amountUSD"   => $amountUSD,	// we use product price in USD
			"period"      => $period, 		// payment valid period
			"language"	  => $def_language  // text on EN - english, FR - french, etc
	);

	// Initialise Payment Class
	$box = new Cryptobox ($options);
	
	// coin name
	$coinName = $box->coin_name(); 
	
	// Successful Cryptocoin Payment received
	if ($box->is_paid()) 
	{
		if (!$box->is_confirmed()) {
			$message =  "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Awaiting transaction/payment confirmation";
		}											
		else 
		{ // payment confirmed (6+ confirmations)

			// one time action
			if (!$box->is_processed())
			{
				// One time action after payment has been made/confirmed
				// !!For update db records, please use function cryptobox_new_payment()!!
				 
				$message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>(User will see this message one time after payment has been made)"; 
				
				// Set Payment Status to Processed
				$box->set_status_processed();  
			}
			else $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>(User will see this message during ".$period." period after payment has been made)"; // General message
		}
	}
	else $message = "This invoice has not been paid yet";
	
	
	// Optional - Language selection list for payment box (html code)
	$languages_list = display_language_box($def_language);





	// ...
	// Also you need to use IPN function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "") 
	// for send confirmation email, update database, update user membership, etc.
	// You need to modify file - cryptobox.newpayment.php, read more - https://gourl.io/api-php.html#ipn
	// ...
		
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $coinName; ?>Pay-Per-Product</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='Expires' content='-1'>
	<meta name='robots' content='all'>
	<script src='cryptoapi_php/cryptobox.min.js' type='text/javascript'></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style_common.css" type="text/css" media="screen" />	
	<link rel="stylesheet" href="css/style3.css" type="text/css" media="screen" />	
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
        			<li class="active"><a href="product.html">Products</a></li>
        			<li><a href="contact.html">Contact</a></li>
     		 	</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.html"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a></li>
        <li><a href="login.html"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 </nav>
</head>
<body style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;margin:0'>
<div align='center' style='position:absolute;top:80px;padding-bottom:100px;left:27%;'>
<h1>Meats &amp; Fish Bundle - Customer Invoice</h1>
<br>
<img style='position:absolute;margin-left:auto;margin-right:auto;left:150px;right:0;top:75px;' alt='status' src='https://gourl.io/images/<?php echo ($box->is_paid()?"paid":"unpaid"); ?>.png'>
<img alt='Invoice' border='0' height='310' src='Invoice.png'>
<div style='position:absolute;top:260px;padding-bottom:100px;left:19%;'><p style='font-family:'Segoe UI',Arial,sans-serif;font-size:16px;color:#fff !important;margin:0'><strong>Meats &amp; Fish Bundle</strong></p></div>

<br><br>
<?php if (!$box->is_paid()) echo "<h2>Pay Invoice Now - </h2>"; else echo "<br><br>";  ?>
<div style='margin:30px 0 5px 300px'>Language: &#160; <?php echo $languages_list; ?></div>
<?php echo $box->display_cryptobox(true, 580, 230); ?>
<br><br><br>
<h3>Message :</h3>
<h2 style='color:#999'><?php echo $message; ?></h2>
</div><br><br><br><br><br><br>	
</body>
</html>