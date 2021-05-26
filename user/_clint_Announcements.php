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
            <p><i class="fa fa-bullhorn"></i><b>اطلاعیه ها</b></p>
        </div>

        <?php
        $arr = [];
        $sql2 = $connection->prepare("SELECT * FROM annousces_visit WHERE user_id=:id");
        $sql2->bindParam(':id', $_SESSION['id']);
        $sql2->execute();
        foreach ($sql2->fetchAll() as $dd) {
            $arr[] = $dd['annousces_id'];
        }


        $sql = $connection->prepare("SELECT * FROM annousces ORDER BY id DESC ");
        $sql->execute();
        foreach ($sql->fetchAll() as $data) {

            if (in_array($data['id'], $arr)) {
                echo '   <div class="title-slid-coll-all">
            <div class="title-slid-coll-all-click " id="' . $data['id'] . '"><b>
                    <i class="fa fa-plus-square pluss-open puses1"> ' . $data['id'] . '</i>
                    <i class="fa fa-minus-square pluss-open color-man puses2 pusshide"></i> ' . $data['title'] . '</b>
            </div>
            <div class="title-slid-coll-all-content">
                <p>' . $data['description'] . '</p>
            </div>
        </div>';
            } else {
                echo '   <div class="title-slid-coll-all">
            <div class="title-slid-coll-all-click " id="' . $data['id'] . '"><b>
                    <i class="fa fa-plus-square pluss-open puses1"  style="color:red"> ' . $data['id'] . '</i>
                    <i class="fa fa-minus-square pluss-open color-man puses2 pusshide"></i> ' . $data['title'] . '</b>
            </div>
            <div class="title-slid-coll-all-content">
                <p>' . $data['description'] . '</p>
            </div>
        </div>';
            }


        }


        ?>


    </div>
</div>