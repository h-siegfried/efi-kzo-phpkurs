<?php
/*
 * Zuerst werden die eingegebenen Benutzerdaten übernommen.
 * Diesen Teil des Codes müssen Sie noch nicht verstehen
 *
 * Lesen Sie ab dem Kommentar auf Zeile 21 weiter!
 */
$vollerName = "";
$position = false;
if(empty($_POST['vollerName'])) {
    $vollerName = "(Keine Eingabe)";
} else {
    $vollerName = $_POST['vollerName'];
}


/*
 * Von hier an haben Sie
 * unter der Variable $vollerName
 * auf jeden Fall einen String zur Verfügung,
 * mit dem Sie arbeiten können.
 *
 * 1. Deklarieren Sie die Variable $start
 * 2. Weisen Sie ihr den Rückgabewert der Funktion stripos() zu.
 * 3. Deklarieren Sie die Variable $nachname.
 * 4. Extrahieren Sie aus dem String der Variable $vollerName
 *    mit der Funktion substr() den Nachnamen und
 * 5. Weisen Sie diesen der Variable $nachname zu.
 *
 * 6. Geben Sie im HTML-Body,
 *    im PHP-Codeblock ab Zeile 65
 *    den gefundenen Nachnamen aus!
 */


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>String-&Uuml;bungen</title>
    <link rel="stylesheet" href="../style/styles_string2.css"/>
</head>


<body>
<h1>&Uuml;bung: String extrahieren</h1>

<h2>Die Ausgabe Ihres PHP-Programms</h2>
<p>
    Der eingegebene Name war:
    <?php
    print($vollerName);
    ?>
</p>


<p>Im n&auml;chsten Absatz erscheint die Ausgabe meines PHP-Programms:<br/>
    Der Nachname.</p>

<p>
    <?php

    ?>
</p>


<!--
Auf den folgenden Zeilen finden Sie
den HTML-Code des Eingabeformulars.
Auch auf diesen kommen wir später im
Kurs zurück.
-->

<h2>Eingabeformular</h2>
<form action="#" method="post">
    <fieldset>
        <legend>Eingabe</legend>
        <p>
            <label for="vollerName">Gib hier den vollen Namen,
                bestehend aus Vor- und Nachname, ein.</label>
        </p>
        <p>
            <input type="text" name="vollerName" placeholder="Vorname Nachname">
        </p>
        <p>
            <input type="submit" value="Abschicken!">
        </p>
    </fieldset>
</form>

</body>

</html>