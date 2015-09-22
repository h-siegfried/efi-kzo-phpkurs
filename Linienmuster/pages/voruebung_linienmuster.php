<?php

ob_start();
require_once('../../FirePHPCore/FirePHP.class.php');

// Ein Objekt der Klasse FirePHP erzeugen
$firephp = FirePHP::getInstance(true);

// Breite und Hoehe des Bildes definieren 
// und in Variablen speichern
$breite = 400;
$hoehe  = 400;


// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor(400, 400);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248,248,248);



// Mit der eben definierten Farbe das gesamte Bild auffüllen
// Sie können die Dokumentation der Funktion imagefill
// wie immer auf http://www.php.net/manual/de/function.imagefill.php
// nachsehen.
imagefill($img, 0, 0, $hintergrund);


// Eine Farbe fuer die Linie definieren
$linienfarbe = imagecolorallocate($img, 192, 0, 0);

// Diesmal brauchen wir nicht die Turtle, sondern
// die eingebauten Zeichenfunktionen von PHP.
// Wichtige Information:
// Der "Ursprung" eines Bildes,
// also die Koordinate x=0; y=0,
// befindet sich in der linken oberen Ecke.

// Ziehen Sie nun eine Linie von der linken oberen zur
// rechten unteren Ecke des Bildes.
// Dazu werden Sie die Funktion imageline() benoetigen.
// Sie finden deren Dokumentation auf
// https://secure.php.net/manual/de/function.imageline.php
// Als Farb-Parameter koennen Sie der Funktion imageline() die oben
// in Zeile 16 definierte Linienfarbe uebergeben.

imageline($img, 0, 0, $breite, $hoehe, $linienfarbe);





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
</body>
</html>

