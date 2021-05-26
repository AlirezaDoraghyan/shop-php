<?php
 $query = $connection->prepare("SELECT * FROM user WHERE email = :email");
$query->bindParam(':email', $_SESSION['user']);
$query->execute();
if ($query->rowCount() == 1) {
} else {
    die('حساب کاربری شما قفل شده. لطفا با پشتیبانی تماس بگیرید');
}

if ($active == 1) {
} else {
    echo '<div class="content"><div class="box-of-s-index"><p>عضویت شما هنوز فعال نشده. لطفا برای فعال سازی به ایمیل خود مراجعه کنید</p></div></div>';
    die();
}
include_once "./database/session.php";
?>

<div class="col-lg-9">

    <div class="content">

        <div class="p-title-client-area-content">
            <p><i class="fa fa-address-book"></i><b>جزئیات حساب کاربری</b></p>
        </div>

        <?php
        $time = round(microtime(true) * 1000);
        if (isset($_SESSION['success-password']) && $_SESSION['success-password'] != "") {
            if ($time - $_SESSION['success-password'] < 5000) {
                echo '<div class="sucess"><p> تغییرات با موفقیت ذخیره شد</p></div>';
            }
        }
        ?>


        <form class="change-password" action="requests/paneluser/password.php" method="post">

            <div class="row">


                <div class="col-lg-6"><label class="lable-content" for="inp-acunt1"><i class="fa fa-star"
                                                                                       aria-hidden="true"></i>رمز عبور
                        جدید</label><input
                            type="text" name="newpass" placeholder="" class="acontent" id="inp-acunt1"
                            value="">
                </div>


                <div class="col-lg-6"><label class="lable-content" for="inp-acunt1"><i class="fa fa-star"
                                                                                       aria-hidden="true"></i>تکرار رمز
                        عبور جدید</label><input
                            type="text" name="anewpass" placeholder="" class="acontent" id="inp-acunt1"
                            value="">
                </div>
                <div class="col-lg-6"><label class="lable-content" for="inp-acunt1"><i class="fa fa-star"
                                                                                       aria-hidden="true"></i>رمز عبور
                        قبلی</label><input
                            type="text" name="lasspass" placeholder="" class="acontent" id="inp-acunt1"
                            value="">
                        <input type="hidden" name="token" value="<?php session::login_token() ?>">

                <input type="text" class="capinput" name="captcha" placeholder="عبارت را وارد کنید">
                <img class="imagecaptcha"src="<?php include_once "./captcha/captcha.php" ?>.png"  alt="">
                </div>

                <div class="col-lg-12"><input type="submit" class="inp-acunt6" value="تغییر رمز عبور"></div>
            </div>


        </form>

    </div>


</div>
