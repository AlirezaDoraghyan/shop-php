<?php
/**
 * Created by PhpStorm.
 * User: Prime
 * Date: 10/3/2020
 * Time: 11:50 AM
 */

class database
{
    private static $dbname;
    private static $dbpass;
    private static $dbhost;
    private static $dbuser;

    public function __construct()
    {
        date_default_timezone_get("Asia/Tehran");
    }

    public static function connection($name, $pass, $host, $dbuser)
    {
        $dname = self::$dbname = $name;
        $dpass = self::$dbpass = $pass;
        $dhost = self::$dbhost = $host;
        $duser = self::$dbuser = $dbuser;
        try {
            return new PDO("mysql:host=$dhost;dbname=$dname", $duser, $dpass,
                array(PDO::MYSQL_ATTR_COMPRESS => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)) ;
        } catch (\Exception $e) {

        }

    }




}

