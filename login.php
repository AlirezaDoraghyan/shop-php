<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user'] != "" && preg_match('/^[a-z0-9_\.-]+@{1}[a-z_\.-]{3,7}\.[a-z]{2,4}$/i', $_SESSION['user'])) {
    header('location:../shop');
    exit();
}
include_once "database/session.php";
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<!-- header login page______________________________________-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style/costom.css">
    <link rel="stylesheet" href="style/remond.css">
    <link rel="stylesheet" href="style/animate.css">
    <link rel="stylesheet" href="css/animate.min.css"/>
    <link rel="stylesheet" href="icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/media.css">
    <style media="screen">
        body {
            background: url(images/background-img-slider.jpg) no-repeat center center #555;
            background-attachment: fixed;
            background-size: cover;
            position: absolute;
            width: 100%;
        }
    </style>
    <title></title>


</head>

<body>
<div class="back-img">
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="log-in-box">

                    <!--                    form login__________________________________________________-->
                    <p class="title-log">ورود به سایت</p>
                    <form class="log-in-form" action="requests/login.php" method="post">
                        <div class="in-pute-reg">
                            <label for="name" class="alabel">
                                <i class="fa fa-user-circle-o " aria-hidden="true"></i>
                            </label>
                            <!--                            email______________________________________________________________________-->
                            <input type="text" class="username-register-form" name="email" value=""
                                   placeholder="ایمیل یا نام کاربری">
                        </div>
                        <div class="in-pute-reg">
                            <label for="name" class="alabel">
                                <i class="fa fa-key" aria-hidden="true"></i>
                            </label>
                            <!--                            password ___________________________________________________________________________-->
                            <input type="password" class="username-register-form" name="password" value=""
                                   placeholder="رمز عبور">
                            <input type="text" class="capinput" name="captcha" placeholder="عبارت را وارد کنید">
                            <img src="" class="imagecaptcha" alt="">
                        </div>
                        <!-- tocen___________________________________________________________________________-->
                        <input type="hidden" name="token" value="<?php session::login_token() ?>">
                        <input type="submit" name="" value="ورود" class="username-register-form-submit">

                        <div class="ckeck-id ckeck-id-reg">
                            <input type="checkbox" id="log-in-form-check-id" name="" value="">
                            <label for="log-in-form-check-id">مرا به خاطر بسپار</label>
                        </div>
                        <a href="#" class="log-in-box-a-lost">رمز عبور خود را فراموش کرده اید</a>
                    </form>
                </div>

            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
</div>

<script src="js/jq.js"></script>
<script src="js/swit.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/querys.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="senders/login.js"></script>
</body>

</html>
