<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] != "" && preg_match('/^[a-z0-9_\.-]+@{1}[a-z_\.-]{3,7}\.[a-z]{2,4}$/i', $_SESSION['user'])) {
} else {
    header('location:../../login.php');
}
include_once "../../database/database.php";

$connection = database::connection('shop', '', 'localhost', 'root');

$query = $connection->prepare("SELECT * FROM user WHERE email = :email");
$query->bindParam(':email', $_SESSION['user']);
$query->execute();
if ($query->rowCount() == 1) {
} else {
    die('حساب کاربری شما قفل شده. لطفا با پشتیبانی تماس بگیرید');
}
$active = 0;
foreach ($query->fetchAll() as $data) {
    $active = $data['active'];
}
if ($active == 1) {
} else {
    echo '<div class="content"><div class="box-of-s-index"><p>عضویت شما هنوز فعال نشده. لطفا برای فعال سازی به ایمیل خود مراجعه کنید</p></div></div>';
    die();
}
include_once '../../database/checkinput.php';
if (isset($_POST['lasspass']) && $_POST['lasspass'] != '' &&
    isset($_POST['anewpass']) && $_POST['anewpass'] != '' &&
    isset($_POST['newpass']) && $_POST['newpass'] != '' &&
    isset($_POST['token']) && $_POST['token'] != "" &&
    isset($_POST['captcha']) && $_POST['captcha'] != ""
) {

} else {
    die('لطفا مقادیر را به درستی وارد کنید');
}
include_once "../../database/session.php";
session::check_captcha_form([$_POST['captcha']]);
session::check_login_token($_POST['token']);
$lasspass = checkinput::hashpass($_POST['lasspass']);
$anewpass = checkinput::check_string($_POST['anewpass']);
$newpass = checkinput::check_string($_POST['newpass']);
$dbpass = "";

$sql = $connection->prepare("SELECT password FROM user WHERE email=:email");
$sql->bindParam(':email', $_SESSION['user']);
$sql->execute();
if ($sql->rowCount()) {

} else {
    die('مشکلی در پایگاه داده پیش امده. لطفا با پشتیبانی تماس بگیرید');
}
foreach ($sql->fetchAll() as $pass) {
    $dbpass = $pass['password'];
}
$hasnewpass = checkinput::hashpass($_POST['newpass']);

if ($lasspass == $dbpass && $newpass == $anewpass) {
    $sql = $connection->prepare("UPDATE user SET password=:pass WHERE email=:email ");
    $sql->bindParam(':pass', $hasnewpass);
    $sql->bindParam(':email', $_SESSION['user']);
    $sql->execute();
    echo "رمز عبور تغییر یافت";
} else {
    die("رمز عبور اشتباه می باشد یا تکرار رمز عبور صحیح نمی باشد");
}