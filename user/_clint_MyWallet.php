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
            <p><i class="fa fa-money"></i><b>کیف پول</b></p>
        </div>

        <div class="money-box">
            <div class="moch-money">
                <p class="moch-money-p">موجودی کیف پول شما : <span class="moch-nom-money"><span
                                class="moch-nom-money1"><?php echo $walet ?></span>تومان</span>
                </p>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true"><i class="fa fa-plus-circle fa-plus-circle2"></i>افزایش
                        اعتبار کیف پول </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false"><i class="fa fa-random fa-plus-circle2"></i>انتقال
                        کیف پول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact" aria-selected="false"><i class="fa fa-history fa-plus-circle2"></i>تراکنش
                        ها</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form class="index-mony-for-client" action="index.php" method="post">
                        <label for="index-mony-for-client-add" class="index-mony-for-client-add-lable">مبلغ مورد نظر را
                            وارد کنید <span class="s-mony-1"><span class="s-mony-2">0.00</span>تومان</span></label>
                        <input type="number" value="0.00" step="0.01" min="0" max="" name=""
                               id="index-mony-for-client-add" class="index-mony-for-client-add" required="">
                        <input type="submit" name="" value="افزایش کیف پول" class="index-mony-for-client-sub">
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                    <form class="sent-money-to-frend" action="requests/paneluser/mywallet.php" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="email-send-client" class="email-client">لطفا ایمیل دریافت کننده را وارد
                                    کنید</label>
                                <input type="email" id="email-send-client" name="email" class="email-send-client2"
                                       name="" value=""
                                       placeholder="ایمیل دریافت کننده">
                            </div>
                            <div class="col-lg-6">
                                <label for="moch-client-send-number" id="moch-client-send-number2">مقدار </label>
                                <input type="number" value="0.00" step="0.01" min="0" max="" name="mony"
                                       id="moch-client-send-number" class="" required="">
                            </div>
                        </div>
                        <label for="text-send-client" class="descrption-send">توضیحات انتقال</label>
                        <textarea name="descript" id="text-send-client" rows="4" cols="80"
                                  placeholder="توضیحات"></textarea>
                        <input type="hidden" name="token" value="<?php session::login_token() ?>">
                        <div class="row">
                            <div class="col-lg-6"><input type="text" class="capinput" name="captcha"
                                                         placeholder="عبارت را وارد کنید">
                                <img src="<?php include_once "./captcha/captcha.php" ?>.png" class="imagecaptcha"
                                     alt=""></div>
                            <div class="col-lg-6"><input type="submit" class="final-sen-money" name=""
                                                         value="انتقال پول">
                            </div>
                        </div>


                    </form>

                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="bd-example">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="color-tab">ردیف</th>
                                    <th scope="col" class="color-tab">شناسه</th>
                                    <th scope="col" class="color-tab">مبلغ</th>
                                    <th scope="col" class="color-tab">تاریخ</th>
                                    <th scope="col" class="color-tab">توضیحات انتقال</th>
                                    <th scope="col" class="color-tab">طرف مقابل</th>


                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $sql2 = $connection->prepare("SELECT * FROM sends WHERE id_user_sender=:id_user_sender1 OR id_user_catcher=:id_user_catcher1 ORDER BY id DESC ");
                                $sql2->bindParam(":id_user_sender1", $id);
                                $sql2->bindParam(":id_user_catcher1", $id);
                                $sql2->execute();
                                $num = 0;

                                foreach ($sql2->fetchAll() as $result) {

                                    echo ' <tr><th scope="row" class="coll-tab-color">' . $num . '</th>
                                    <td>' . $result['id'] . '</td>
                                    <td>' . $result['mony'] . ' تومن</td>
                                    <td>' . $result['date'] . '</td>';
                                    if ($result['id_user_sender'] == $id) {
                                        echo '<td><p><span style="color:red">انتقال : </span>' . $result['descript'] . '</p></td> </tr>';
                                        echo '<td><p style="">' . $result['email_catcher'] . '</p></td> </tr>';
                                    } elseif ($result['id_user_catcher'] == $id) {
                                        echo '<td><p><span style="color:green">دریافت : </span>' . $result['descript'] . '</p></td> </tr>';
                                        echo '<td><p style="">' . $result['email_sender'] . '</p></td> </tr>';

                                    }
                                    $num++;
                                }

                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>