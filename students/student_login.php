<?php include_once ("inc/login_head.php"); ?>

<?php

    $data = $_POST;
    if(isset($data['sign_in'])) {
//        print_r($data);
        $email = $data['email'];
        $password = $data['password'];
        $remember = isset($data['remember']) ? $data['remember'] : '';

//        print_r($data);

        $get_info_check = "SELECT * FROM `tbl_students` WHERE `email` = '$email' OR `username` = '$email'";
        $run_info_check = mysqli_query($conn, $get_info_check);
//        print_r($run_info_check);
        if(mysqli_num_rows($run_info_check) == 1) {
            $row_info = mysqli_fetch_assoc($run_info_check);
//            print_r($row_info);

            if(password_verify($password, $row_info['password'])) {
//                echo "YES";
                if($row_info['status'] == 1) {
//                    echo "YES";
                    $_SESSION['student_login'] = $email;
                    $_SESSION['student_id'] = $row_info['id'];
                    if($remember) {
                        setcookie('email', $email, time()+60*60);
                    }
                    header("Location: index.php");

                } else {
                    $error_msg = "Your status is inactive, please contact Librarian admin section *";

                }

            } else {
                $error_msg = "Password is invalid *";

            }
        } else {
            $error_msg = "Email or Username is invalid *";

        }

    }

?>


<div class="container-fluid">
    <div class="row">
        <div class="std_lib">
            <div class="stu_lib_img">
                <img src="./../assets/images/banners/banner-2.jpg" alt="" class="img-responsive">
            </div>
                
            <div  id="lib-std"></div>

            <div class="wrap std-login">
                <!-- page BODY -->
                <!-- ========================================================= -->
                <div class="page-body animated swing">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LOGO-->
                    <div class="logo std-logo">
                        <h2 class="text-center" style="font-weight: bold">L<>M STUDENT LOGIN</h2>

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


                    </div>
                    <div class="box">
                        <!--SIGN IN FORM-->
                        <div class="panel mb-none">
                            <div class="panel-content bg-scale-0">
                                <form method="post" action="">
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?= isset($email)?$email:''?>">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-with-icon">
                                            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                                            <i class="fa fa-key"></i>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox-custom checkbox-primary">
                                            <input type="checkbox" id="remember-me" name="remember">
                                            <label class="check" for="remember-me">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" name="sign_in" value="Sign in">
                                    </div>
                                    <div class="form-group text-center">
                                        <a href="#">Forgot password?</a>
                                        <hr/>
                                         <span>Don't have an account?</span>
                                        <a href="register.php" class="btn btn-block mt-sm">Register</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                </div>
            </div>

        </div>
    </div>
</div>        


<?php include_once ("inc/login_footer.php"); ?>