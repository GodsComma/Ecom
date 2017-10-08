<?php
require_once('connection.php');
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$zip = $_POST['zip'];
$address = $_POST['address'];
$state = $_POST['state'];
$country = $_POST['country'];
$city = $_POST['city'];
$username = $_POST['username'];


add_user($connection,$firstname,$lastname,$email,$password,$zip,$address,$state,$country,$city,$username);


function add_user($connection, $firstname,$lastname,$email,$password,$zip,$address,$state,$country,$city,$username){
    $query = "INSERT INTO user_table VALUES('$firstname','$lastname','$email','$password','$zip','$address','$state','$country','$city','$username')";
    $result = $connection->query($query);
    if (!$result)
       die($connection->error);
}

/*
mysqli_query($connect"INSERT INTO user_table(firstname,lastname,email,password)VALUES('$firstname','$lastname','$email','$password')");
//Add in zipcode variable support
*/
?>
