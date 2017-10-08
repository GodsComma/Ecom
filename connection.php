<?php
$connection = mysqli_connect('localhost','root','root','user_db');

if(mysqli_connect_errno($connect))
	echo 'A connection was not made successfully.';

?>