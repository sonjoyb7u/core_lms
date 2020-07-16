<?php
require_once ("./../database/db.php");

$student_id = base64_decode($_GET['student_id']);
//print_r($student_id);
//echo $student_id;

$get_update_status = "UPDATE `tbl_students` SET `status` = '1' WHERE `id` = '$student_id '";

$run_update_status = mysqli_query($conn, $get_update_status);

header("Location: students.php");