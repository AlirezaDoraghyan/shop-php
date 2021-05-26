<?php
$query = $connection->prepare("SELECT * FROM user WHERE email = :email");
$query->bindParam(':email', $_SESSION['user']);
$query->execute();
if ($query->rowCount() == 1) {
} else {
    die('حساب کاربری شما قفل شده. لطفا با پشتیبانی تماس بگیرید');
}
include_once "./database/session.php";
$active;
$name = "";
$lastname = "";
$username = "";
$phone = "";
$about = "";
$email = "";
foreach ($query->fetchAll() as $data) {
    $name = $data['name'];
    $lastname = $data['last_name'];
    $username = $data['username'];
    $phone = $data['phone'];
    $about = $data['about'];
    $active = $data['active'];
    $email = $data['email'];
}
if ($active == 1) {
} else {
    echo '<div class="content"><div class="box-of-s-index"><p>عضویت شما هنوز فعال نشده. لطفا برای فعال سازی به ایمیل خود مراجعه کنید</p></div></div>';
    die();
} ?>
<div class="col-lg-9">

    <div class="content">

        <div class="p-title-client-area-content">
            <p><i class="fa fa-address-book"></i><b>جزئیات حساب کاربری</b></p>
        </div>

        <?php
        $time = round(microtime(true)*1000);
        if (isset($_SESSION['success-acount']) && $_SESSION['success-acount'] != "") {
            if ($time-$_SESSION['success-acount']<5000) {
                echo '<div class="sucess"><p> تغییرات با موفقیت ذخیره شد</p></div>';
            }
        }
        ?>


        <form class="" action="requests/paneluser/avatar.php" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-12"><label class="lable-content" for="inp-acunt1"><i class="fa fa-star"
                                                                                       aria-hidden="true"></i>انتخاب تصویر</label><input
                        type="file" name="pictur" placeholder=""value="نتخاب تصویر " class="acontent" id="inp-acunt1"></div>


                <input type="hidden" name="token" value="<?php session::login_token() ?>">

                <input type="text" class="capinput" name="captcha" placeholder="عبارت را وارد کنید">
                <img src="<?php include_once "./captcha/captcha.php" ?>.png" class="imagecaptcha" alt="">
                <div class="col-lg-12"><input type="submit" class="inp-acunt6" value="بارگذاری تصویر پروفایل"></div>
            </div>


        </form>

    </div>


</div>
