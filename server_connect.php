<?php
require_once 'login.php';
$connection = new mysqli($hn,$db,$user,$pw);
if ($connection -> connect_error)
die($connection->connect_error);

function mysql_fatal_error($msg){
$err_msg = mysql_error();
	 echo <<< _END
    An error occurred. Please try again.
    Here is what happened:
    <p> $err_msg </p>;
}

?>

