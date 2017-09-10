<?php
$antwort = "";
$min = 1;
$max = 16;
$meineZahl;


// Pruefen Sie hier, ob dies der erste Seitenaufruf ist,
// oder ob der Benutzer ein neues Spiel beginnen moechte.
// Ein Tipp: Im HTML-Formular unten gibt es einen entsprechenden Button.

// Wenn dies der Fall ist, muessen wir eine neue Zufallszahl erzeugen!
// Programmieren Sie das und weisen Sie die Zufallszahl der Variable
// $meineZahl zu.
// Minimum und Maximum für die Zufallszahl sind bereits
// den Variablen $min und $max zugewisen.

// "SONST":
// Ein Spiel ist am Laufen -- also muessen wir die Geheimzahl reaktivieren!
// Die Geheimzahl wird dem Server bei jedem Rateversuch
// Automatisch mitgeteilt, und zwar über die
// Variable $_POST['geheimzahl'] .
// Das geht so: $meineZahl = $_POST['geheimzahl'];





// Pruefen Sie in der Folge, ob der Benutzer ueberhaupt schon
// einen Rateversuch eingegeben und abgeschickt hat.


// Wenn ja: Uebernehmen Sie den Rateversuch der Benutzerin
// in die Variable $versuch:


// Programmieren Sie hier die Fallunterscheidung:
// Der Antwortversuch steht unter der Variable $versuch
// zur Verfuegung.
// Weisen Sie der Variable $antwort_teil2 den passenden
// String zu, je nachdem, ob die Antwort zu hoch,
// zu niedrig oder genau richtig war!


// Ende des Falles, dass ein Rateversuch abgeschickt worden ist.
// SONST...
// Fahren Sie mit else weiter: Programmieren Sie hier die Reaktion darauf
// dass die Benutzerin noch keinen Rateversuch abgeschickt hat.
// Weisen Sie der Variable $antwort einen entsprechenden String zu.




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Zahlenratespiel</title>
    <link rel="stylesheet" href="../stylesheets/style_zahlenraten.css"/>
</head>

<body>

<h1>Ein Zahlenratespiel</h1>

<div id="feedback">
    <h2>Die Antwort</h2>
    <p>
        Ihr Rateversuch liegt
        <?php
        // Programmieren Sie hier mit der Funktion print(),
        // dass die Antwort ausgegeben wird.
        // Die beiden Strings der Variablen
        // $antwort_teil1 und $antwort_teil2
        // sollen aneinandergehaengt werden.


        ?>
    </p>
</div>

<div id="formular">
    <h2>Raten Sie, welche Zahl ich mir ausgedacht habe!</h2>
    <p>
        Sie liegt zwischen
        <?php print($min); ?>
            und
        <?php print($max); ?>.
    </p>
    <form action="#" method="post">
        <p>
            Ihr Rateversuch:
            <input type="number" name="rateversuch"/>
            <input
                type="hidden" name="geheimzahl" value="<?php print($meineZahl); ?>"/>

        </p>
        <p>
            Pr&uuml;fen? <input type="submit" value="Pr&uuml;fen!"/>

        </p>
    </form>
    <form action="#" method="post">
        <p>
            Neue Spiel beginnen? <input type="submit" name="neuesSpiel" value="Ja, neues Spiel!"/>
        </p>

    </form>

</div>

</body>

</html>
