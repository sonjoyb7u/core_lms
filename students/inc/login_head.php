<?php
require_once ("./../database/db.php");

session_start();
if(isset($_SESSION['student_login']) || isset($_COOKIE['email'])) {
    header("Location: index.php");
}
?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library Management</title>

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="./../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="./../assets/stylesheets/css/style.css">
    <link rel="stylesheet" href="./../assets/vendor/style.css">
</head>

<body>