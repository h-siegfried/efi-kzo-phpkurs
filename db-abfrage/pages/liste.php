<?php

// Einen Abfrage-String einer Variable zuweisen
$personenListeSQL = "
SELECT person.p_ID, person.p_vorname, person.p_name
FROM person, person_besucht_kurs
WHERE person.p_ID = person_besucht_kurs.person_p_ID
AND person_besucht_kurs.kurs_kurs_ID = 1 
ORDER BY p_vorname ASC";


/*
 * Ein neues DB-Handler-Objekt erzeugen (aus der Klasse PDO)
 */
try {
    $dbHandler = new PDO('mysql:host=localhost;dbname=uebungsdb;charset=utf8',
        'schuelerWeb','E2F0I1_k4zo');
    $stmt = $dbHandler->prepare($personenListeSQL);
    $stmt->execute();
    $personenArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $ex) {
    /*
     * Falls es mit der DB-Verbindung nicht geklappt hat, sollte die Variable
     * $personenArray trotzdem existieren, aber einfach als erstes Element einen Hinweis enthalten,
     * Dass keine Daten vorhanden sind.
     */
    $personenArray = array();
    $personenArray[0] = "Db-Verbindung hat nicht funktioniert, deshalb gibt es hier keine Daten.";
    print("<h3>DB-Fehler:</h3><p>".$ex->getMessage()."</p>");
}



// Jetzt speichern wir die Daten, die wir gefunden haben, als Zeilen einer HTML-Tabelle in einer Variable:
$tabellenZeilen = "";

foreach($personenArray as $aktuelleZeile) {
    /*
     * Wenn die DB-Abfrage geklappt hat, dann ist jedes Element des Array $personenArray
     * selbst auch wieder ein Array.
     * Die Elemente dieses "inneren" Arrays sind dann die drei gefundenen Tabellen-Zellen.
     *
     * Wenn die Abfrage nicht geklappt hat, dann hat das Array $personenArray
     * nur 1 einziges Element, und dieses ist selbst schlicht ein String, kein Array.
     *
     * Wir können also zuerst prüfen, ob das aktuelle Element von $personenArray selbst ein Array ist.
     * Wenn ja, speichern wir die Inhalte in unserer Tabellen-Variable als Tabellen-Zellen,
     * wenn nein, erzeugen wir nur eine einzige Tabellen-Zelle mit dem Text, den wir (oben im catch-Block) als
     * Wert von $personenArray[0] definiert hatten.
     */
    if(is_array($aktuelleZeile)) {
        $tabellenZeilen .= "<tr>\n";
        $tabellenZeilen .= "<td><a href='details.php?id=" . $aktuelleZeile['p_ID'] . "'>" . $aktuelleZeile['p_vorname'] . "</a></td>";
        $tabellenZeilen .= "<td>" . $aktuelleZeile['p_name'] . "</td>";
        $tabellenZeilen.= "</tr>\n";
    } else {
        $tabellenZeilen .= "<tr><td>$aktuelleZeile</td></tr>";
    }
}

// Ab jetzt ist die Hautpsache HTML, PHP brauchen wir nur noch, um die Daten des Arrays auszugeben.
?>

<!DOCTYPE HTML>
<html lang="de">
<head>
    <meta charset="utf8">
    <title>Demo für Sarah, Hurija und Jane</title>
</head>

<body>
<h3>Die Schüler*innen des EF Informatik 2019 / 20</h3>

<table>
<?php  print($tabellenZeilen); ?>
</table>
</body>

</html>
