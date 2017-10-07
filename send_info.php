<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($connect"INSERT INTO user_table(firstname,lastname,email,password)VALUES('$firstname','$lastname','$email','$password')");
//Add in zipcode variable support
?>