
<!-- page HEADER -->
<!-- ========================================================= -->
<?php include_once("inc/student_header.php");?>

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
            </ul>
        </div>
    </div>

    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Students List</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Book Issue Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>                              
                               <?php
//                                    print_r($_SESSION);
                                    $student_id = $_SESSION['student_id'];
                                    
                                    $run_books_issued = mysqli_query($conn, "SELECT `tbl_books_issue`.`book_issue_date`, `tbl_books`.`book_name`,`tbl_books`.`book_image`
                                    FROM `tbl_books`
                                    INNER JOIN `tbl_books_issue` ON `tbl_books_issue`.`book_id`=`tbl_books`.`id`
                                    WHERE `tbl_books_issue`.`student_id` = '$student_id'");
                                
                                    while($row_books_issued = mysqli_fetch_assoc($run_books_issued)) :
//                                    print_r($row_books_issued);
                                ?>
                               <tr class="text-center">
                                    <td><?= ucwords($row_books_issued['book_name']) ?></td>
                                    <td>
                                        <img src="./../uploads/books/<?= $row_books_issued['book_image'] ?>" alt="Book Image" width="80px" height="80px">
                                    </td>
                                    <td><?= date('d-M-Y', strtotime($row_books_issued['book_issue_date'])) ?></td>
                                    <td></td>                                
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


<?php include_once("inc/student_footer.php"); ?>