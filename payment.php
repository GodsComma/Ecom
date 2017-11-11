<?php
    include_once( "cryptoapi_php/cryptobox.class.php" );

    /**** CONFIGURATION VARIABLES ****/ 
    
    $userID         = "";               // place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
                                        // if userID is empty, it will autogenerate userID and save in cookies
    $userFormat     = "COOKIE";         // save userID in cookies (or you can use IPADDRESS, SESSION)
    $orderID        = "invoice000383";  // invoice number - 000383
    $amountUSD      = 2.21;             // invoice amount - 2.21 USD
                                        // for convert fiat currencies Euro/GBP/etc. to USD, use function convert_currency_live()
    $period         = "NOEXPIRY";       // one time payment, not expiry
    $def_language   = "en";             // default Payment Box Language
    $def_payment    = "bitcoin";        // default Coin in Payment Box

    // List of coins that you accept for payments
    // For example, for accept payments in bitcoins, dogecoins use - $available_payments = array('bitcoin', 'dogecoin'); 
    $available_payments = array('bitcoin');
    
    
    // Goto  https://gourl.io/info/memberarea/My_Account.html
    // You need to create record for each your coin and get private/public keys
    // Place Public/Private keys for all your available coins from $available_payments
    
    $all_keys = array(  
        "bitcoin"  => array("public_key" => "16914AAkUmYCBitcoin77BTCPUBa2dR770wNNstdk7hmp8s3ew",  "private_key" => "16914AAkUmYCBitcoin77BTCPRV6pwgOMgxMq81Fn9nMCnWTGr"),
        // etc.
    ); 
        
    /********************************/
    
    
    // Re-test - that all keys for $available_payments added in $all_keys 
    if (!in_array($def_payment, $available_payments)) $available_payments[] = $def_payment;  
    foreach($available_payments as $v)
    {
        if (!isset($all_keys[$v]["public_key"]) || !isset($all_keys[$v]["private_key"])) 
            die("Please add your public/private keys for '$v' in \$all_keys variable");
        elseif (!strpos($all_keys[$v]["public_key"], "PUB"))  die("Invalid public key for '$v' in \$all_keys variable");
        elseif (!strpos($all_keys[$v]["private_key"], "PRV")) die("Invalid private key for '$v' in \$all_keys variable");
        elseif (strpos(CRYPTOBOX_PRIVATE_KEYS, $all_keys[$v]["private_key"]) === false) 
            die("Please add your private key for '$v' in variable \$cryptobox_private_keys, file cryptobox.config.php.");
    }
    
    // Optional - Language selection list for payment box (html code)
    $languages_list = display_language_box($def_language);
    
    // Optional - Coin selection list (html code)
    $coins_list = display_currency_box($available_payments, $def_payment, $def_language);
    $coinName = CRYPTOBOX_SELCOIN; // current selected coin by user
    
    // Current Coin public/private keys
    $public_key  = $all_keys[$coinName]["public_key"];
    $private_key = $all_keys[$coinName]["private_key"];
    
    /** PAYMENT BOX **/
    $options = array(
            "public_key"  => $public_key,   // your public key from gourl.io
            "private_key" => $private_key,  // your private key from gourl.io
            "webdev_key"  => "",            // optional, gourl affiliate key
            "orderID"     => $orderID,      // order id or product name
            "userID"      => $userID,       // unique identifier for every user
            "userFormat"  => $userFormat,   // save userID in COOKIE, IPADDRESS or SESSION
            "amount"      => 0,             // product price in coins OR in USD below
            "amountUSD"   => $amountUSD,    // we use product price in USD
            "period"      => $period,       // payment valid period
            "language"    => $def_language  // text on EN - english, FR - french, etc
    );

    // Initialise Payment Class
    $box = new Cryptobox ($options);
    
    // coin name
    $coinName = $box->coin_name(); 
    
    // Successful Cryptocoin Payment received
    if ($box->is_paid()) 
    {
        // Optional - use IPN (instant payment notification) function cryptobox_new_payment() for update db records, etc
        // IPN description: https://gourl.io/api-php.html#ipn   
    
        if (!$box->is_confirmed()) {
            $message =  "Thank you for payment (payment #".$box->payment_id()."). Awaiting transaction/payment confirmation";
        }                                           
        else 
        { // payment confirmed (6+ confirmations)

            // one time action
            if (!$box->is_processed())
            {
                // One time action after payment has been made/confirmed
                 
                $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). We will send soon";
                
                // Set Payment Status to Processed
                $box->set_status_processed();  
            }
            else $message = "Thank you. Your order is in process"; // General message
        }
    }
    else $message = "This invoice has not been paid yet";
    
    
    
    // ...
    // Also you can use IPN function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "") 
    // for send confirmation email, update database, update user membership, etc.
    // You need to modify file - cryptobox.newpayment.php, read more - https://gourl.io/api-php.html#ipn
    // ...

    
?>

<!DOCTYPE html>
<html><head>
<title>Pay-Per-Product Cryptocoin (payments in multiple cryptocurrencies) Payment Example</title>
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='Expires' content='-1'>
<script src='cryptobox.min.js' type='text/javascript'></script>
</head>
<body style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;margin:0'>
<div align='center'>

<h1>Invoice (Example)</h1>
<br>
<img style='position:absolute;margin-left:auto;margin-right:auto;left:0;right:0;' alt='status'  
    src='https://gourl.io/images/<?= ($box->is_paid()?"paid":"unpaid")  ?>.png'>
<img alt='Invoice' border='0' height='500' src='https://gourl.io/images/invoice.png'>
<br><br>
<? if (!$box->is_paid()) echo $coins_list . "<br><br><h2>Pay Invoice Now - </h2>";  ?>
<br><br>
<div style='margin:30px 0 5px 300px'>Language: &#160; <?= $languages_list ?></div>
<?= $box->display_cryptobox() ?>
<br><br><br>
<h3>Message :</h3>
<h2 style='color:#999'><?= $message ?></h2>
<br><br><br><br><br><br>
</div>
</body>
</html>
