<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library Management</title>

    <!--load progress bar-->
    <script src="./../assets/vendor/pace/pace.min.js"></script>
    <link href="./../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
    <link rel="stylesheet" href="assets/vendor/style.css">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="std_lib">
            <div class="stu_lib_img">
                <img src="assets/images/banners/banner-1.jpg" alt="" class="img-responsive">
            </div>
            <div  id="lib-std"></div>
            <div class="lib_mng_sys">
                <h1>Welcome To <span class="type"></span></h1>
            </div>
            <div class="col-sm-4 col-sm-offset-4 lib_stu">
                <a href="librarian/" class="btn btn-primary btn-block">librarian</a>
                <a href="students/" class="btn btn-primary btn-block">student</a>
            </div>
        </div>
    </div>
</div>
    
<!-- <div class="center">
    <span class="type"></span>
</div> -->

    
<!--    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src="assets/vendor/typed-js/typed.min.js"></script>
    <script src="assets/vendor/particles-js/particles.min.js"></script>
    <script src="assets/vendor/particles-js/app.js"></script>
    
    <script>
       var typed = new Typed('.type', {
          strings: [
              "Library",
              "Management",
              "System"
          ],
          typeSpeed: 80,
          backspeed: 80,
          loop: true
        });
    </script>
</body>
</html>