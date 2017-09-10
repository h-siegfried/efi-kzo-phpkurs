<?php
ob_start();
require_once('../../Turtle_class/Turtle.php');


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


// Nun koennen Sie die Turtle eine Figur zeichnen lassen

// Setzen Sie die Strick-Dicke der Turtle auf mindestens 20 Pixel


// Programmieren Sie in mehreren Schleifen, dass die Turtle
// jeweils 1 bis 2 Pixel "geht" und danach die Farbe veraendert.
// Denken Sie daran, dass eine digitale Farbe immer durch drei Zahlen
// (Staerke des Rot-Kanals, des Gruen-Kanals und des Blau-Kanals)
// bestimmt ist.





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