
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
                <li><a href="javascript:avoid(0)">Book Issue</a></li>
            </ul>
        </div>
    </div>
    <div class="row animated fadeInUp">
        <div class="col-sm-6 col-sm-offset-3">

<?php

if(isset($_POST['books_issue'])) {
//        echo "<pre>";
//            print_r($_POST);
//        echo "</pre>";
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];
    $book_return_date = $_POST['book_return_date'];

    $get_books_issue = "INSERT INTO `tbl_books_issue` (`student_name`, `student_id`, `book_id`, `book_issue_date`, `book_return_date`) VALUES ('$student_name', '$student_id', '$book_id', '$book_issue_date', '$book_return_date')";
    $run_books_issue = mysqli_query($conn, $get_books_issue);
    
    if($run_books_issue) {
        $get_decrease_available_qty = "UPDATE `tbl_books` SET `available_qty`=`available_qty`-1 WHERE `id` = '$book_id'";
        $run_decrease_available_qty = mysqli_query($conn, $get_decrease_available_qty);
        
?>
      
       <script>alert("Book Issue Successfully done.");</script>
    
<?php
        
    } else {
        
?>
        
       <script>alert("Book are not Issued *");</script>
       
<?php
        
    }


}

?>

            <div class="panel">
                <div class="panel-content">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <form class="form-inline" action="" method="post">
                                <div class="form-group">
                                    <select class="form-control" name="student_id">
                                        <option value="">Select Student</option>
<?php
    $get_students_info = "SELECT * FROM `tbl_students` WHERE `status` = '1'";
    $run_students_info = mysqli_query($conn, $get_students_info);
    while($row_students_info = mysqli_fetch_array($run_students_info)) :
?>
                                        <option value="<?= $row_students_info['id'] ?>">
                                            <?= ucwords($row_students_info['f_name'].' '.$row_students_info['l_name']). ' - ( '.$row_students_info['roll']. ' )' ?>
                                        </option>
<?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
<?php
    if(isset($_POST['search'])) {
        $student_id = $_POST['student_id'];
//        echo $student_id;
        $get_students_info = "SELECT * FROM `tbl_students` WHERE `id` = '$student_id' AND `status` = '1'";
        $run_students_info = mysqli_query($conn, $get_students_info);
        $row_students_info = mysqli_fetch_array($run_students_info);
//        print_r($row_students_info);
?>

                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <h5 class="mb-md ">Books Issue Here:</h5>
                                        <div class="form-group">
                                            <label for="full_name">Student Name :</label>
                                            <input type="text" class="form-control" id="full_name" value="<?= $row_students_info['f_name'].' '.$row_students_info['l_name'] ?>" name="student_name" readonly>
                                            <input type="hidden" value="<?= $row_students_info['id'] ?>" name="student_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_name">Book Name :</label>
                                            <select class="form-control" id="book_name" name="book_id">
                                                <option value="">Select Book</option>
<?php
    $get_books_info = "SELECT * FROM `tbl_books` WHERE `available_qty` > 0";
    $run_books_info = mysqli_query($conn, $get_books_info);
    while($row_books_info = mysqli_fetch_array($run_books_info)) :
?>
                                                <option value="<?= $row_books_info['id'] ?>">
                                                    <?= $row_books_info['book_name'] ?>
                                                </option>
<?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_issue_date">Book Issue Date :</label>
                                            <input type="text" id="book_issue_date" name="book_issue_date" value="<?= date('d-m-Y') ?>" class="form-control" readonly>
                                            <input type="hidden" name="book_return_date">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="books_issue" class="btn btn-primary"><i class="fa fa-save">&nbsp;&nbsp;</i>Save Book Issue</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


<?php } ?>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->


<?php include_once("inc/librarian_footer.php"); ?>