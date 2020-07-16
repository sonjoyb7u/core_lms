<?php

$page = explode('/', $_SERVER['PHP_SELF']);
//print_r($page);
//$page = $page[count($page) - 1];
$page = end($page);
//echo $page;
//exit();

require_once("./../database/db.php");

session_start();
if(!isset($_SESSION['student_login']) && !isset($_COOKIE['email'])) {
    header("Location: student_login.php");
}

?>

<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library Management</title>

    <!--load progress bar-->
    <script src="./../assets/vendor/pace/pace.min.js"></script>
    <link href="./../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="./../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="./../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="./../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="./../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="./../assets/stylesheets/css/style.css">
    <link rel="stylesheet" href="./../assets/vendor/style.css">

</head>
<body>