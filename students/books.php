
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
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        <li><a href="javascript:avoid(0)">All Books</a></li>
                    </ul>
                </div>
            </div>

            <div class="row animated fadeInUp">
               <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-content">
                                <form action="" method="post">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input type="text" name="result" class="form-control" id="lefticon" placeholder="Search" required>
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" name="book_search" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                <?php
                
                    if(isset($_POST['book_search'])) {
//                        echo "Book";
                        $result = $_POST['result'];
                
                ?>
                      
                    <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-content">
                                   <div class="row">

                                       <?php
                        
                                            $get_book_search = "SELECT * FROM `tbl_books` WHERE `book_name` LIKE '%$result%' ";
                                            $run_book_search = mysqli_query($conn, $get_book_search);
                                            
                                            $book_found = mysqli_num_rows($run_book_search);
//                                            echo $book_found;
                                            
                                            if($book_found > 0) {

                                                while($row_book_search = mysqli_fetch_assoc($run_book_search)) :

                                       ?>

                                                    <div class="col-sm-3 col-md-2">
                                                        <img src="../uploads/books/<?= $row_book_search['book_image'] ?>" alt="Book Image" width="100px" height="120px">
                                                        <p class="book-name"><?= $row_book_search['book_name'] ?></p>
                                                        <span><strong>Available: </strong><?= $row_book_search['available_qty'] ?></span>
                                                    </div>

                                        <?php   endwhile; ?>
                                       
                                       <?php
                                                
                                            } else {
                                                
                                        ?>
                                              <h4 style="color: red; padding: 0 25px;">Books Not Available here *</h4>
                                               
                                       <?php
                                                
                                            }
                                        
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>   
                       
                       
               <?php
                        
                    } else {
                        
                ?>
                      
                         <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-content">
                                   <div class="row">

                                       <?php
                                            $get_books_info = "SELECT * FROM `tbl_books`";
                                            $run_books_info = mysqli_query($conn, $get_books_info);

                                            while($row_books_info = mysqli_fetch_assoc($run_books_info)) :

                                       ?>

                                        <div class="col-sm-3 col-md-2">
                                            <img src="../uploads/books/<?= $row_books_info['book_image'] ?>" alt="Book Image" width="100px" height="120px">
                                            <p class="book-name"><?= $row_books_info['book_name'] ?></p>
                                            <span><strong>Available: </strong><?= $row_books_info['available_qty'] ?></span>
                                        </div>

                                        <?php endwhile; ?>

                                    </div>
                                </div>
                            </div>
                        </div> 
                       
               <?php
                        
                    }
                
                ?>
                    
               

            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <!-- ========================================================= -->



<?php include_once("inc/student_footer.php"); ?>
