<?php
session_start();

include_once "../database/session.php";

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

//is login user _________________________________________________
session::check_captcha_form([$_POST['captcha']]);
session::check_register_token([$_POST['token']]);

// connect to database and validate_________________________________________________
$con = database::connection('shop', '', 'localhost', 'root');

$email = trim(checkinput::check_mail($_POST['email']));
$username = trim(checkinput::check_username($_POST['username']));
$password = $_POST['password'];

//check isset inputs and select form data base to check if user register or not_________________________________________________
if (checkinput::check_input($_POST, [$email, $password, $username]) == true) {
    if ($email != false && $password != false && $username != false) {
        $sqlect = $con->prepare("SELECT * FROM user WHERE username=:username OR email= :email");
        $sqlect->bindParam(":username", $username);
        $sqlect->bindParam(":email", $email);
        $sqlect->execute();
        if ($sqlect->rowCount() == 1) {
            die("شخص دیگری با این مقادیر ثبت نام کرده است");
        } else {

            //go to insert data in database_________________________________________________
            $passwords = checkinput::hashpass($password);
            $con = database::connection('shop', '', 'localhost', 'root');
            $sql = $con->prepare("INSERT INTO  user (username,password ,email) VALUES (:username,:passwords ,:email)");
            $sql->bindParam(':username', $username);
            $sql->bindParam(':passwords', $passwords);
            $sql->bindParam(':email', $email);
            $sql->execute();
            echo "عضویت با موفقیت انجام شد. لطفا به ایمیل خود مراجعه کرده و عضویت خود را فعال کنید";
        }

    } else {
        echo " لطفا مقادیر را به درستی وارد کنید";
    }
} else {
    echo "مقادیر وارد شده کامل نمی باشند";

}
