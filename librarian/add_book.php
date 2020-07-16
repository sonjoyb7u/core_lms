
<!-- page HEADER -->
<!-- ========================================================= -->
<?php include_once("inc/librarian_header.php");?>

<!-- page BODY -->
<!-- ========================================================= -->

<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">

<?php
    $data = $_POST;
    $file = $_FILES;
    if(isset($data['add_book'])) {
//        print_r($data);
//        print_r($file);
        $book_name = $data['book_name'];
        $book_author_name = $data['book_author_name'];
        $book_publication_name = $data['book_publication_name'];
        $book_purchase_date = $data['book_purchase_date'];
        $book_price = $data['book_price'];
        $book_qty = $data['book_qty'];
        $available_qty = $data['available_qty'];
        $librarian_username = $_SESSION['librarian_username'];

        $book_image_name1 = $file['book_image']['name'];
        $book_image_name2 = explode('.', $book_image_name1);
        $book_img_ext_name = end($book_image_name2);
//        echo $book_img_ext_name;
        $book_image_tmp = $file['book_image']['tmp_name'];

        $new_book_img_name = date('Ymdhis') . '.' . rand(0, 1000) .'.' . $book_img_ext_name;
//        echo $new_book_img_name;

        $get_insert_book = "INSERT INTO `tbl_books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name', '$new_book_img_name', '$book_author_name', '$book_publication_name', '$book_purchase_date', '$book_price', '$book_qty', '$available_qty', '$librarian_username')";
        $run_insert_book = mysqli_query($conn, $get_insert_book);

        if($run_insert_book) {
            move_uploaded_file($book_image_tmp, './../uploads/books/' . $new_book_img_name);
            $success_msg = "Data Insert successfully done.";

        } else {
            $error_msg = "Data not inserted *";

        }



    }

?>

    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="./index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Add Book</a></li>
            </ul>
        </div>
    </div>

    <div class="row animated fadeInUp">
        <div class="col-sm-8 col-sm-offset-2">

            <?php
            if(isset($success_msg)) :
                ?>
                <div class="alert alert-success" role="alert">
                    <strong>Success</strong> <?= $success_msg; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php
            if(isset($error_msg)) :
                ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Failed</strong> <?= $error_msg; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <h5 class="mb-lg">Add Book</h5>

                                <div class="form-group">
                                    <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="book_image" name="book_image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-4 control-label">Book Author Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_publication_name" class="col-sm-4 control-label">Book publication Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-5 col-sm-8">
                                        <button type="submit" name="add_book" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Add Book</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- RIGHT SIDEBAR -->
<!-- ========================================================= -->


<?php include_once("inc/librarian_footer.php"); ?>