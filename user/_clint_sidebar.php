<?php
$query = $connection->prepare("SELECT * FROM user WHERE email = :email");
$query->bindParam(':email', $_SESSION['user']);
$query->execute();
if ($query->rowCount() == 1) {
} else {
    die('حساب کاربری شما قفل شده. لطفا با پشتیبانی تماس بگیرید');
}
include_once "./database/session.php";

$avatar = "";
foreach ($query->fetchAll() as $data) {
    $avatar = $data['avatar'];
}
if ($avatar == ""){
    $avatar = "testimo2.png";
}
if ($active == 1) {
} else {
    echo '<div class="content"><div class="box-of-s-index"><p>عضویت شما هنوز فعال نشده. لطفا برای فعال سازی به ایمیل خود مراجعه کنید</p></div></div>';
    die();
} ?>
<div class="sidebar-clientarea">

    <div class="box-img-user">
        <!-- <img src="images/background5.jpg" class="box-img-user-cover"> -->

        <div class="img-users">
            <img src="images/avatars/<?php echo $avatar ?>" class="img-users-user">
            <p class="img-users-user-title">خوش آمدید آقای علیرضا دورقیان</p>
        </div>
    </div>

    <div class="list-power-user">
        <ul>
            <?php
            $sum =0;
            $sql = $connection->prepare("SELECT annousces_visit.annousces_id FROM annousces_visit WHERE user_id=:user");
            $sql->bindParam(":user",$_SESSION['id']);
            $sql->execute();
            $sum = $sql->rowCount();

            $sql2 = $connection->prepare("SELECT * FROM annousces   ORDER BY id DESC ");
            $sql2->execute();
            $sum_an = $sql2->rowCount();
            $res = $sum_an - $sum;

            ?>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=home'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='home'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-tachometer i-icon-user" aria-hidden="true"></i>پیشخوان</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=accont'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='accont'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-address-book i-icon-user" aria-hidden="true"></i>جزئیات حساب کاربری</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=orders'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='orders'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-list i-icon-user" aria-hidden="true"></i>سفارش ها</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=mywallet'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='mywallet'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-download i-icon-user" aria-hidden="true"></i>دانلودها</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=mywallet'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='mywallet'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-money i-icon-user" aria-hidden="true"></i>کیف پول</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=annousces'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='annousces'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-bullhorn i-icon-user" aria-hidden="true"></i>اطلاعیه ها<span style="color:red;float: left;">  <?php if($res !=0) {echo $res;} ?></span></a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=admin-massage'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='admin-massage'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-envelope-open-o i-icon-user" aria-hidden="true"></i>پیغام مدیر</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=support'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='support'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-life-buoy i-icon-user" aria-hidden="true"></i>ارسال تیکت و پشتیبانی</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=comments'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='comments'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-comments-o i-icon-user" aria-hidden="true"></i>دیدگاه ها</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=like'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='like'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-heart-o i-icon-user" aria-hidden="true"></i>علاقه مندی ها</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=avatar'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='avatar'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-sign-out i-icon-user" aria-hidden="true"></i>تصویر پروفایل</a></li>
            <li><a href="<?php echo $_SERVER ["SCRIPT_NAME"].'?page=password'?>" <?php if (isset($_GET['page']) && ($_GET['page'])=='password'){echo "style='color:#35b3a7'";} ?>><i class="fa fa-sign-out i-icon-user" aria-hidden="true"></i>تغییر رمز عبور</a></li>
            <li><a href="exit.php"><i class="fa fa-sign-out i-icon-user" aria-hidden="true"></i>خروج</a></li>
        </ul>
    </div>

</div>