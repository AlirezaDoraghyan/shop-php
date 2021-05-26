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

if (
    isset($_POST['token']) && $_POST['token'] != "" &&
    isset($_POST['captcha']) && $_POST['captcha'] != "" &&
    isset($_FILES['pictur']) && $_FILES['pictur'] != ""
) {

} else {
    die('لطفا مقادیر را به درستی واردکنید');
}
session::check_captcha_form([$_POST['captcha']]);
session::check_login_token($_POST['token']);
include_once "../../database/uploads.php";


$last_avatar = "";
$sql2 = $connection->prepare("SELECT avatar FROM user WHERE email=:emaol");
$sql2->bindParam(":emaol", $_SESSION['user']);
if ($sql2->execute() == 1) {
    foreach ($sql2->fetchAll() as $data) {
        $last_avatar = $data['avatar'];
    }
}
if (file_exists('../../images/avatars/' . $last_avatar && $last_avatar !='')) {
    unlink("../../images/avatars/$last_avatar");
}

uploads::name('pictur');
uploads::type(['image/jpeg', 'image/png', 'image/jpg']);
uploads::size(2000000);
uploads::dest('../../images/avatars/');
uploads::go_file();

$nameFile = uploads::$return_name;
$sql = $connection->prepare("UPDATE user SET avatar=:ava WHERE email=:email");
$sql->bindParam(':ava', $nameFile);
$sql->bindParam(':email', $_SESSION['user']);
$sql->execute();


echo "تغیرات ثبت شد.";