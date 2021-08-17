<?php
if (empty($_GET) or empty($_GET['id'])) {
    print("<h3>Keine ID übergeben</h3>");
    exit(0);
}
/*
 * Weil wir gesagt haben, das Programm soll enden, wenn nichts übergeben worden ist,
 * (Anweisung exit(0) auf Zeile 4)
 * müssen wir den Rest nun nicht in einen else-Block packen.
 */

$detailSQL = "
    SELECT *
    FROM person
    WHERE person.p_ID = :p_ID";


// Die Variable $detailAngaben wird die Angaben über eine Person enthalten:
$detailAngaben = "";

try {
    $dbHandler = new PDO('mysql:host=localhost;dbname=uebungsdb;charset=utf8',
        'schuelerWeb','E2F0I1_k4zo');
    $stmt = $dbHandler->prepare($detailSQL);
    $stmt->bindParam('p_ID',$_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    $diesePerson = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $ex) {
    print("<h3>DB-Fehler:</h3><p>".$ex->getMessage()."</p>");
    exit(0);
}

/*
 * Das Array $diesePerson enthält nur 1 einziges Element, denn wir haben
 * in der DB-Abfrage ja nur nach einem einzigen Eintrag gesucht.
 * Dieses Element ist auch wieder ein Array mit den Zellen der gefundenen Tabellenzeile.
 * Wir können, weil wir wissen, dass $diesePerson nur 1 Element enthält, gleich auf
 * dieses erste und einzige Element zugreifen.
 */

foreach($diesePerson[0] as $schluessel => $wert) {
    $detailAngaben .= "<p>" . $schluessel . ": " . $wert . "</p>";
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf8">
    <title>Detail zu einer Person</title>
</head>

<body>

<h1>Details zu einer Person</h1>

<?php  print($detailAngaben);  ?>

</body>
</html>