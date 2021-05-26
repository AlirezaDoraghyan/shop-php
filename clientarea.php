<?php
include_once 'includes/_header.php';

if (isset($_SESSION['user']) && $_SESSION['user'] != "" && preg_match('/^[a-z0-9_\.-]+@{1}[a-z_\.-]{3,7}\.[a-z]{2,4}$/i', $_SESSION['user'])) {
} else {
    header('location:login.php');
}
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
?>
<div class="index">
    <div class="row">
        <div class="col-lg-3">
            <?php include_once 'user/_clint_sidebar.php' ?>
        </div>

        <!-- index clint -->
        <?php
        if (isset($_GET['page']) && $_GET['page'] != '') {
            switch ($_GET['page']) {
                case 'home':
                    include_once 'user/_clint_index.php';
                    break;
                case 'accont':
                    include_once 'user/_clint_accont.php';
                    break;
                case 'orders':
                    include_once 'user/_clint_orders.php';
                    break;
                case 'mywallet':
                    include_once 'user/_clint_MyWallet.php';
                    break;
                case 'annousces':
                    include_once 'user/_clint_Announcements.php';
                    break;
                case 'admin-massage':
                    include_once 'user/_clint_admin_massage.php';
                    break;
                case 'support':
                    include_once 'user/_clint_support.php';
                    break;
                case 'comments':
                    include_once 'user/_clint_comments.php';
                    break;
                case 'like':
                    include_once 'user/_clint_clientarea_like.php';
                    break;
                case 'avatar':
                    include_once 'user/_clint_avatar.php';
                    break;
                case 'password':
                    include_once 'user/_clint_password.php';
                    break;
                case 'exit':
                    header('location:../shop');
            }
        } else {
            include_once 'user/_clint_index.php';

        }

        ?>


    </div>
</div>

<?php include_once 'includes/_footer.php' ?>
<script src="senders/user/accont.js"></script>

</body>

</html>
