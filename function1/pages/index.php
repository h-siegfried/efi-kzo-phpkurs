<?php
ob_start();
require_once('../classes/Turtle.php');
require_once('../../FirePHPCore/FirePHP.class.php');

/*
 * Eine neue Funktion definieren:
 * Ihr Name soll "vieleck" lauten,
 * sie soll 2 Parameter verlangen: 
 * 1. eine Variable, die auf ein Turtle-Objekt verweist,
 * 2. die Anzahl Ecken des zu zeichnenden Vielecks;
 * sie soll nichts zurueckgeben.
 */







// Ein Objekt der Klasse FirePHP erzeugen
$firephp = FirePHP::getInstance(true);

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



// Nun können Sie die Funktion vieleck() aufrufen.




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