<?php
session_start();
function captcha()
{
    $time = round(microtime(true) * 1000);
    $image = imagecreate(150, 45);
    $image_text = imagecolorallocate($image, 14, 90, 83);
    $image_line = imagecolorallocate($image, 38, 175, 162);
    $image_pixel = imagecolorallocate($image, 38, 175, 162);
    $image_back = imagecolorallocate($image, 255, 255, 255);
    $font = $_SERVER['DOCUMENT_ROOT'] . '/shop/captcha/arial.ttf';
    $text = "123456789";
    $word = "";

    imagefilledrectangle($image, 0, 0, 150, 45, $image_back);

    for ($i = 0; $i < 750; $i++) {
        imagesetpixel($image, rand(0, 145), rand(0, 50), $image_pixel);
    }

    for ($i = 0; $i < 5; $i++) {
        imageline($image, 0, rand(0, 50), 200, rand(0, 50), $image_line);
    }

    for ($i = 0; $i < 7; $i++) {
        $txt = $text[rand(0, strlen($text) - 1)];
        imagettftext($image, 15, rand(0, 20), 20 + ($i * 17), 30, $image_text, $font, $txt);
        $word = $word . $txt;
    }
    imagepng($image, $time . '.png');
    $_SESSION['captcha'] = $word;

    $files = glob('*.png');
    foreach ($files as $img) {
        $name = str_replace('.png', '', $img);
        if ($time - $name > 10000) {
            unlink($img);
        }


    }
    echo $time;

}captcha();