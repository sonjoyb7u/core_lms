
<!-- page HEADER -->
<!-- ========================================================= -->
<?php 
include_once("inc/librarian_header.php");
?>

<!-- page BODY -->
<!-- ========================================================= -->

<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="./index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Return Books</a></li>
            </ul>
        </div>
    </div>

    <div class="row animated fadeInUp">
       
<?php
        
if( isset($_GET['books_issue_id']) && isset($_GET['book_id']) ) {
    $books_issue_id = base64_decode($_GET['books_issue_id']);
    $book_id = base64_decode($_GET['book_id']);
//    echo $books_issue_id . ' ' . $book_id;
    
    $submit_date = date("d-M-Y");
//    exit();
    $run_books_issue_return = mysqli_query($conn, "UPDATE `tbl_books_issue` SET `book_return_date` = '$submit_date' WHERE `id` = '$books_issue_id'");
    
    if($run_books_issue_return) {
        $get_increase_available_qty = "UPDATE `tbl_books` SET `available_qty`=`available_qty`+1 WHERE `id` = '$book_id'";
        $run_increase_available_qty = mysqli_query($conn, $get_increase_available_qty);
?>

      <script>alert("Book return successfully done.");</script>
       
<?php
        
    } else {
?>
       <script>alert("Book not returned.");</script> 
       
<?php
        
    }
}
        
?>
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Students List</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Reg No.</th>
                                    <th>Email</th>
                                    <th>Book Name</th>
                                    <th>Book Image</th>
                                    <th>Book Issue Date</th>
                                    <th>Return Book</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $get_return_books_info = "SELECT `tbl_books_issue`.`id`,`tbl_books_issue`.`book_id`,`tbl_books_issue`.`book_issue_date`,`tbl_students`.`f_name`,`tbl_students`.`l_name`,`tbl_students`.`roll`,`tbl_students`.`reg`,`tbl_students`.`email`,`tbl_books`.`book_name`,`tbl_books`.`book_image`
                                FROM `tbl_books_issue`
                                INNER JOIN `tbl_students` ON `tbl_students`.`id` = `tbl_books_issue`.`student_id`
                                INNER JOIN `tbl_books` ON `tbl_books`.`id` = `tbl_books_issue`.`book_id`
                                WHERE `tbl_books_issue`.`book_return_date` = ''";
                                $run_return_books_info = mysqli_query($conn, $get_return_books_info);
                                while($row_return_books_info = mysqli_fetch_assoc($run_return_books_info)) :
                            ?>
                                <tr class="text-center">
                                    <td><?= ucwords($row_return_books_info['f_name'] . ' ' . $row_return_books_info['l_name']); ?></td>
                                    <td><?= $row_return_books_info['roll']; ?></td>
                                    <td><?= $row_return_books_info['reg']; ?></td>
                                    <td><?= $row_return_books_info['email']; ?></td>
                                    <td><?= $row_return_books_info['book_name']; ?></td>
                                    <td>
                                        <img src="./../uploads/books/<?= $row_return_books_info['book_image']; ?>" alt="Book Image" width="60px" height="60px">
                                    </td>
                                    <td><?= $row_return_books_info['book_issue_date']; ?></td>
                                    <td>
                                        <a href="return_book.php?books_issue_id=<?= base64_encode($row_return_books_info['id']) ?>&book_id=<?= base64_encode($row_return_books_info['book_id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-exchange" style="font-size: 15px; font-weight: bold; margin-right: 5px;"></i><strong>Return</strong></a>
                                    </td>
                                </tr>
                                
                            <?php endwhile; ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->



<?php include_once("inc/librarian_footer.php"); ?>
