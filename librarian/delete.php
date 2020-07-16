<?php
require_once ("./../database/db.php");

$delete_book_id = $_GET;
if(isset($delete_book_id['delete_book_id'])) {
    $delete_id = base64_decode($delete_book_id['delete_book_id']);
//     print_r($delete_id);
    $get_delete_book_info = "DELETE FROM `tbl_books` WHERE `id` = '$delete_id'";
    $run_delete_book = mysqli_query($conn, $get_delete_book_info);

    header("Location: manage_books.php");
}
