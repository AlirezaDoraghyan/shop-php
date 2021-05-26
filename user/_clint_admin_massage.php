<?php
$query = $connection->prepare("SELECT * FROM user WHERE email = :email");
$query->bindParam(':email', $_SESSION['user']);
$query->execute();
if ($query->rowCount() == 1) {
} else {
    die('حساب کاربری شما قفل شده. لطفا با پشتیبانی تماس بگیرید');
}
$active;
$walet = "";
$id = 0;

foreach ($query->fetchAll() as $data) {
    $walet = $data['walet'];
    $id = $data['id'];

}
if ($active == 1) {
} else {
    echo '<div class="content"><div class="box-of-s-index"><p>عضویت شما هنوز فعال نشده. لطفا برای فعال سازی به ایمیل خود مراجعه کنید</p></div></div>';
    die();
}
include_once "./database/session.php";


?>
<div class="col-lg-9">
    <div class="content" id="content">

        <div class="p-title-client-area-content">
            <p><i class="fa fa-envelope-open-o"></i><b>پیام های مدیر سایت</b></p>
        </div>


        <?php


        $sql = $connection->prepare("SELECT user.name,user.avatar,user.id,admin_massage.massage_date,admin_massage.text,admin_massage.admin_id FROM user,admin_massage WHERE admin_massage.admin_id=user.id ORDER BY admin_mass_id DESC ");
        $sql->execute();
        foreach ($sql->fetchAll() as $data) {

            echo '<div class="box-msg">
            <img src="images/avatars/' . $data['avatar'] . '" class="msg-admin-img">
            <p class="p1-msg-admin-img">' . $data['name'] . '<span>' . $data['massage_date'] . '</span></p>
            <p class="p2-msg-admin-img">' . $data['text'] . '</p>
        </div>';

        }


        ?>


    </div>
</div>