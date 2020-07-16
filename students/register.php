<?php include_once ("inc/login_head.php");?>

<?php
$data = $_POST;
if(isset($data['student_register'])) {
    $f_name = $data['f_name'];
    $l_name = $data['l_name'];
    $roll = $data['roll'];
    $reg = $data['reg'];
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $data['confirm_password'];
    $new_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);
//    $status = $data['status'];
    $phone = $data['phone'];

    $input_error_msg = [];
    if(empty($f_name)) {
        $input_error_msg['f_name'] = "First name field is required *";
    }
    if(empty($l_name)) {
        $input_error_msg['l_name'] = "Last name field is required *";
    }
    if(empty($roll)) {
        $input_error_msg['roll'] = "Roll field is required *";
    }
    if(empty($reg)) {
        $input_error_msg['reg'] = "Register field is required *";
    }
    if(empty($email)) {
        $input_error_msg['email'] = "Email field is required *";
    }
    if(empty($username)) {
        $input_error_msg['username'] = "User name field is required *";
    }
    if(empty($password)) {
        $input_error_msg['password'] = "Password field is required *";
    }
    if(empty($confirm_password)) {
        $input_error_msg['confirm_password'] = "Confirm Password field is required *";
    }
    if(empty($phone)) {
        $input_error_msg['phone'] = "Phone field is required *";
    }

//    print_r($input_error);
//    echo count($input_error);

    if(count($input_error_msg) == 0) {
        $get_email_check = "SELECT * FROM `tbl_students` WHERE `email` = '$email'";
        $run_email_check = mysqli_query($conn, $get_email_check);
//        print_r($run_email_check);
        $email_check_row = mysqli_num_rows($run_email_check);
//        echo $email_check_row;

        if($email_check_row == 0) {
//            echo "YES";
            $get_username_check = "SELECT * FROM `tbl_students` WHERE `username` = '$username'";
            $run_username_check = mysqli_query($conn, $get_username_check);
//            print_r($run_username_check);
            $username_check_row = mysqli_num_rows($run_username_check);
//            echo $username_check_row;

            if($username_check_row == 0) {
//                echo "OK";

                if(strlen($username) >= 4) {

                    if(strlen($password) > 4) {
                        if($password == $confirm_password) {
                            $get_sql = "INSERT INTO `tbl_students` (`f_name`, `l_name`, `roll`, `reg`, `email`, `username`, `password`, `confirm_password`, `status`, `phone`) VALUES ('$f_name', '$l_name', '$roll', '$reg', '$email', '$username', '$new_password', '$new_confirm_password', '0', '$phone')";
//        echo "Success";

                            $run_sql = mysqli_query($conn, $get_sql);

                            if($run_sql) {
                                $success_msg = "Your Registration Successfully done.";

                            } else {
                                $error_msg = "Registration failed *";

                            }

                        } else {
                            $confirm_password_error = "Password and confirm password does not matched *";
                        }


                    } else {
                        $password_error = "Password must be more than 4 characters *";
                    }
                } else {
                    $username_row_exist = "Username must be more than or equal 4 characters *";
                }
            } else {
                $username_row_exist = "This username already exits *";
            }
        } else {
            $email_row_exist = "This email already exists *";
        }

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

            <div class="wrap reg-std">
                <!-- page BODY -->
                <!-- ========================================================= -->
                <div class="page-body animated shake">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LOGO-->
                    <div class="logo reg-logo">
                        <h2 class="text-center" style="font-weight: bold">L<>M REGISTER</h2>
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

                        <?php
                            if(isset($email_row_exist)) :
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Failed</strong> <?= $email_row_exist; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        <?php endif; ?>

                        <?php
                            if(isset($username_row_exist)) :
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Failed</strong> <?= $username_row_exist; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        <?php endif; ?>

                        <?php
                            if(isset($password_error)) :
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Failed</strong> <?= $password_error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        <?php endif; ?>

                        <?php
                        if(isset($confirm_password_error)) :
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Failed</strong> <?= $confirm_password_error; ?>
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
                                <form action="" method="post">
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="f_name" name="f_name" value="<?= isset($f_name) ? $f_name : ''?>" placeholder="First Name">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php
                                            if(isset($input_error_msg['f_name'])) {
                                                echo '<span class="input_errors">' . $input_error_msg['f_name'] . '</span>';
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name" value="<?= isset($l_name)?$l_name:'' ?>">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['l_name'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['l_name'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="roll" name="roll" placeholder="Roll(6-digits)" pattern="[0-9]{4}" value="<?= isset($roll)?$roll:'' ?>">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['roll'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['roll'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="reg" name="reg" placeholder="Reg. No(4-digits)" pattern="[0-9]{6}" value="<?= isset($reg)?$reg:'' ?>">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['reg'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['reg'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= isset($email)?$email:'' ?>">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['email'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['email'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value="<?= isset($username)?$username:'' ?>">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['username'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['username'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-with-icon">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['password'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['password'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <span class="input-with-icon">
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['confirm_password'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['confirm_password'] . '</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group mt-md">
                                        <span class="input-with-icon">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="01*********" pattern="01[1|3|5|6|7|8|9][0-9]{8}" value="<?= isset($phone)?$phone:'' ?>">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <?php
                                        if(isset($input_error_msg['phone'])) {
                                            echo '<span class="input_errors">' . $input_error_msg['phone'] . '</span>';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="student_register" value="Register" class="btn btn-primary btn-block">
                                    </div>

                                    <div class="form-group text-center">
                                        Have an account?, <a href="student_login.php">Sign In</a>
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
