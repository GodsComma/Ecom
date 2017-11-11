<?php
session_start();
session_unset();
session_destroy();
$SESSION['login_status'] = false;
header("Location: login.php");
exit();
?>