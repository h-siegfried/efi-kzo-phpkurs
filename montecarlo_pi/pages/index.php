<?php
ob_start();
require_once('../../Turtle_class/Turtle.php');
require_once('../../FirePHPCore/FirePHP.class.php');

// Ein Objekt der Klasse FirePHP erzeugen
$firephp = FirePHP::getInstance(true);

// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor(400, 400);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248,248,248);

// Mit der eben definierten Farbe das gesamte Bild auffüllen
imagefill($img, 0, 0, $hintergrund);

// Diesmal brauchen wir nicht die Turtle, sondern 
// die eingebauten Zeichenfunktionen von PHP.
// Wichtige Information:
// Der "Ursprung" eines Bildes, 
// also die Koordinate x=0; y=0,
// befindet sich in der linken oberen Ecke.

// Definieren Sie mit imagecolorallocate() eine Farbe fuer ein Rechteck,
// Weisen Sie diese einer Variable zu:



// Definieren Sie in gleicher Weise eine Farbe fuer einen Kreisbogen
// und weisen Sie sie einer Variable zu:



// Zeichnen Sie nun ein Rechteck, dessen linke obere Ecke
// die Koordinaten 0,0 hat und dessen rechte untere Ecke die 
// Koordinaten 200, 200. Verwenden Sie die vorher definierte Rechtecksfarbe.






// Zeichnen Sie einen Kreisbogen mit folgenden Merkmalen:
// Mittelpunkt: 0,0
// Breite und Hoehe des Durchmessers: 400 mal 400 Pixel
// Anfang beim Winkel 0, Ende beim Winkel 90 Grad
// Farbe: Die vorher definierte Bogenfarbe.






// Gehen Sie nun so vor:
// Definieren Sie je eine Variable fuer die Anzahl Punkte, die gezeichnet werden sollen,
// und fuer die Anzahl Punkte, die innerhalb des Kreises liegen.
// Die zweite initialisieren Sie natürlich mit 0.






// Erzeugen Sie in einer Schleife die Punkte.
// Die Funktion dafür: imagesetpixel() (auf php.net nachschlagen!)
// Sie sollen x- und y-Koordinaten zw. 0 und 200 haben.
//
// Wenn ein Punkt innerhalb des Bogens liegt, bekommt er die Bogenfarbe,
// wenn ausserhalb, die Rechteckfarbe.
//
// Wenn ein Punkt innerhalb des Bogens liegt, soll ferner
// die Variable, die die Punkte im Kreis zaehlt, um 1 hochgesetzt werden.






// Nun haben Sie die Anzahl aller Punkte und derjenigen, die im
// Kreisbogen liegen. Berechnen Sie daraus Pi
// Fuer die Berechnung koennen Sie die Wikipedia unter
// https://de.wikipedia.org/wiki/Monte-Carlo-Algorithmus
// nachschlagen.
// und weisen Sie das Resultat der Variable $ausgabe zu.
$ausgabe = "";



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
<title>Erste &Uuml;bung mit Objekten</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Erste &Uuml;bung mit Schleifen</h1>
<img src="../images/bild.png" />
<p>Quotient: <?php print($ausgabe);?></p>
</body>
</html>