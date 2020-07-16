
<!-- page HEADER -->
<!-- ========================================================= -->
<?php include_once("inc/librarian_header.php");?>

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
            <?php
//                print_r($librarian_info);                
            ?>
<!--            Cookie set : <?= isset($_COOKIE['email']) ? $_COOKIE['email']:''; ?>-->
           
            <div class="row">
                <?php
                    $get_books_info = "SELECT * FROM `tbl_books`";
                    $run_books_info = mysqli_query($conn, $get_books_info);
//                    print_r($run_students_info);
                
                    $total_books = mysqli_num_rows($run_books_info);
//                    echo $total_students;
                    
                    $get_total_books_info = "SELECT SUM(`book_qty`) AS total FROM `tbl_books` ";
                    $run_total_books_info = mysqli_query($conn, $get_total_books_info);
                    
                    $total_books_qty = mysqli_fetch_assoc($run_total_books_info);
//                    print_r($total_books_qty);
                
                    $get_available_books_info = "SELECT SUM(`available_qty`) AS total FROM `tbl_books` ";
                    $run_available_books_info = mysqli_query($conn, $get_available_books_info);
                    
                    $available_books_qty = mysqli_fetch_assoc($run_available_books_info);
//                    print_r($available_books_qty);



                ?>
               
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-lighter-1">
                        <a href="./manage_books.php">
                            <div class="panel-content">
                                <h1 class="title color-w"><i class="fa fa-users"></i> <?= $total_books.'&nbsp;&nbsp;(T:'.$total_books_qty['total'].'-&nbsp;A:'.$available_books_qty['total'].')' ?> </h1>
                                 
                                <h4 class="subtitle color-darker-1">Total Books</h4>
                            </div>
                        </a>
                    </div>
                </div>
             
             
             
                <?php
                    $get_students_info = "SELECT * FROM `tbl_students`";
                    $run_students_info = mysqli_query($conn, $get_students_info);
                    //                print_r($run_students_info);

                    $total_students = mysqli_num_rows($run_students_info);

                    //                echo $total_students;

                ?>
               
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-darker-1">
                        <a href="./students.php">
                            <div class="panel-content">
                                <h1 class="title color-w"><i class="fa fa-users"></i> <?= $total_students; ?> </h1>
                                <h4 class="subtitle color-lighter-1">Total Students</h4>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                <?php
                    $get_librarians_info = "SELECT * FROM `tbl_librarians`";
                    $run_librarians_info = mysqli_query($conn, $get_librarians_info);
                    //                print_r($run_students_info);

                    $total_librarians = mysqli_num_rows($run_librarians_info);

                    //                echo $total_students;

                ?>
               
                <!--BOX Style 1-->
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel widgetbox wbox-1 bg-lighter-1">
                        <a href="#">
                            <div class="panel-content">
                                <h1 class="title color-w"><i class="fa fa-users"></i> <?= $total_librarians; ?> </h1>
                                <h4 class="subtitle color-darker-1">Total Librarians</h4>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            
        </div>

    </div>

</div>

<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->


<?php include_once("inc/librarian_footer.php"); ?>