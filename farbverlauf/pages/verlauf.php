<?php
ob_start();
require_once('../../Turtle_class/Turtle.php');
require_once('../../FirePHPCore/FirePHP.class.php');

// Ein Objekt der Klasse FirePHP erzeugen
$firephp = FirePHP::getInstance(true);
$firephp->setEnabled(true);

// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor(960, 400);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248,248,248);

// Mit der eben definierten Farbe das gesamte Bild auffuellen
imagefill($img, 0, 0, $hintergrund);

// Erzeugen Sie hier ein neues Objekt der Klasse Turtle
// und weisen Sie es einer Variable zu.
// Vergessen Sie nicht, die Methode penDown() aufzurufen,
// damit die Turtle nicht nur "geht", sondern auch 
// sichtbare Spuren hinterlaesst.
$zeichner = new Turtle($img, 960, 400, $firephp);

// Nun koennen Sie die Turtle eine Figur zeichnen lassen

// Setzen Sie die Strick-Dicke der Turtle auf mindestens 20 Pixel
$zeichner->setPenWidth(40);
$zeichner->jumpTo(0, 200);
$zeichner->penDown();

// Programmieren Sie in mehreren Schleifen, dass die Turtle
// jeweils 1 bis 2 Pixel "geht" und danach die Farbe veraendert.
// Denken Sie daran, dass eine digitale Farbe immer durch drei Zahlen
// (Staerke des Rot-Kanals, des Gruen-Kanals und des Blau-Kanals)
// bestimmt ist.
$rot = 255;
$gruen = 0;
$blau = 0;
while($gruen < 253) {
    $zeichner->setPenColor($rot, $gruen, $blau);
    $gruen += 2;
    $zeichner->forward(1);
}
$firephp->log("\$gruen: " . $gruen);
$firephp->log($zeichner->getPenRed());
$firephp->log($zeichner->getPenGreen());
$firephp->log($zeichner->getPenBlue());
// $firephp->log($zeichner);
while($rot > 1) {
    $zeichner->setPenColor($rot, $gruen, $blau);
    $rot -= 2;
    $zeichner->forward(1);
}
$firephp->log($zeichner->getPenRed());
$firephp->log($zeichner->getPenGreen());
$firephp->log($zeichner->getPenBlue());

while($blau < 253) {
    $zeichner->setPenColor($rot, $gruen, $blau);
    
    $zeichner->forward(1);
    $blau += 2;
}

while($gruen > 1) {
    $zeichner->setPenColor($rot, $gruen, $blau);
    $zeichner->forward(1);
    $gruen -= 2;
}

while($rot < 253) {
    $zeichner->setPenColor($rot, $gruen, $blau);
    $zeichner->forward(1);
    $rot += 2;
}

while ($blau > 1) {
    $zeichner->setPenColor($rot, $gruen, $blau);
    $zeichner->forward(1);
    $blau -= 2;
}



// Schliesslich schreiben wir das fertige Bild
// aus dem Arbeitsspeicher auf die Festplatte.
// Von dort wird es danach im HTML-Code eingebunden.
// Sie sehen im Body den <img>-Tag, der dazu dient.
imagepng($img, "../images/bild.png");

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Farbverlauf</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Ein sch&ouml;ner Farbverlauf</h1>
<img src="../images/bild.png" />
</body>
</html>