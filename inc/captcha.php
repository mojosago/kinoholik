<?php
  $image = @imagecreatetruecolor(120, 40) or die("Cannot Initialize new GD image stream");
  // Background
  $background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
  imagefill($image, 0, 0, $background);
  $linecolor = imagecolorallocate($image, 0xF5, 0xF7, 0xFA);
  $textcolor = imagecolorallocate($image, 0x00, 0x00, 0x00);
  $pixel_color = imagecolorallocate($image, 0xDD, 0xDD, 0xDD); 
  // draw random lines on canvas
 
  for($i=0; $i < 6; $i++) {
    imagesetthickness($image, rand(1,3));
    imageline($image, 0, rand(0,30), 120, rand(0,30), $linecolor);
  }
  for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
   }
  session_start();
  // add random digits to canvas
  $digit = '';
  for($x = 15; $x <= 100; $x += 20) {
    $digit .= ($num = rand(0, 9));
    imagechar($image, rand(3, 5), $x, rand(2, 14), $num, $textcolor);
  }
  // record digits in session variable
  $_SESSION['digit'] = $digit;
  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);
?>