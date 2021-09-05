<?php
/*
 * In diesem Programm ist Ihre Aufgabe,
 * ab Zeile 92
 * die Anweisungen zu lesen
 * und die Verarbeitung der abgeschickten Daten
 * zu programmieren.
 */


$feedback = "<p>Sie haben noch nichts geändert.</p>";


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
 * Diesmal «pflücken» wir eine zufällige Person aus der uebungsdb.
 * Die Daten dieser Person werden im HTML-Formular angezeigt.
 * Die Benutzerin kann sie ...
 * 1. ändern und auf den Button «aendern» klicken
 * 2. löschen und auf den Button «loeschen» klicken.
 */

// Das SQL-Statement zum Abfragen aller IDs der Tabelle `person`:
$p_ID_SQL = "
SELECT p_ID
FROM `person`
";

// Das Statement-Objekt erzeugen und die Abfrage ausführen:
try {
    $stmt = $db_handler->prepare($p_ID_SQL);
    $stmt->execute();

    $resultateArray = $stmt->fetchAll(PDO::FETCH_NUM);
    $stmt->closeCursor();

    // Nun ermitteln wir eine Zufallszahl zwischen 0
    // und der Anzahl Einträge MINUS EINS:
    $arrayZufallsIndex = mt_rand(0, count($resultateArray) - 1);
    // dann holen wir aus dem Array mit den p_ID das
    // Element mit dem zufällig ermitelten Index heraus:
    $zufallsID = $resultateArray[$arrayZufallsIndex][0];

    // Nun generieren wir ein neues SQL-Statement, um die Daten
    // der Person mit der Zufalls-p_ID aus der DB abzufragen.
    $personSQL = "
    SELECT * 
    FROM `person` 
    WHERE p_ID = $zufallsID";

    $stmt = $db_handler->prepare($personSQL);
    $stmt->execute();

    // Die fetch-Funktion müssen wir nur 1x aufrufen, da wir ja nur
    // nach 1 Eintrag in der Tabelle gesucht haben.
    // eine Schleife erübrigt sich also.
    $personenDatenArray = $stmt->fetch(PDO::FETCH_ASSOC);

    // Nun erzeugen wir hier bereits den HTML-String der Input-Felder
    // des Änderungsformulars.
    $inputfelder = "";
    foreach ($personenDatenArray as $aktuellesFeld => $aktuellerInhalt) {
        $inputfelder .= "<p>$aktuellesFeld:<br>
            <input type='text' name='$aktuellesFeld' value='$aktuellerInhalt'";
        if ($aktuellesFeld == "p_ID") {
            $inputfelder .= " readonly ";
        }
        $inputfelder .= "></p>";
    }
    $inputfelder .= "<p>
        <button name='task' value='edit'>Bearbeiten</button><br>
        <button name='task' value='delete'>Löschen</button>
    </p>";

} catch (PDOException $ex) {
    error_log($ex->getMessage());
    print("<h3>Fehler beim Abfragen der Anzahl Personen</h3>");
    print("<p>(Siehe php-error-log!)</p>");
    exit(0);
}

/*
 * Programmieren Sie dann folgendes:
 *
 * 1. Prüfen Sie, ob Daten abgesendet worden sind und
 *    ob der Änderungs-Button geklickt worden ist.
 * 2. Wenn ja, formulieren Sie das SQL-Statement mit Platzhaltern.
 * 3. Erzeugen Sie das PDO-Statement-Objekt.
 * 4. Binden Sie die nötigen Parameter an die Platzhalter
 * 5. Führen Sie die Änderung aus.
 * 6. Geben Sie eine Erfolgsmeldung zurück. (Variable $feedback)
 *
 * 7. Prüfen Sie, ob Daten abgesendet worden sind und
 *    ob der Lösch-Button geklickt worden ist.
 * 8. Verfahren Sie, falls ja, analog.
 */


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>DB-Einträge bearbeiten oder löschen</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<h1>Einen zufällig ausgewählten DB-Eintrag bearbeiten oder löschen</h1>

<h2>Ist schon etwas abgeschickt worden?</h2>
<?php
// Hier geben wir nur noch den Inhalt der Variable $resultate aus:
print($feedback);
?>


<h2>Das Formular zum Ändern oder Löschen</h2>

<form action="#" method="post">
    <fieldset>
        <legend>Die Daten der zufällig gewählten Person</legend>
        <?php
        print($inputfelder);
        ?>
    </fieldset>
</form>


</body>
</html>

