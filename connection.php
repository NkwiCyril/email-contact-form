<?php

$db_name = "client";
$db_host = "localhost";
$db_user = "root";
$db_password = "";

try {
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    
} catch (mysqli_sql_exception $e) {
    echo "Unable to connect to database: ". $e->getMessage();
}

