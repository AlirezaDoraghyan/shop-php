<?php
session_start();
if ($_POST['captcha'] == $_SESSION['captcha']) {
} else {
    die('لطفا کد امنیتی را به درستی وارد کنید');
}
include_once "../database/session.php";

// check inputs session
if (isset($_SESSION['user']) &&
    $_SESSION['user'] != "" &&
    $_SESSION['user'] == $_SESSION['login_form']) {
    session::check_login_user([$_SESSION['user']]);
    die("شما قبلا وارد شده اید");
}

if (
    isset($_POST['email']) && $_POST['email'] != "" &&
    isset($_POST['password']) && $_POST['password'] != "" &&
    isset($_POST['token']) && $_POST['token'] != "" &&
    isset($_POST['captcha']) && $_POST['captcha'] != ""
) {

} else {
    die("لطفا مقادیر را کامل وارد کنید.");
}


//include classes _________________________________________________
include_once "../database/database.php";
include_once "../database/checkinput.php";

//is login user  and  isset captcha_________________________________________________

if ($_POST['captcha'] == $_SESSION['captcha']) {
} else {
    die('لطفا کد امنیتی را به درستی وارد کنید');
}
//session::check_captcha_form([$_POST['captcha']]);
session::check_login_token($_POST['token']);

// connect to database and validate_________________________________________________
$con = database::connection('shop', '', 'localhost:1010', 'root');
$email = trim($_POST['email']);
$password = trim($_POST['password']);
if (checkinput::check_input($_POST, [$email, $password]) == true) {
    $password = checkinput::hashpass($password);

    //connect to database and check if input is username for log in _________________________________________________
    if (checkinput::check_username($email) == true) {
        $query = $con->prepare("SELECT * FROM user WHERE username=:email AND password=:password");
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $active = 0;
        $ids = 0;
        $mail = "";
        $pas = "";

        // check if username is register or not _________________________________________________
        if ($query->rowCount() == 1) {
            foreach ($res = $query->fetchAll() as $fetch) {
                $active = $fetch['active'];
                $mail = $fetch['email'];
                $pas = $fetch['password'];
                $ids = $fetch['id'];
            }

            //check if user is active from email or not _________________________________________________
            if ($active == 0) {
                die("شماعضو شده اید اما عضویت شما هنوز فعال نشده. لطفابه ایمیل خود مراجعه کنید و روی لینک فعال سازی خود کلیک کنید");
            } else if ($active == 1 && $pas == $password) {
                if ($mail != "") {
                    $_SESSION['user'] = $mail;
                    $_SESSION['id'] = $ids;
                    echo "شما وارد شدید";

                } else {
                    echo "عضویت شما خراب شده. لطفا با پشتیبانی تماس بگیرید";
                }
            } else {
                die("رمزعبور شما اشتباه می باشد");
            }
        } else {
            die("نام کاربری یا رمز عبور اشتباه می باشد");
        }

        //connect to database and check if input is username for log in _________________________________________________
    } elseif (checkinput::check_mail($email) == true) {
        $query = $con->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $ids =0 ;
        $active = 0;
        $mail = "";
        $pas = "";

        // check if username is register or not _________________________________________________
        if ($query->rowCount()) {
            foreach ($res = $query->fetchAll() as $fetch) {
                $active = $fetch['active'];
                $mail = $fetch['email'];
                $pas = $fetch['password'];
                $ids = $fetch['id'];
            }

            //check if user is active from email or not _________________________________________________
            if ($active == 0) {
                echo "شماعضو شده اید اما عضویت شما هنوز فعال نشده. لطفابه ایمیل خود مراجعه کنید و روی لینک فعال سازی خود کلیک کنید";
            } else if ($active == 1 && $pas == $password) {
                if ($mail != "")
                    $_SESSION['user'] = $mail;
                    $_SESSION['id'] = $ids;
                echo "شما وارد شدید";
            } else {
                echo "رمزعبور شما اشتباه می باشد";
            }
        } else {
            echo "نام کاربری یا رمز عبور اشتباه می باشد";
        }
    } else {
        echo "لطفا مقادیر را به درستی وارد کنید";
    }
} else {
    echo "مقادیر وارد شده کامل نمی باشند";

}
