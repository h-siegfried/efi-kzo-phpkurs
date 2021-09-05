<?php
$feedback = "Sie haben noch keine Daten gesendet.";

// Das db_handler-Objekt erzeugen (ist bereits erledigt)
try {
    $db_handler = new PDO('mysql:host=localhost;dbname=uebungsdb;charset=utf8',
        'schuelerWeb', 'E2F0I1_k4zo');
} catch (PDOException $ex) {
    error_log($ex->getMessage());
    print("<h3>Fehler bei der DB-Verbindung!</h3>");
    print("<p>(Siehe php-error-log!)</p>");
    exit(0);
}

/*
 * Kontrollieren Sie hier, ob schon Formulardaten gesendet worden sind.
 *
 * Wenn ja, kontrollieren Sie, ob alle Felder ausgefüllt worden sind.
 *
 * Wenn ja:
 * 0. Die DB-Verbindung mit dem PDO-Objekt ist bereits aufgebaut
 *    und über die Variable $db_handler zugänglich.
 * 1. Formulieren Sie ein SQL-Statement mit Platzhaltern.
 * 2. Erzeugen Sie mit Ihrem SQL-Statement ein PDO-Statement-Objekt.
 * 3. «Binden» Sie mit bind_param die gesendeten Daten
 *    an die Platzhalter des Statements
 * 4. Führen Sie das Statement aus.
 * 5. Kontrollieren Sie, ob MySQL dem neuen Datensatz
 *    eine neue ID zugeteilt hat. Das ist das Zeichen dafür,
 *    dass die Insert-Operation erfolgreich war.
 * 6. Weisen Sie der Variable $feedback einen Erfolgs-String zu.
 */


?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Personen eintragen</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<h1>Neue Personen in die Tabelle `person` eintragen</h1>

<h2>Die Rückmeldung, ob der Eintrag funktioniert hat</h2>

<?php
// Hier geben wir nur noch den Inhalt der Variable $feedback aus:
print($feedback);
?>
<h2>Das Formular zum Eintragen</h2>

<!--
Bauen Sie hier das Formular, in das wir eine neue Person eintragen können.
-->

</body>
</html>

