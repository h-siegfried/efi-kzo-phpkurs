<?php
// Eine Variable deklarieren,
// die zur Ausgabe der Daten auf der Webseite dient
$resultate = "";
if ( empty($_POST) ) {
    $resultate = "<h3>Sie haben noch keine Suchanfrage abgeschickt.</h3>";
    $resultate .= "<p>Füllen Sie die Suchfelder aus und klicken Sie auf «Los!»!</p>";
} else {
    // Die Eingaben der Benutzerin in Variablen übernehmen




    // Den Anfang des SQL-Suchstatements formulieren und einer Variable zuweisen:
    $sucheSuS_SQL = "
			SELECT p_vorname, p_name, p_email
			FROM person
			WHERE rolle_rol_ID = 1";


    try {
        // Ein PDO-Objekt erzeugen und der Variable $dbHandler zuweisen:
        $dbHandler = new PDO('mysql:host=localhost;dbname=uebungsdb;charset=utf8',
            'schuelerWeb',
            'E2F0I2_k2zo');
        // Dafuer sorgen, dass das PDO-Objekt "Exceptions wirft" (siehe Tutorial!)
        $dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print("<h3>Fehler bei der DB-Verbindung</h3>");
        print ("<p>" . $e->getMessage() . "</p>");
    }


    try {
        // Ein PDO-Statement-Objekt erzeugen:
        $stmt = $dbHandler->prepare($sucheSuS_SQL);

        // Die Platzhalter im Statement mit Daten fuellen:




        // Fuer jedes Attribut der gefundenen Datensaetze eine
        // Variable vorbereiten:
        $stmt->bindColumn('p_vorname', $vornameResultat);
        $stmt->bindColumn('p_name', $nameResultat);
        $stmt->bindColumn('p_email', $emailResultat);

        // Das Statement ausfuehren lassen:
        $stmt->execute();

        // Die Überschrift in der Variable $resultate speichern:
        $resultate = "<h2>Gefunden wurden: </h2>";

        // In einer Schleife Zeile fuer Zeile der Resultate-Tabelle
        // auslesen. Die Werte sind jetzt ueber die oben definierten Variablen
        // verfuegbar.
        while ($stmt->fetch()) {
            $resultate .= "<p> $vornameResultat $nameResultat, $emailResultat</p>\n";
        }

        // Die DB-Verbindung wieder freigeben
        $stmt->closeCursor();
    } catch (PDOException $e) {
        $resultate .= ("<h3>Fehler bei der DB-Verbindung!</h3>\n");
        $resultate .= ("<p>Fehlermeldung des DB-Servers:</p>\n");
        $resultate .= ("<p>" . $e->getMessage() . "</p>\n");
        $resultate .= ("<h4>Stack-Trace</h4>\n");
        $resultate .= ($e->getTraceAsString());
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sch&uuml;lerInnen suchen</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<h1>Sch&uuml;lerInnen des EF Informatik 21/22 suchen</h1>

<?php
// Hier geben wir nur noch den Inhalt der Variable $resultate aus:
print($resultate);
?>
<h2>Sch&uuml;lerInnen suchen</h2>
<form action="#" id="suche" method="POST">
    <fieldset>
        <legend>Sch&uuml;lerIn suchen</legend>
        <p>
            <label for="nachname">Nachname: </label>
            <input type="text" name="nachname">
        </p>

        <p>
            <label for="vorname">Vorname: </label>
            <input type="text" name="vorname">
        </p>

        <p>
            <label for="suchen">Suche starten? </label>
            <input type="submit" name="suchen" value="Los!">
        </p>
    </fieldset>
</form>
</body>
</html>
