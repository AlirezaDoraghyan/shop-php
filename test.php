<?php

function captcha()
{
    $time = microtime(true)*1000;
    $image = imagecreate(250, 50);
    $color_pixel = imagecolorallocate($image, 16, 93, 57);
    $color_back = imagecolorallocate($image, 255, 255, 255);
    $color_font = imagecolorallocate($image, 16, 93, 57);
    $color_line = imagecolorallocate($image, 16, 93, 57);
    imagefilledrectangle($image, 0, 0, 250, 50, $color_back);

    for ($i = 0; $i <= 10; $i++) {
        imageline($image, 0, rand(0, 200), 250, rand(0, 200), $color_line);
    }
    for ($i = 0; $i <= 1000; $i++) {
        imagesetpixel($image, rand(0, 250), rand(0, 200), $color_pixel);
    }

    $text = "abcdefghijklmnopqrstuvwxyz123456789";
    $textlen = strlen($text);
    $font = 'arial.ttf';
    $wor = "";

    for ($i = 0; $i < 6; $i++) {
        $txt = $text[rand(0, $textlen - 1)];
        $wor = $wor . $txt;
    }
    imagettftext($image, 25, 5,20, 35, $color_pixel, $_SERVER["DOCUMENT_ROOT"].'/shop/arial.ttf',  $wor );

//    imagestring($image,658,50,10,$wor,$color_font);


    imagepng($image, $time . 'a.png');


    echo $wor;
}

captcha();
