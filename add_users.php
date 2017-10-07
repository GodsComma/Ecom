<?php
require_once 'login.php';


function add_user($connection, $user,$hn,$pw){
    $query = "INSERT INTO user_table VALUES()";
    $result = $connection->query($query);
    if (!$result)
       die($connection->error);
}

?>