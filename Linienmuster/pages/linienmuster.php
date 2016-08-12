<?php
ob_start();
require_once('../../FirePHPCore/FirePHP.class.php');

// Ein Objekt der Klasse FirePHP erzeugen
$firephp = FirePHP::getInstance(true);

// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor(400, 400);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248,248,248);


// Mit der eben definierten Farbe das gesamte Bild auffüllen
// Sie können die Dokumentation der Funktion imagefill
// wie immer auf http://www.php.net/manual/de/function.imagefill.php
// nachsehen.

imagefill($img, 0, 0, $hintergrund);



// Diesmal brauchen wir nicht die Turtle, sondern
// die eingebauten Zeichenfunktionen von PHP.
// Wichtige Information:
// Der "Ursprung" eines Bildes,
// also die Koordinate x=0; y=0,
// befindet sich in der linken oberen Ecke.

// Ihre Aufgabe ist es, ein Bild zu erzeugen, das das dasselbe
// Muster wie das Bild vorbild.png zeigt. 
// Dieses "Vorbild" liegt im Ordner images.



// Definieren Sie zuerst eine Farbe fuer die Linien
// und weisen Sie sie einer Variable zu:


// Zeichnen Sie nun in einer oder mehreren Schleifen das Bild.
// Farbe: Die vorher definierte Linienfarbe.
// Speichern Sie zuerst den gewünschten Abstand zwischen den Linien in 
// einer Variable. Besonders schön ist es natürlich, wenn Sie eine 
// Beziehung zwischen dieser Variable und der Bildgrösse herstellen.



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
<title>Linienmuster</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Schleifen-Aufgabe Linienmuster</h1>
<img src="../images/bild.png" />
</body>
<<<<<<< HEAD
</html>
