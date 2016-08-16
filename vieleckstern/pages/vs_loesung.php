<?php
ob_start();
require_once('../../Turtle_class/Turtle.php');

// Im Arbeitsspeicher des Servers ein Bild erzeugen:
$img = imagecreatetruecolor(400, 400);

// Eine Farbe in der Farbpalette des Bildes definieren
$hintergrund = imagecolorallocate($img, 248, 248, 248);

// Mit der eben definierten Farbe das gesamte Bild auffüllen
imagefill($img, 0, 0, $hintergrund);

// Programmieren Sie auch hier Ihre Funktion
// vieleck().
// (Das heisst: Kopieren Sie sie aus der entsprechenden Aufgabe...)
function vieleck(Turtle $turtle, int $anzEcken, int $sLaenge)
{
    $turtle->penDown();
    for($i = 0; $i < $sLaenge; $i++) {
        $turtle->forward($sLaenge);
        $turtle->turn(360 / $anzEcken);
    }
}


// Erzeugen Sie hier ein neues Objekt der Klasse Turtle
// und weisen Sie es einer Variable zu.
// Vergessen Sie nicht, die Methode penDown() aufzurufen,
// damit die Turtle nicht nur "geht", sondern auch
// sichtbare Spuren hinterlässt.
$hans = new Turtle($img);
$hans->penDown();


// wurde anzahlEcken, anzahlVielecke und seitenLaenge schon angegeben?
// Machen Sie die gesamte Programm-Ausfuehrung davon abhaengig.
// Informieren Sie sich auf http://php.net ueber die Function empty()
// und ihr Verhalten gegenueber ungesetzten Array-Elementen.
if (!empty($_POST['anzahlEcken'])
    && !empty($_POST['anzahlVielecke'])
    && !empty($_POST['seitenLaenge'])
) {
    for($i = 0; $i < $_POST['anzahlVielecke']; $i++) {
        vieleck($hans,$_POST['anzahlEcken'], $_POST['seitenLaenge']);
        $hans->turn(360 / $_POST['anzahlVielecke']);
    }
}


// Nun können Sie die Turtle den Vieleck-Stern zeichnen lassen
// Sie brauchen dafuer natuerlich eine Schleife
// und Ihre Funktion vieleck().


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
    <title>Stern aus Vielecken</title>
    <link rel="stylesheet" href="../stylesheets/styles_schleife1.css"/>
</head>
<body>
<h1>Ein Stern aus vielen Viel-ecken</h1>
<form action="" method="post">
    <p>
        <label for="anzahlEcken">Anzahl Ecken: </label> <input type="text"
                                                               name="anzahlEcken"/>
    </p>
    <p>
        <label for="anzahlVielecke">Anzahl Vielecke: </label> <input
            type="text" name="anzahlVielecke"/>
    </p>
    <p>
        <label for="seitenLaenge">Seitenl&auml;nge: </label> <input
            type="number" name="seitenLaenge"/>
    </p>
    <p>
        <label for="zeichnen">Figur zeichnen!</label> <input type="submit"
                                                             name="zeichnen"/>
    </p>
</form>
<img src="../images/bild.png"/>
</body>
</html>
