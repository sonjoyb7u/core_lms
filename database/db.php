<?php

$host_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "db_lm";

$conn = mysqli_connect($host_name, $user_name, $password, $db_name);
mysqli_query($conn, 'SET CHARTER SET utf8');
mysqli_query($conn, "SET SESSION collation_connection = 'utf8_general_ci'");


if(!$conn) {
    echo "Error : " . mysqli_connect_error();
} else {
//    echo "Connected";
}