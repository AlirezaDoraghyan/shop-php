<?php
/**
 * Created by PhpStorm.
 * User: Prime
 * Date: 10/7/2020
 * Time: 9:00 PM
 */

class uploads
{
    private static $size;
    private static $type;
    private static $name;
    private static $dest;
    public static $return_name;

    public static function size($size_file=0)
    {
        return self::$size = $size_file;
    }

    public static function type($types_file = [])
    {
        return self::$type = $types_file;
    }

    public static function name($name_file = "")
    {
        return self::$name = $name_file;
    }

    public static function dest($dest_file = "")
    {
        return self::$dest = $dest_file;
    }

    public static function go_file()
    {
        if (isset($_FILES[self::$name]) && $_FILES[self::$name] != "") {
            if ($_FILES[self::$name]['name'] != "" || $_FILES[self::$name]['error'] > 0) {
                if (is_uploaded_file($_FILES[self::$name]['tmp_name'])) {
                    $flag = false;
                    foreach (self::$type as $types) {
                        if ($_FILES[self::$name]['type'] == $types) {
                            $flag = true;
                        }
                    }
                    if ($flag == true && $_FILES[self::$name]['size'] < self::$size) {
                        $file_name = $_FILES[self::$name]['name'];
                        $file_name2 = md5($file_name . microtime()) . substr($file_name, -5, 5);
                        self::$return_name = $file_name2;
                        if (move_uploaded_file($_FILES[self::$name]['tmp_name'], self::$dest . $file_name2)) {

                        } else {
                            echo "ارسال فایل با خطا مواجه شد. لطفا مجددا اقدام کنید";
                            exit();
                        }
                    } else {
                        die("فرمت فایل نامعتبر می باشد و یا حجم فایل معتبر نمی باشد");

                    }
                } else {
                    echo "فایل آپلود نشد.";
                }
            }
        } else {
            echo "فایل دارای خطا می باشد";

        }
    }

}

