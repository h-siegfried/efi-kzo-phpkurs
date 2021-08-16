<?php

// Wir werden im Arbeitsspeicher des Servers
// ein Bild erzeugen,
// dieses dann als .png-Datei abspeichern
// und es schliesslich auf der Webseite verlinken,
// sodass es im Browser dargestellt wird.


// Zuerst definieren wir Breite und Hoehe des Bildes
// und speichern diese Angaben in Variablen
$breite = 400;
$hoehe  = 400;


// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor($breite, $hoehe);

// Für den Hintergrund eine Farbe in der Farbpalette des Bildes definieren
// Die erste Zahl gibt an, wie stark der Rot-Kanal leuchtet,
// die zweite, wie stark der Grün- und die dritte, wie stark der Blau-Kanal.
// Der erzielte Wert ist ein sehr helles Grau.
$hintergrund = imagecolorallocate($img, 248,248,248);


// Mit der eben definierten Farbe das gesamte Bild auffüllen
// Sie können die Dokumentation der Funktion imagefill
// wie immer auf http://www.php.net/manual/de/function.imagefill.php
// nachsehen.
imagefill($img, 0, 0, $hintergrund);

// Eine Farbe fuer die Linie definieren:
// Wir <<öffnen>> nur den Rot-Kanal, also wird die Farbe
// ein relativ helles Rot sein.
$linienfarbe = imagecolorallocate($img, 192, 0, 0);


// Zeichnen Sie nun mit der Funktion imageline()
// ein Bild, das aussieht wie das Bild in der Datei
// vor-bild.png.
// Sie finden die Dokumentation der Funktion auf
// https://secure.php.net/manual/de/function.imageline.php
// Als Farb-Parameter koennen Sie der Funktion imageline() die oben
// in Zeile 35 definierte Linienfarbe uebergeben.







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
<title>Aufgabe Linienmuster</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Linien zeichnen</h1>
<img src="../images/bild.png" />
</body>
</html>
