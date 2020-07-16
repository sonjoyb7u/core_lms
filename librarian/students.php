
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
                <li><a href="javascript:avoid(0)">All Students</a></li>
            </ul>
        </div>
    </div>

    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle pull-left"><b>All Students List</b></h4>
            <div class="pull-right"><a href="./print_students.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;&nbsp;Print</a></div>
            <div class="clearfix"></div>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Registration No.</th>
                                <th>Email Address</th>
                                <th>User Name</th>
                                <th>Phone No.</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $get_students_info = "SELECT * FROM `tbl_students`";
                                $run_students_info = mysqli_query($conn, $get_students_info);
                                while($row_students_info = mysqli_fetch_assoc($run_students_info)) :
                            ?>
                            <tr class="text-center">
                                <td><?= ucwords($row_students_info['f_name'] . ' ' . $row_students_info['l_name']); ?></td>
                                <td><?= $row_students_info['roll']; ?></td>
                                <td><?= $row_students_info['reg']; ?></td>
                                <td><?= $row_students_info['email']; ?></td>
                                <td><?= $row_students_info['username']; ?></td>
                                <td><?= $row_students_info['phone']; ?></td>
                                <td><img src="<?= $row_students_info['image']; ?>" alt="Student Image"></td>
                                <td><?= $row_students_info['status'] == 1 ? 'Active':'Inactive'; ?></td>
                                <td>
                                    <?php
                                        if($row_students_info['status'] == 1) {
                                    ?>
                                    <a href="status_inactive.php?student_id=<?= base64_encode($row_students_info['id']); ?>" class="btn btn-warning btn-xs"><i class="fa fa-arrow-circle-down fa-2x"></i></a>
                                    <?php } else { ?>

                                    <a href="status_active.php?student_id=<?= base64_encode($row_students_info['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-circle-up fa-2x"></i></a>
                                    <?php } ?>
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
