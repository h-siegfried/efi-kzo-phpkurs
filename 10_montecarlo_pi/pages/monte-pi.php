<?php

// Variblen fuer Breite und Hoehe des Bildes ($seitenlaengeBild)
// und der Figur ($radius) deklarieren:
$seitenlaengeBild = 402;
$radius = 400;
// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor($seitenlaengeBild, $seitenlaengeBild);

// Eine Farbe fuer den Hintergrund definieren
$hintergrund = imagecolorallocate($img, 248,248,248);

// Danach eine Farbe für das Rechteck und den Kreissektor
$rechteckfarbe = imagecolorallocate($img, 0, 204, 64);
$kreisfarbe = imagecolorallocate($img, 204, 0, 0);

// Mit der eben definierten Hintergrundfarbe das gesamte Bild auffüllen
imagefill($img, 0, 0, $hintergrund);

// Auch in diesem Projekt benutzen wir
// die eingebauten Zeichenfunktionen von PHP.
// Wichtige Information:
// Der "Ursprung" eines Bildes, 
// also die Koordinate x=0; y=0,
// befindet sich in der linken oberen Ecke.





// Zeichnen Sie nun ein Rechteck, dessen linke obere Ecke
// die Koordinaten 0,0 hat und dessen rechte untere Ecke die 
// Koordinaten 200, 200. Verwenden Sie die vorher definierte Rechtecksfarbe.
// Wie das geht: Suchen Sie auf http://php.net
// die Dokumentation der Funktion imagerectangle






// Zeichnen Sie einen Kreisbogen mit folgenden Merkmalen:
// Mittelpunkt: 0,0
// Breite und Hoehe des Durchmessers: 400 mal 400 Pixel
// Anfang beim Winkel 0, Ende beim Winkel 90 Grad
// Farbe: Die vorher definierte Bogenfarbe.
// Diese Zeichnungsfunktion heisst imagearc();
// auch sie ist auf http://php.net dokumentiert.






// Gehen Sie nun so vor:
// Definieren Sie je eine Variable fuer die Anzahl Punkte, die gezeichnet werden sollen,
// und fuer die Anzahl Punkte, die innerhalb des Kreises liegen.
// Die zweite initialisieren Sie natürlich mit 0.






// Erzeugen Sie in einer Schleife die Punkte.
// Die Funktion dafür: imagesetpixel() (auf php.net nachschlagen!)
// Sie sollen zufällig gesetzte x- und y-Koordinaten zw. 0 und 200 haben.
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
<title>Pi nach dem Montecarlo-Algorithmus</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
<h1>Schleifen-Aufgabe: Pi nach dem Montecarlo-Algorithmus berechnen</h1>
<img src="../images/bild.png" />
<p>Quotient: <?php print($ausgabe);?></p>
</body>
</html>