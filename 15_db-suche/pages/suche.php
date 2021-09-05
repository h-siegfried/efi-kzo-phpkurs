<?php
// Eine Variable deklarieren,
// die zur Ausgabe der Daten auf der Webseite dient
$resultate = "";

if (!empty($_POST['nachname'])) {
    // Schaedliche Zeichen aus dem Input-String filtern
    $nachname = filter_input(INPUT_POST, 'nachname', FILTER_SANITIZE_STRING);
    $nachname = $nachname . "%";

    try {
        // Ein PDO-Objekt erzeugen und der Variable $dbHandler zuweisen:
        $dbHandler = new PDO('mysql:host=localhost;dbname=uebungsdb;charset=utf8',
            'schuelerWeb',
            'E2F0I1_k4zo');
        // Dafuer sorgen, dass das PDO-Objekt "Exceptions wirft" (siehe Tutorial!)
        $dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print("<h3>Fehler bei der DB-Verbindung</h3>");
        print ("<p>" . $e->getMessage() . "</p>");
    }

    // Das SQL-Suchstatement formulieren und einer Variable zuweisen:
    $alleSchuelerSQL = "
			SELECT p_vorname, p_name, p_email
			FROM person
			WHERE person.p_name LIKE :name
			ORDER BY p_vorname ASC";

    try {
        // Ein PDO-Statement-Objekt erzeugen:
        $stmt = $dbHandler->prepare($alleSchuelerSQL);

        // Den Platzhalter im Statement mit Daten fuellen:
        $stmt->bindParam('name', $nachname, PDO::PARAM_STR);

        // Fuer jedes Attribut der gefundenen Datensaetze eine
        // Variable vorbereiten:
        $stmt->bindColumn('p_vorname', $vorname);
        $stmt->bindColumn('p_name', $name);
        $stmt->bindColumn('p_email', $email);

        // Das Statement ausfuehren lassen:
        $stmt->execute();

        // In einer Schleife Zeile fuer Zeile der Resultate-Tabelle
        // auslesen. Die Werte sind jetzt ueber die oben definierten Variablen
        // verfuegbar.
        while ($stmt->fetch()) {
            $resultate .= "<p> $vorname $name, $email</p>\n";
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
} else {
    $resultate = "<p>Noch keine Suche durchgef&uuml;hrt.</p>";
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
<h1>Sch&uuml;lerInnen des EF Informatik 14/15 suchen</h1>
<h2>Gefunden wurden: </h2>
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
            <input type="text" name="nachname"/>
        </p>

        <p>
            <label for="suchen">Suche starten? </label>
            <input type="submit" name="suchen" value="Los!"/>
        </p>
    </fieldset>
</form>
</body>
</html>
