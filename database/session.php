<?php

/**
 * Created by PhpStorm.
 * User: Prime
 * Date: 10/14/2020
 * Time: 7:26 AM
 */

class session
{
    //  check is log in user
    public static function check_login_user($value)
    {
        foreach ($value as $input) {
            if (preg_match('/^[a-z0-9_\.-]+@{1}[a-z_\.-]{3,7}\.[a-z]{2,4}$/i', $input)) {
               die('شما قبلا وارد شده اید');
            } else {

            }

        }

    }

    //  check captcha
    public static function check_captcha_form($value)
    {

        foreach ($value as $input) {
            if ($input == $_SESSION['captcha']) {
            } else {
                die('لطفا کد امنیتی را به درستی وارد کنید');
            }
        }

    }


    // create token login
    public static function login_token()
    {
        echo $_SESSION['login_form'] = md5(md5(time() . microtime(true)));
    }

    // check token login
    public static function check_login_token($ses){
        if ($ses == $_SESSION['login_form']) {
        } else {
            die("لطفا از خود سایت اقدام به ورود کنید");
        }
    }


    // check token register
    public static function check_register_token($session)
    {
        foreach ($session as $ses)
            if ($ses == $_SESSION['reg_form']) {
            } else {
                die("لطفا از خود سایت اقدام به ورود کنید");
            }

    }

    // create token register
    public static function reg_token()
    {
        echo $_SESSION['reg_form'] = md5(md5(time() . microtime(true)));
    }
}