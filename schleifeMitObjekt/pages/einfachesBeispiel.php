<?php
require_once('../../Turtle_class/Turtle.php');


// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor(400, 400);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248,248,248);

// Mit der eben definierten Farbe das gesamte Bild auffüllen
imagefill($img, 0, 0, $hintergrund);

// Erzeugen Sie hier ein neues Objekt der Klasse Turtle
// und weisen Sie es einer Variable zu.
// Vergessen Sie nicht, die Methode penDown() aufzurufen,
// damit die Turtle nicht nur "geht", sondern auch 
// sichtbare Spuren hinterlässt.


$zeichnerin = new Turtle($img);
$zeichnerin->penDown();




// Nun können Sie die Turtle eine Figur zeichnen lassen

$zeichnerin->forward(100);
$zeichnerin->turn(120);
$zeichnerin->setPenColor(200, 0, 0);
$zeichnerin->forward(100);
$zeichnerin->turn(120);
$zeichnerin->setPenColor(0, 0, 200);
$zeichnerin->forward(100);


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
<title>Erste &Uuml;bung mit einem Turtle-Objekt</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Erste &Uuml;bung mit der Turtle</h1>
<img src="../images/bild.png" />
</body>
</html>