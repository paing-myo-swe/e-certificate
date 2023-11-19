<?php

require('fpdf/fpdf.php');

header('content-type:image/jpeg');

$font = "./calibri.ttf";
$time = time();
$image = imagecreatefromjpeg("certificate-bg.jpg");
$color = imagecolorallocate($image, 19, 21, 22);

$title1 = "CERTIFICATE";
$title2 = "OF ACHIVEMENT";
$title3 = "This certificate is proudly present to";
$title4 = "person above has complete the";

$issuedDate = date('F d, Y');
$issued = "Issued: $issuedDate";
$studentName = "Paing Myo Swe";
$courseName = "Applied Program Management";


imagettftext($image, 120, 0, 1350, 400, $color, $font, $title1);
imagettftext($image, 60, 0, 1480, 550, $color, $font, $title2);
imagettftext($image, 55, 0, 1350, 650, $color, $font, $issued);

imagettftext($image, 70, 0, 1100, 900, $color, $font, $title3);
imagettftext($image, 130, 0, 1230, 1150, $color, $font, $studentName);

imagettftext($image, 70, 0, 1200, 1350, $color, $font, $title4);
imagettftext($image, 90, 0, 1050, 1500, $color, $font, $courseName);

imagejpeg($image, "download-certificate/$time.jpg");
imagedestroy($image);

$pdf = new FPDF();
$pdf->AddPage('L', 'A5');
$pdf->Image("download-certificate/$time.jpg", 0, 0, 210, 148);
ob_end_clean();
$pdf->Output();

