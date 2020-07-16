
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
                <li><a href="javascript:avoid(0)">Manage Books</a></li>
            </ul>
        </div>
    </div>

    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Manage Books</b></h4>

<!--            --><?php
//            if(isset($success_msg)) :
//                ?>
<!--                <div class="alert alert-success" role="alert">-->
<!--                    <strong>Success</strong> --><?//= $success_msg; ?>
<!--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--            --><?php //endif; ?>
<!---->
<!--            --><?php
//            if(isset($error_msg)) :
//                ?>
<!--                <div class="alert alert-danger" role="alert">-->
<!--                    <strong>Failed</strong> --><?//= $error_msg; ?>
<!--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--            --><?php //endif; ?>

            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Publication Name</th>
                                <th>Author Name</th>
                                <th>Purchase Date</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Available Quantity</th>
                                <th>Librarian User Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $get_books_info = "SELECT * FROM `tbl_books`";
                            $run_books_info = mysqli_query($conn, $get_books_info);
                            while($row_books_info = mysqli_fetch_assoc($run_books_info)) :
                                ?>
                                <tr class="text-center">
                                    <td><?= ucwords($row_books_info['book_name']); ?></td>
                                    <td>
                                        <img src="./../uploads/books/<?= $row_books_info['book_image']; ?>" alt="Book Image" width="80px" height="70px">
                                    </td>
                                    <td><?= $row_books_info['book_publication_name']; ?></td>
                                    <td><?= $row_books_info['book_author_name']; ?></td>
                                    <td><?= date('d-M-Y', strtotime($row_books_info['book_purchase_date'])); ?></td>
                                    <td>&#36;<?= $row_books_info['book_price']; ?></td>
                                    <td><?= $row_books_info['book_qty']; ?></td>
                                    <td><?= $row_books_info['available_qty']; ?></td>
                                    <td><?= ucwords($row_books_info['librarian_username']); ?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#view_modal_book_id_<?= $row_books_info['id']; ?>"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:avoid(0)" class="btn btn-primary" data-toggle="modal" data-target="#update_modal_book_id_<?= $row_books_info['id']; ?>"><i class="fa fa-edit"></i></a>
                                        <a href="delete.php?delete_book_id=<?= base64_encode($row_books_info['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete ?')"><i class="fa fa-trash"></i></a>
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


<!-- View Modal -->
<?php
$get_books_info = "SELECT * FROM `tbl_books`";
$run_books_info = mysqli_query($conn, $get_books_info);
while($row_books_info = mysqli_fetch_assoc($run_books_info)) :
?>

<div class="modal fade" id="view_modal_book_id_<?= $row_books_info['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Book Name : </th>
                        <td><?= ucwords($row_books_info['book_name']); ?></td>
                    </tr>
                    <tr>
                        <th>Book Image : </th>
                        <td>
                            <img src="./../uploads/books/<?= $row_books_info['book_image']; ?>" alt="Book Image" width="100px" height="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Publication Name : </th>
                        <td><?= $row_books_info['book_publication_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Author Name</th>
                        <td><?= $row_books_info['book_author_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Purchase Date : </th>
                        <td><?= date('d-M-Y', strtotime($row_books_info['book_purchase_date'])); ?></td>
                    </tr>
                    <tr>
                        <th>Book Price : </th>
                        <td>&#36;<?= $row_books_info['book_price']; ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <th>Book Price : </th>
                        <td>&#36;<?= $row_books_info['book_qty']; ?></td>
                    </tr>
                    <tr>
                        <th>Available Quantity : </th>
                        <td><?= $row_books_info['available_qty']; ?></td>
                    </tr>
                    <tr>
                        <th>Librarian User Name : </th>
                        <td><?= ucwords($row_books_info['librarian_username']); ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php endwhile; ?>

<!-- Update Modal -->
<?php
    $get_books_info = "SELECT * FROM `tbl_books`";
    $run_books_info = mysqli_query($conn, $get_books_info);
    while($row_books_info = mysqli_fetch_assoc($run_books_info)) :
        $edit_books_id = $row_books_info['id'];
        $get_edit_books_info = "SELECT * FROM `tbl_books` WHERE id = '$edit_books_id '";
        $run_edit_books_info = mysqli_query($conn, $get_edit_books_info);

        $row_edit_books_info = mysqli_fetch_assoc($run_edit_books_info)
?>


<?php
    $data = $_POST;
    if(isset($data['update_book'])) {
//        print_r($data);
//        print_r($file);
        $update_id = $data['id'];
        $book_name = $data['book_name'];
        $book_author_name = $data['book_author_name'];
        $book_publication_name = $data['book_publication_name'];
        $book_purchase_date = $data['book_purchase_date'];
        $book_price = $data['book_price'];
        $book_qty = $data['book_qty'];
        $available_qty = $data['available_qty'];
        $librarian_username = $_SESSION['librarian_username'];

        $get_update_book = "UPDATE `tbl_books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_username`='$librarian_username' WHERE `id` = '$update_id'";
        $run_update_book = mysqli_query($conn, $get_update_book);

        if($run_update_book) {
        
?>
      
           <script type="text/javascript">
               alert("Book Update successfully done.");
               javascript:history.go(-1);
            </script>
               
<?php

        } else {
            
?>
          
           <script type="text/javascript">alert("Book Not Updated *");</script>   
           
<?php
            
        }



    }

?>

    <div class="modal fade" id="update_modal_book_id_<?= $row_books_info['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Information</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <h5 class="mb-md ">Edit Book Info</h5>
                                            <div class="form-group">
                                                <label for="book_name">Book Name</label>
                                                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Book Name" value="<?= $row_edit_books_info['book_name'] ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="book_author_name">Book Author Name</label>
                                                    <input type="text" class="form-control" id="book_author_name" name="book_author_name" placeholder="Book Author Name" value="<?= $row_edit_books_info['book_author_name'] ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="book_publication_name">Book publication Name</label>
                                                    <input type="text" class="form-control" id="book_publication_name" name="book_publication_name" placeholder="Book Publication Name" value="<?= $row_edit_books_info['book_publication_name'] ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="book_purchase_date">Book Purchase Date</label>
                                                    <input type="date" class="form-control" id="book_purchase_date" name="book_purchase_date" placeholder="Book Purchase Date" value="<?= date($row_edit_books_info['book_purchase_date']);?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="book_price">Book Price</label>
                                                    <input type="number" class="form-control" id="book_price" name="book_price" placeholder="Book Price" value="<?= $row_edit_books_info['book_price'] ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="book_qty">Book Quantity</label>
                                                    <input type="number" class="form-control" id="book_qty" name="book_qty" placeholder="Book Quantity" value="<?= $row_edit_books_info['book_qty'] ;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="available_qty">Available Quantity</label>
                                                    <input type="text" class="form-control" id="available_qty" name="available_qty" placeholder="Available Quantity" value="<?= $row_edit_books_info['available_qty'] ;?>">
                                            </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id" value="<?= $row_edit_books_info['id'] ;?>">
                                            <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Update Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>


<?php include_once("inc/librarian_footer.php"); ?>
