<?php
include 'connection.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$country = $_POST['country'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$newpassword = sha1($password);

$queryemail = "SELECT * FROM user_table WHERE email='$email'";
$resultemail = mysqli_query($conn, $queryemail);
$queryuser = "SELECT * FROM user_table WHERE username='$username'";
$resultuser = mysqli_query($conn, $queryuser);

if(mysqli_num_rows($resultemail)>0) {
	echo'error1';
	ob_start();
 	header('Location: signup_a.php');
 	exit();
} 
elseif(mysqli_num_rows($resultuser)>0){
	ob_start();
 	header('Location: signup_b.php');
 	exit();
}
else{
	$sql = "INSERT INTO user_table (firstname,lastname,address,zip,city,state,country,email,username,password) 
	VALUES ('$firstname','$lastname','$zip','$city','$address','$state','$country','$email','$username','$newpassword')";
	$result = mysqli_query($conn, $sql);
	ob_start();
	header('Location: signup_s.php');
	exit();
}
?>