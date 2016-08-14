<?php
ob_start();
require_once('../../Turtle_class/Turtle.php');

// Ein Objekt der Klasse FirePHP erzeugen


$imgWidth= 600;
$imgHeight = 600;
// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor($imgWidth, $imgHeight);
$firephp->log($img);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248,248,248);

// Mit der eben definierten Farbe das gesamte Bild auffüllen
imagefill($img, 0, 0, $hintergrund);

// Erzeugen Sie hier ein neues Objekt der Klasse Turtle
// und weisen Sie es einer Variable zu.
// Vergessen Sie nicht, die Methode penDown() aufzurufen,
// damit die Turtle nicht nur "geht", sondern auch
// sichtbare Spuren hinterlässt.

$zeichner = new Turtle($img,600,500);
$zeichner->penDown();

// wurde anzahlEcken, anzahlZeilen und seitenLaenge schon angegeben?
// Machen Sie die gesamte Programm-Ausfuehrung davon abhaengig.
// Informieren Sie sich auf http://php.net ueber die Function empty()
// und ihr Verhalten gegenueber ungesetzten Array-Elementen.

// Das Element 'abstand' von $_POST koennen Sie anders behandeln:
// Wenn es ein leerer String ist, wird es einfach als 0 interpretiert.
// Der Wert 0 wird von empty() ausgeschlossen, soll aber doch moeglich sein.

if(true) { // Sie muessen natuerlich "true" durch Ihre Bedingung ersetzen ;-)
	
	// Weisen Sie zuerst die Elementen von $_POST Variablen zu, die 
	// leichter zu schreiben sind ;-)
	
	// Lassen Sie die Turtle zu einem bestimmten Anfangspunkt springen.
	// Zum Anordnen der Vielecke in einem Dreieck brauchen Sie 
	// zwei Schleifen, die ineinander geschachtelt sind:
	// eine Schleife, die die Zeilen erzeugt und fuer jede Zeile
	// eine Schleife, die die einzelnen Vielecke erzeugt.
	// Alle benoetigten Groessen erhalten Sie aus dem Array $_POST
	// (bzw. aus den Variablen, die Sie oben deklariert haben).
	
	
	
}




// Hierher koennen Sie Ihre Funktion vieleck kopieren, die Sie schon programmiert
// haben.




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
<title>Dreiecksfigur aus Vielecken</title>
<link rel="stylesheet" href="../stylesheets/styles_schleife1.css" />
</head>
<body>
	<h1>Ein Dreieck aus vielen Viel-ecken</h1>
	<form action="" method="post">
		<p>
			<label for="anzahlEcken">Anzahl Ecken: </label> <input type="text"
				name="anzahlEcken" />
		</p>
		<p>
			<label for="anzahlZeilen">Anzahl Zeilen: </label> <input
				type="text" name="anzahlZeilen" />
		</p>
		
		<p>
			<label for="seitenLaenge">Seitenl&auml;nge: </label> <input
				type="number" name="seitenLaenge" />
		</p>
		<p>
			<label for="abstand">Abstand </label> <input
				type="number" name="abstand" />
		</p>
		<p>
			<label for="zeichnen">Figur zeichnen!</label> <input type="submit"
				name="zeichnen" />
		</p>
	</form>
	<img src="../images/bild.png" />
</body>
</html>
