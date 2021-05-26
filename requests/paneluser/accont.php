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
include_once '../../database/session.php';
if (isset($_POST['captcha']) && $_POST['captcha'] != ""){
}else{
    die("لطفا کد امنیتی را وارد کنید");
}
if (
    isset($_POST['name']) && $_POST['name'] != '' &&
    isset($_POST['lastname']) && $_POST['lastname'] != '' &&
    isset($_POST['phone']) && $_POST['phone'] != '' && preg_match('/^09{1}[0-9]{9}$/', $_POST['phone']) &&
    isset($_POST['about']) && $_POST['about'] != '' &&
    isset($_POST['token']) && $_POST['token'] != "" &&
    isset($_POST['captcha']) && $_POST['captcha'] != ""

) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = (int)$_POST['phone'];
    $about = $_POST['about'];

} else {
    die('لطفا مقادیر را به درستی واردکنید');
}
session::check_captcha_form([$_POST['captcha']]);
session::check_login_token($_POST['token']);


$sql = $connection->prepare("UPDATE user SET name=:name , last_name=:lastname , phone=:phone , about=:about WHERE email=:email");
$sql->bindParam(':name', $name);
$sql->bindParam(':lastname', $lastname);
$sql->bindParam(':phone', $phone);
$sql->bindParam(':about', $about);
$sql->bindParam(':email', $_SESSION['user']);
$sql->execute();
echo "مقادیر با موفقیت ثبت شد";



?>