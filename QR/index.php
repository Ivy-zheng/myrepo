<?php


require "../phpqrcode/phpqrcode.php";

$value='https://secure.php.net/';
$filename = 'qrcode_' . time() . '.png';
$errorCorrectionLevel = 'L';
$matrixPointSize = 10;
$margin = 2;
QRcode::png($value, $filename, $errorCorrectionLevel, $matrixPointSize, $margin);   // 这里参数filename不能为false，必须输出二维码文件
$logo = 'logo.png'; //logo的图片地址
$QR = $filename;    //前面生成二维码图片的地址
if($logo !== FALSE){
    $QR = imagecreatefromstring(file_get_contents($QR));
    $logo = imagecreatefromstring(file_get_contents($logo));
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    $logo_qr_width = $QR_width / 5;
    $scale = $logo_width / $logo_qr_width;
    $logo_qr_height = $logo_height / $scale;
    $from_width = ($QR_width - $logo_qr_width) / 2;
    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
}
$finalName = 'final.png'; // 带logo二维码的文件名
imagepng($QR, $finalName);  // 最后生成两个二维码，一个为先前生成的不带logo的二维码，如qrcode_1505115861.png，一个为带logo的二维码,即final.png



// function createQRbyGoogle($data, $width = '200', $height ='200', $choe = 'UTF-8', $EC_level = 'L', $margin= '0') {
//     $chl = urlencode($data);
//     return '<img src="http://chart.apis.google.com/chart?cht=qr&chs='.$width.'x'.$height. '&choe='.$choe .'&chld='.$EC_level.'|'.$margin.'&chl='.$chl . '" />';
// }
 
// $url = 'https://secure.php.net/';
// // $qrcode = createQRbyGoogle($url);
// echo $qrcode;    // 直接在浏览器中显示二维码




// require "../phpqrcode/phpqrcode.php";
//  function png($text,$outfile = false,$level = QR_ECLEVEL_L,$size = 8,$margin = 4,$saveandprint = false)
// {
//     $enc = QRencode::factory($level, $size, $margin);
//     return $enc->encodePNG($text, $outfile, $saveandprint=false);
// }

// $text = "https://secure.php.net/";
// echo png($text);