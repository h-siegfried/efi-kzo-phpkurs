<?php
ob_start();
require_once('../classes/Turtle.php');
require_once('../../FirePHPCore/FirePHP.class.php');
$firephp = FirePHP::getInstance(true);


$img = imagecreatetruecolor(400, 400);
$hintergrund = imagecolorallocate($img, 248,248,248);
imagefill($img, 0, 0, $hintergrund);
// imagesetthickness($img, 10);


$edi = new Turtle($img, 400, 400, $firephp);
$edi->penDown();
$edi->setPenWidth(10);
$edi->setPenColor(255, 0, 60);

/*
$edi->forward(100);
$edi->turn(-90);
$edi->forward(100);
$edi->turn(-90);
$edi->forward(100);
$edi->turn(-90);
$edi->forward(100);

$edi->jumpTo(300, 0);

*/


for($i = 0; $i < 6; $i++) {
	$edi->forward(100);
	$edi->turn(360 / 6);
	$edi->setPenColor($edi->getPenColor() + 40, 0, 0);
}


imagepng($img, "../images/bild.png");

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Erste &Uuml;bung mit Objekten</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Erste &Uuml;bung mit Schleifen</h1>
<img src="../images/bild.png" />
</body>
</html>