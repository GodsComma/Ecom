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

$sql = "INSERT INTO user_table (firstname,lastname,address,zip,city,state,country,email,username,password) 
VALUES ('$firstname','$lastname','$zip','$city','$address','$state','$country','$email','$username','$newpassword')";

$result = mysqli_query($conn, $sql);
echo("Congratulation on signing up!");
?>
