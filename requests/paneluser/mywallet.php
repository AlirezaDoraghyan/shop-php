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
$active3 = 0;
foreach ($query->fetchAll() as $data) {
    $active3 = $data['active'];
}
if ($active3 == 1) {
} else {
    echo '<div class="content"><div class="box-of-s-index"><p>عضویت شما هنوز فعال نشده. لطفا برای فعال سازی به ایمیل خود مراجعه کنید</p></div></div>';
    die();
}
include_once '../../database/session.php';
include_once '../../database/checkinput.php';

if (
    isset($_POST['email']) && $_POST['email'] != '' && checkinput::check_mail($_POST['email']) &&
    isset($_POST['descript']) && $_POST['descript'] != '' &&
    isset($_POST['mony']) && $_POST['mony'] != '' && checkinput::chek_number((int)$_POST['mony']) &&
    isset($_POST['token']) && $_POST['token'] != "" &&
    isset($_POST['captcha']) && $_POST['captcha'] != ""

) {
    $email = $_POST['email'];
    $descript = checkinput::check_string($_POST['descript']);
    $mony = (int)$_POST['mony'];


} else {
    die('لطفا مقادیر را به درستی واردکنید');
}
if($email == $_SESSION['user']){
    die("شما نمی توانید به حساب خود پول ارسال کنید");
}
session::check_captcha_form([$_POST['captcha']]);
session::check_login_token($_POST['token']);
$id_sender = 0;
$id_catcher = 0;
$email_catcher = "";
$sql = $connection->prepare("SELECT id,email,active FROM user WHERE email=:email");
$sql->bindParam(":email", $email);
$sql->execute();
if ($sql->rowCount() == 1) {
    $active2 = 0;
    foreach ($sql->fetchAll() as $data) {
        $active2 = $data['active'];
        $id_catcher = $data['id'];
        $email_catcher = $data['email'];
    }
    if ($active2 == 1) {
    } else {
        echo '<div class="content"><div class="box-of-s-index"><p>عضویت دریافت کننده هنوز فعال نشده. شخص دریافت کننده ابتدا باید عضویت خود را فعال نمایید</p></div></div>';
        die();
    }
} else {
    die("ایمیل دریافت کننده صحیح نمی باشد");
}
$wallet = 0;
$sql2 = $connection->prepare("SELECT id,walet FROM user WHERE email=:email");
$sql2->bindParam(":email", $_SESSION['user']);
$sql2->execute();
if ($sql->rowCount() == 1) {
    foreach ($sql2->fetchAll() as $item) {
        $wallet = $item['walet'];
        $id_sender = $item['id'];
    }
} else {
    die('عضوت شما دچار مشکلی شده . با بخش پشتیبانی تماس بگیرید');
}
if ($wallet > $mony) {
    $res = ($wallet - $mony);
    $sql3 = $connection->prepare("UPDATE user SET walet=:walets WHERE email=:email");
    $sql3->bindParam(":email", $_SESSION['user']);
    $sql3->bindParam(":walets", $res);
    $sql3->execute();

    $frendwallet = 0;
    $sql4 = $connection->prepare("SELECT walet FROM user WHERE email=:email");
    $sql4->bindParam(":email", $email);
    $sql4->execute();
    foreach ($sql4->fetchAll() as $item) {
        $frendwallet = (int)$item['walet'];
    }

    $result_frend_dmony = ($frendwallet + $mony);


    $sql6 = $connection->prepare("UPDATE user SET walet=:walets WHERE email=:email");
    $sql6->bindParam(":email", $email);
    $sql6->bindParam(":walets", $result_frend_dmony);
    $sql6->execute();


    $sql5 = $connection->prepare("INSERT INTO 
            sends (mony,date,descript,id_user_catcher,id_user_sender,email_catcher,email_sender) 
            VALUES (:mony,:date,:descript,:id_user_catcher,:id_user_sender,:email_catcher,:email_sender)");
    $time = round(microtime(true));
    $sql5->bindParam(":mony", $mony);
    $sql5->bindParam(":date", $time);
    $sql5->bindParam(":descript", $descript);
    $sql5->bindParam(":id_user_catcher", $id_catcher);
    $sql5->bindParam(":id_user_sender", $id_sender);
    $sql5->bindParam(":email_catcher", $email_catcher);
    $sql5->bindParam(":email_sender", $_SESSION['user']);
    $sql5->execute();


    die('تراکنش باموفقیت انجام شد.');

} else {
    die("موجودی شما کافی نمی باشد");
}



