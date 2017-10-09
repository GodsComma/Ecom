<?php
include 'connection.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM user_table WHERE username ='$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if(!$row= mysqli_fetch_assoc($result)){
	echo "Your username or password is incorrect!";
	echo "$password";
	header("Loaction: /home.html");
}
else{
	echo "You are logged in!";
}
?>