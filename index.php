<?php

require('fpdf/fpdf.php');
header('content-type:image/jpeg');

// Create a image from jpeg
$image = imagecreatefromjpeg("certificate-bg.jpg");

// Create image color
$black = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 255, 0, 0);

// Path to our font file
$font = "./fonts/calibri.ttf";
$fontForStudentName = "./fonts/Z06-Classic-Regular.ttf";

$title1 = 'CERTIFICATE OF COMPLETION';
    // We create our bounding box for the title1 text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(120, 0, $font, $title1);
    // This is title1 cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) - 700;
    // Write title1
    imagettftext($image, 120, 0, $x, $y, $black, $font, $title1);

    $title2 = "This is certify that";
    // We create our bounding box for the title2 text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(60, 0, $font, $title2);
    // This is title2 cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) - 450;
    // Write title2
    imagettftext($image, 60, 0, $x, $y, $black, $font, $title2);

    $studentName = "Paing Myo Swe";
    // We create our bounding box for the studentName text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(120, 0, $fontForStudentName, $studentName);
    // This is studentName cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) - 300;
    // Write studentName
    imagettftext($image, 120, 0, $x, $y, $red, $fontForStudentName, $studentName);

    $title4 = "Has pursued studies and complete all the requirement for";
    // We create our bounding box for the title4 text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(60, 0, $font, $title4);
    // This is title4 cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) + 50;
    // Write title4
    imagettftext($image, 60, 0, $x, $y, $black, $font, $title4);

    $courseName = "Applied Program Management";
    // We create our bounding box for the courseName text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(80, 0, $font, $courseName);
    // This is courseName cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) + 200;
    // Write courseName
    imagettftext($image, 80, 0, $x, $y, $black, $font, $courseName);

    $issuedDate = date('F d, Y');
    $titleIssued = "Issued : $issuedDate";
    // We create our bounding box for the titleIssued text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(50, 0, $font, $titleIssued);
    // This is titleIssued cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2) - 1000;
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) + 900;
    // Write titleIssued
    imagettftext($image, 50, 0, $x, $y, $black, $font, $titleIssued);

    $expiredDate = date('F d, Y');
    $titleExpired = "Expires : $expiredDate";
    // We create our bounding box for the titleExpired text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(50, 0, $font, $titleExpired);
    // This is titleExpired cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2);
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) + 900;
    // Write titleExpired
    imagettftext($image, 50, 0, $x, $y, $black, $font, $titleExpired);

    $certificateId = "Certificate ID : ABC123456";
    // We create our bounding box for the certificateId text
    //imagettfbbox(float $size,float $angle,string $font_filename,string $string,array $options = []): array|false
    $bbox = imagettfbbox(50, 0, $font, $certificateId);
    // This is certificateId cordinates for X and Y
    $x = $bbox[0] + (imagesx($image) / 2) - ($bbox[4] / 2) + 1000;
    $y = $bbox[1] + (imagesy($image) / 2) - ($bbox[5] / 2) + 900;
    // Write certificateId
    imagettftext($image, 50, 0, $x, $y, $black, $font, $certificateId);
    
$time = time();
imagejpeg($image, "download-certificate/$time.jpg");
imagedestroy($image);

$pdf = new FPDF();
$pdf->AddPage('L', 'A5');
$pdf->Image("download-certificate/$time.jpg", 0, 0, 210, 148);
ob_end_clean();
$pdf->Output();