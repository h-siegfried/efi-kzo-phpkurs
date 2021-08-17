<?php
// Verbindung zur DB ist jetzt in jedem Fall noetig
try{
	// Ein PDO-Objekt erzeugen und der Variable $dbHandler zuweisen:
	$dbHandler = new PDO('mysql:host=localhost;dbname=uebungsdb;charset=utf8',
			'schuelerWeb',
			'E2F0I1_k4zo');
	// Dafuer sorgen, dass das PDO-Objekt "Exceptions wirft" (siehe Tutorial!)
	$dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	print("<h3>Fehler bei der DB-Verbindung</h3>");
	print ("<p>" . $e->getMessage() . "</p>");
	exit();
}

/**
 * Eine Funktion zur Bereitstellung eines
 * Dropdown-Menus fuer die Klassenauswahl
 * @param PDO $dbh
 * @return string HTML-Strint mit <option>-Tags fuer Dropdown
 */
function makeDropDownOptions($dbh)
{
	// Eine Variable deklarieren, die den HTML-Code
	// fuer das Aufklappmenu aufnimmt:
	$optionString = "
			<option value=\"\">
			Bitte ggf. Klasse ausw&auml;hlen!
			</option>";
	// DB-Abfrage fuer das Dropdown-Menu
	$kursSuchSQL = "
			SELECT kurs_ID, kurs_name
			FROM kurs";

	try{
		$stmt = $dbh->prepare($kursSuchSQL);
		$stmt->bindColumn('kurs_ID', $kursID);
		$stmt->bindColumn('kurs_name', $kursName);
		$stmt->execute();
		while($stmt->fetch()) {
			$optionString .= "<option value = $kursID>$kursName</option>\n";
		}
		$stmt->closeCursor();
	}
	catch(PDOException $e) {
		print("<h3>Fehler bei der DB-Abfrage nach Kursen:</h3>");
		print("<p>" . $e->getMessage() . "</p>");
	}
	return $optionString;
} // Ende der Funktion makeDropdownString


/**
 * Eine Funktion zum Suchen der Personendaten in der DB
 * @param PDO $dbh
 * @param String $kursID
 * @param String $nachname
 */
function lookForPersons($dbh, $kursID, $nachname) {
	// Variable fuer Rueckgabe der Methode vorbereiten:
	$return = "";
	
	// Trunkierungszeihen an den Nachnamen anhaengen:
	$nachname = $nachname . "%";
	
	// SQL-Statement vorbereiten
	$personenSuchSQL = "
			SELECT person.p_vorname, person.p_name, person.p_email, 
				kurs.kurs_name 
			FROM person, person_besucht_kurs, kurs
			WHERE person.p_ID = person_besucht_kurs.person_p_ID 
			AND person_besucht_kurs.kurs_kurs_ID = kurs.kurs_ID ";
	// Wurde ein Kurs ausgewaehlt?
	if($kursID != "") {
		$personenSuchSQL .= " AND kurs.kurs_ID = :kursID ";
	}
	else {
		// ein leerer String entspricht der Zahl 0!
		$personenSuchSQL .= "
				AND kurs.kurs_ID > :kursID
				AND person_besucht_kurs.istStammklasse = 1";
	}
	$personenSuchSQL .= " AND person.p_name LIKE :nachname";
	$personenSuchSQL .= " ORDER BY kurs.kurs_name DESC, person.p_name ASC";

	try{
		// PDO-Statement-Objekt instanziieren
		$stmt = $dbh->prepare($personenSuchSQL);
		$stmt->bindParam(':kursID', $kursID, PDO::PARAM_INT);
		$stmt->bindParam(':nachname', $nachname, PDO::PARAM_STR);

		$stmt->bindColumn('p_vorname', $vorname);
		$stmt->bindColumn('p_name', $name);
		$stmt->bindColumn('p_email', $email);
		$stmt->bindColumn('kurs_name', $kursname);
		$stmt->execute();
		// echo $stmt->debugDumpParams();

		while($stmt->fetch()) {
			$return .= "<p>$vorname $name, $email, $kursname</p>";
		}
		$stmt->closeCursor();
		return $return;
	}
	catch(PDOException $e) {
		$return = ("<h3>Fehler bei der DB-Verbindung!</h3>\n");
		$return .= ("<p>Fehlermeldung des DB-Servers:</p>\n");
		$return .= ("<p>" . $e->getMessage() . "</p>\n");
		$return .= ("<h4>Stack-Trace</h4>\n");
		$return .= ($e->getTraceAsString());
		return $return;
	}
}  // Ende der Funktion lookForPersons()



/*
 * Beginn der Behandlung der Benutzereingaben
 */

if(isset($_POST['suchen'])) {
	// Schaedliche Zeichen aus dem Input-String filtern
	//$nachname = filter_input(INPUT_POST, 'nachname',FILTER_SANITIZE_STRING);
	$nachname = $_POST['nachname'];
	$kursID = filter_input(INPUT_POST, 'kurs', FILTER_SANITIZE_NUMBER_INT);
	$resultate = lookForPersons($dbHandler, $kursID, $nachname);

} else {
	$resultate = "<p>Noch keine Suche durchgef&uuml;hrt.</p>";
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sch&uuml;lerInnen suchen</title>
</head>
<body>
	<h1>Sch&uuml;lerInnen des EF Informatik 14/15 suchen</h1>
	<h2>Gefunden wurden:</h2>
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
				<input type="text" name="nachname" />
			</p>
			<p>
				<label for="kurs">Kurs: </label> <select name="kurs">
					<?php print(makeDropDownOptions($dbHandler));?>
				</select>
			</p>
			<p>
				<label for="suchen">Suche starten? </label> 
				<input type="submit" name="suchen" value="Los!" />
			</p>
		</fieldset>
	</form>
</body>
</html>
