<?php
/**
 * Created by PhpStorm.
 * User: Prime
 * Date: 10/14/2020
 * Time: 7:27 AM
 */

class checkinput
{
    //  check if isset value from forms
    public static function check_input($value)
    {
        $valid = true;

        foreach ($value as $input) {
            if (isset($input) && $input != "") {
            } else {
                $valid = false;
            }
        }
        return $valid;
    }



    public static function check_string($string)
    {
            return trim(strip_tags(htmlspecialchars($string, ENT_QUOTES)));
    }


    public static function check_mail($email)
    {
        if (preg_match('/^[a-z0-9_\.-]+@{1}[a-z_\.-]{3,7}\.[a-z]{2,4}$/i', $email)) {
            return trim(htmlentities($email));
        } else {
            return false;
        }
    }

    public static function chek_number($number)
    {
        if (preg_match('/^[0-9]+$/',$number)) {
            return trim(htmlentities($number));
        } else {
            return false;
        }
    }

    public static function chek_phone($number)
    {
        if (preg_match('/^09{1}[0-9]{9}$/',$number)) {
            echo trim(htmlentities($number));
        } else {
            return false;
        }
    }


    public static function hashpass($password)
    {
        $hash = hash('sha512', $password).hash('md5', $password).hash('sha512', $password);
        $hash = hash('sha512', $password);
        $hash = hash('sha256', $password);
        return $hash = hash('sha512', $password);
    }

    public static function check_username($username){
        if (preg_match('/^[a-z0-9]{1,15}[_\.-]*[a-z0-9]{1,15}$/i',$username)){
            return trim(htmlentities($username));
        }else{
           return false;
        }
    }

    public static function check_comment($string){
        return htmlentities($string);
    }
}