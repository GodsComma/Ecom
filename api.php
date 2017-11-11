<?php
function convert_price($usd_price)
{
    $url = "https://api.bitfinex.com/v1/ticker/btcusd";
    $json = json_decode(file_get_contents($url), true);
    $price = 1/$json["last_price"];
    echo "USD Price: \$";
    echo sprintf("%0.2f",$usd_price) . " || " . "BTC Price: ";
    echo round($price, 7)*$usd_price; 
    echo " BTC";
}
?>  