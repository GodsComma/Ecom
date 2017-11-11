<?php

include 'connection.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM user_table WHERE username ='$username' AND password = '$password'";
$first = "SELECT firstname FROM user_table WHERE username ='$username'";
$last = "SELECT lastname FROM user_table WHERE username ='$username'";
$result = mysqli_query($conn, $sql);
if(!$row= mysqli_fetch_assoc($result)){
	header('Location: login_a.php');
}
else{
	session_start();
	$_SESSION['first'] = $username;
	$_SESSION['login_status'] = true;
	$_SESSION['pages_visited'] = array();
	header('Location: mem_home.php');

}
?>