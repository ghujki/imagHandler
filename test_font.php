<?php
$text = $_GET['str'];
$screenWidth = isset($_GET['width'])?$_GET['width'] : 0;
date_default_timezone_set('Asia/Shanghai');

$t1 = time();

$date = date('Y.m.d',time());
// Set the content-type
header("Content-type: image/png");
// Create the image
$im = imagecreatetruecolor(200, 100);
// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);

//设置透明底色
imagecolortransparent($im,$white);
//imagefilledrectangle($im, 0, 0, 100, 100, $white);
imagefill($im,0,0,$white);

$t2 = time();
error_log("t2:".($t2 - $t1));

// The text to draw
// Replace path by your own font path
$font = 'lfzt.ttf';

// Add some shadow to the text
//imagettftext($im, 60, 0, 11, 21, $grey, $font, $text);

// Add the text
if ($text) {
    imagettftext($im, 50, 0, 0, 70, $black, $font, $text);
    imagettftext($im, 30, 0, 0, 100, $black, $font, $date);
}


$t = mt_rand(1,4);
$im2 = imagecreatefromjpeg("static/kobe".$t.".jpg");
$arr = getimagesize("static/kobe".$t.".jpg");

// Using imagepng() results in clearer text compared with imagejpeg()
imagecopymerge($im2, $im, 5, 5, 0, 0, imagesx($im), imagesy($im), 63);

//imagepng($im2);
//imagedestroy($im2);

$size = calcWidth($arr[0],$arr[1],$screenWidth);
//modify the picture size to output
$image = imagecreatetruecolor($size[0], $size[1]);
imagecopyresampled($image, $im2, 0, 0, 0, 0,$size[0], $size[1],$arr[0], $arr[1]);

imagejpeg($image);
imagedestroy($image);


function calcWidth($srcWidth,$srcHeight,$screenWidth) {
    $size = array();
    if ($srcWidth <= $screenWidth || $screenWidth == 0) {
        $size[0] = $srcWidth;
        $size[1] = $srcHeight;
    } else {
        $size[0] = $screenWidth;
        $size[1] = $srcHeight * ($screenWidth / $srcWidth);
    }
    return $size;
}
?>
