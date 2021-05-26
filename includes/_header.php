<?php
session_start();
ob_start();
include_once "./database/session.php";
include_once "./database/database.php";
include_once "./database/checkinput.php";
$connection = database::connection('shop','','localhost','root');
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="" content="">
    <meta name="" content="">
    <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style/costom.css">
    <link rel="stylesheet" href="style/remond.css">
    <link rel="stylesheet" href="style/animate.css">
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style/media.css">
    <link rel="stylesheet" href="js/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/zoom.css">
    <link rel="stylesheet" href="style/mod-side.css">
    <link rel="stylesheet" href="style/client-costum-area.css">

    <title></title>


</head>

<body>
<!-- header and menu mobile -->
<div class="cover-menu-mobile">
    <div class="close"><i class="fa fa-close" aria-hidden="true"></i></div>
    <div class="div-logo-mobile"><img class="logo-mobile" src="images/logoarea.png" alt=""></div>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> <i class="fa fa-list-ul pills-homeicon" aria-hidden="true"></i>منوی اصلی</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-shopping-basket pills-homeicon" aria-hidden="true"></i>سبد خرید <span class="menu-bask">2</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-user-circle-o pills-homeicon" aria-hidden="true"></i>کاربری</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-searche-tab" data-toggle="pill" href="#pills-searche" role="tab" aria-controls="pills-searche" aria-selected="false"><i class="fa fa-search pills-homeicon" aria-hidden="true"></i>جستجو</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            <ul class="ul-menu-class">
                <li><a href="#"><i class="fa fa-home ul-menu-class-icon" aria-hidden="true"></i> خاننه </a>
                    <i class="fa fa-chevron-circle-down tooge-menu" aria-hidden="true"></i>
                    <ul class="ul-menu-class">
                        <li><a href="#"> خاننه </a></li>
                        <li><a href="#">سفر</a></li>
                        <li><a href="#">سلامت</a></li>
                        <li><a href="#">خودرو</a></li>
                        <li><a href="#">دیجیتال</a></li>
                        <li><a href="#">تحریر</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-taxi ul-menu-class-icon" aria-hidden="true"></i>سفر</a></li>
                <li><a href="#"><i class="fa fa-plus-square-o ul-menu-class-icon" aria-hidden="true"></i>سلامت</a></li>
                <li><a href="#"><i class="fa fa-car ul-menu-class-icon" aria-hidden="true"></i>خودرو</a></li>
                <li><a href="#"><i class="fa fa-television ul-menu-class-icon" aria-hidden="true"></i>دیجیتال</a></li>
                <li class="aa"><a href="#"><i class="fa fa-paint-brush ul-menu-class-icon" aria-hidden="true"></i>تحریر</a>
                    <i class="fa fa-chevron-circle-down tooge-menu" aria-hidden="true"></i>
                    <ul class="ul-menu-class">
                        <li><a href="#"> خاننه </a></li>
                        <li><a href="#">سفر</a></li>
                        <li><a href="#">سلامت</a></li>
                        <li><a href="#">خودرو</a></li>
                        <li><a href="#">دیجیتال</a></li>
                        <li><a href="#">تحریر</a></li>
                    </ul>
                </li>
            </ul>
        </div>


        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="bask-product-mobile">
                <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
                <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
                </br>
                <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">2</span> عدد</h5>
                    <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">24000</span> تومان</h6>
                        <i class="fa fa-window-close bask-product-mobile-moch-close" aria-hidden="true"></i>
            </div>

            <div class="bask-product-mobile">
                <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
                <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
                </br>
                <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">2</span> عدد</h5>
                    <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">24000</span> تومان</h6>
                        <i class="fa fa-window-close bask-product-mobile-moch-close" aria-hidden="true"></i>
            </div>

            <div class="bask-product-mobile">
                <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
                <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
                </br>
                <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">2</span> عدد</h5>
                    <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">24000</span> تومان</h6>
                        <i class="fa fa-window-close bask-product-mobile-moch-close" aria-hidden="true"></i>
            </div>

            <div class="bask-product-mobile">
                <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
                <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
                </br>
                <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">2</span> عدد</h5>
                    <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">24000</span> تومان</h6>
                        <i class="fa fa-window-close bask-product-mobile-moch-close" aria-hidden="true"></i>
            </div>



            <div class="info-into-bask-mobile-menu">
                <h5 class="info-into-bask-mobile-menu-h5"> مجموع کالا:<span class="info-into-bask-mobile-menu-h5-span">40</span> عدد</h5>
                <h6 class="info-into-bask-mobile-menu-h6"> جمع قیمت:<span class="info-into-bask-mobile-menu-h6-span">4000</span> تومان</h6>
            </div>
            <a class="go-to-bask-last-mobile-menu" href="#" target="_blank">
                ادامه و ثبت سفارش <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>

        </div>


        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

            <div class="log-in-mobile-form">
                <form class="login-fom-menu-mobile" action="index.html" method="post">
                    <input type="text" name="" value="" placeholder="ایمیل یا نام کاربری">
                    <input type="text" name="" value="" placeholder="رمز عبور">
                    <input type="submit" name="" value="ورود">
                    <p class="a-help-menu-mobil-link-p">
                        <a class="a-help-menu-mobil-link" href="#" target="_blank"><i class="fa fa-warning" aria-hidden="true"></i>رمز عبور خود را فراموش کرده اید ؟</a>
                        <a class="a-help-menu-mobil-link" href="#" target="_blank"><i class="fa fa-user-plus" aria-hidden="true"></i>ثبت نام در سایت</a></p>
                </form>
            </div>



        </div>
        <div class="tab-pane fade" id="pills-searche" role="tabpanel" aria-labelledby="pills-searche-tab">

            <form class="mobile-search-form" action="index.html" method="get">
                <input class="mobile-search-form-value" type="text" name="" value="" placeholder="نام برند یا محصول خود راجستجو کنید">
                <input class="mobile-search-form-submit" type="submit" name="" value="جستجو" placeholder="جستجو">
            </form>

        </div>
    </div>




    <!-- <div class="left left-mobomenu ">
      <a href="#" class="lefti"><i class="fa fa-users " aria-hidden="true"></i>درباره ما </a>
      <a href="#" class="lefti"><i class="fa fa-phone " aria-hidden="true"></i>تماس با ما</a>
      <a href="#" class="lefti"><i class="fa fa-life-bouy " aria-hidden="true"></i>پشتیبانی</a>
      <a href="#" class="lefti"><i class="fa fa-file-text-o" aria-hidden="true"></i>بلاگ</a>

    </div> -->
</div>

<!-- <button - menu mobile -->
<div class="f-head-mobail">
    <div class="men-mobo-1">
        <!-- <i class="fa fa-th menu-mobile" aria-hidden="true"></i> -->
        <img src="images/menu-mobile.svg" alt="">
    </div>

</div>



<!-- basket -->
<div class="cover-basket-desktop"></div>
<div class="basket-desktop">

    <div class="f-basket-desktop">
        <p class="l-basket-desktop-title"> پیش فاکتور سبد خرید شما </p>

        <div class="row">
            <div class="col-lg-6">
                <p class="basket-desktopp1"><i class="fa fa-shopping-basket" aria-hidden="true"></i>تعداد کالا: </p>
            </div>
            <div class="col-lg-6 basket-desktopp1-span"><span>4</span> عدد </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p class="basket-desktopp2"><i class="fa fa-money" aria-hidden="true"></i>قیمت کل: </p>
            </div>
            <div class="col-lg-6 basket-desktopp2-span"><span>40000</span> تومان </div>
        </div>
        <a class="last-of-basket-desktopp" href="#"><i class="fa fa-opencart" aria-hidden="true"></i>ادامه و ثبت سفارش</a>
    </div>

    <div class="l-basket-desktop">

        <p class="l-basket-desktop-title">محتوای سبد خرید شما</p>
        <div class="bask-product-mobile">
            <i class="fa fa-close bask-product-mobile-moch-close-2" aria-hidden="true"></i>
            <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
            <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
            <br>
            <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">۲</span> عدد</h5>
            <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">۲۴۰۰۰</span> تومان</h6>
        </div>
        <div class="bask-product-mobile">
            <i class="fa fa-close bask-product-mobile-moch-close-2" aria-hidden="true"></i>
            <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
            <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
            <br>
            <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">۲</span> عدد</h5>
            <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">۲۴۰۰۰</span> تومان</h6>
        </div>
        <div class="bask-product-mobile">
            <i class="fa fa-close bask-product-mobile-moch-close-2" aria-hidden="true"></i>
            <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
            <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
            <br>
            <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">۲</span> عدد</h5>
            <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">۲۴۰۰۰</span> تومان</h6>
        </div>
        <div class="bask-product-mobile">
            <i class="fa fa-close bask-product-mobile-moch-close-2" aria-hidden="true"></i>
            <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
            <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
            <br>
            <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">۲</span> عدد</h5>
            <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">۲۴۰۰۰</span> تومان</h6>
        </div>
        <div class="bask-product-mobile">
            <i class="fa fa-close bask-product-mobile-moch-close-2" aria-hidden="true"></i>
            <img class="bask-product-mobile-img" src="images/203131.jpg" alt="">
            <h4 class="bask-product-mobile-title">لپتاپ اپل مدل پرو</h4>
            <br>
            <h5 class="bask-product-mobile-moch-p"><span class="bask-product-mobile-moch">۲</span> عدد</h5>
            <h6 class="bask-product-mobile-moch-h"><span class="bask-product-mobile-moch-mony">۲۴۰۰۰</span> تومان</h6>
        </div>

    </div>
</div>
</div>



<!-- header-desktop -->
<header>



    <div class="f-head">
        <div class="row f-head-row">
            <div class="col-lg-2">
                <p class="p-welcome">به فروشگاه ما خوش آمدید</p>
            </div>

            <div class="col-lg-5">
                <form action="index.html" method="post" class="search-form">
                    <input type="text" name="" placeholder="نام کالای خود را جستجو کنید">
                    <input type="submit" name="" value=""><i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="left">
                    <a href="#" class="lefti"><i class="fa fa-users " aria-hidden="true"></i>درباره ما </a>
                    <a href="#" class="lefti"><i class="fa fa-phone " aria-hidden="true"></i>تماس با ما</a>
                    <a href="#" class="lefti"><i class="fa fa-life-bouy " aria-hidden="true"></i>پشتیبانی</a>
                    <a href="#" class="lefti"><i class="fa fa-file-text-o" aria-hidden="true"></i>بلاگ</a>
                    <div class="user-box">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <span>کاربری </span>
                        <div class="box-user-info">
                            <!-- <div class="mosalass"></div> -->


                            <a href="login.php" target="_blank"><i class="fa fa-sign-in" aria-hidden="true"></i> ورود </a>
                            <a href="registeration.php" target="_blank"><i class="fa fa-group" aria-hidden="true"></i> عضویت </a>
                            <a href="clientarea.php" target="_blank"><i class="fa fa-dashboard" aria-hidden="true"></i> پنل کاربری </a>
                            <a href="exit.php" target="_blank"><i class="fa fa-sign-out" aria-hidden="true"></i> خروج </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row f-head-row f-head-row-second">
            <div class="col-lg-2">
                <div class="logoarea">
                    <a href="#"> <img src="images/logoarea.png" alt=""></a>
                </div>
            </div>

            <!-- menus -->
            <div class="col-lg-8">
                <nav>
                    <div class="menu">
                        <ul>
                            <li><a href="#">دیجیتالی</a>
                                <div class="row submenu-div">
                                    <!-- submenus -->
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-3">
                                                <ul>
                                                    <li><a href="#">دیجیتالی</a>
                                                        <ul>
                                                            <li><a href="#">دیجیتالی</a></li>
                                                            <li><a href="#">خانگی</a></li>
                                                            <li><a href="#">بهداشتی</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- sub-pictur -->
                                    <div class="col-lg-3">

                                        <img src="images/4877338.jpg" class="col-imge-menu-submenu">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">خانگی</a></li>
                            <li><a href="#">بهداشتی</a></li>
                            <li><a href="#">دیجیتال</a></li>
                            <li><a href="#">دیجیتال</a></li>
                            <li><a href="#">دیجیتال</a></li>
                            <li><a href="#">دیجیتال</a></li>
                            <li><a href="#">دیجیتال</a></li>
                            <li><a href="#">دیجیتال</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-2">
                <div class="bascet">
                    <span>3</span>
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                </div>
            </div>
        </div>
    </div>
</header>