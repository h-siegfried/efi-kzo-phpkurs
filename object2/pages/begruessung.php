<?php
/*
 * Den Code der Klassendatei einbinden:
 * (das Kürzel "../" bedeutet:
 * "Geh in den übergeordneten Ordner!"
 */
require_once('../classes/Begruesser.php');

if( isset($_POST['hoeflichkeit']) ) {
	// Uebernehmen Sie hier aus dem Array $_POST die Elemente, die Sie 
	// fuer den Konstruktor des Begruessers brauchen, in neue Variablen.
	$politesse = $_POST['hoeflichkeit'];
	$alter = $_POST['alterBegruesser'];
	$genusBegruesser = $_POST['genderBegruesser'];
	
	
	
	// Erzeugen Sie hier ein neues Objekt vom Typ
	// Begruesser. Uebergeben Sie dem Konstruktor die vorher
	// erzeugten Variablen. Weisen Sie das neue Objekt der 
	// Variable $snoopy zu.
	$snoopy = new Begruesser($politesse, $genusBegruesser, $alter);
	
	
	// Uebernehmen Sie hier aus dem Array $_POST die Elemente, die Sie
	// fuer den Aufruf der Begruessungs-Methode brauchen.
	$geschlechtsname = $_POST['geschlechtsname'];
	$vorname = $_POST['vorname'];
	$genderNutzer = $_POST['genderNutzer'];
	
	
	
	// Rufen Sie diese Methode dann auf.
	// Weisen Sie deren Rueckgabewert der Variable
	// $begruessung zu.
	$begruessung = $snoopy->getBegruessung($geschlechtsname, $vorname, $genderNutzer);
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Erste &Uuml;bung mit Objekten</title>
<link rel="stylesheet" href="../stylesheets/styles_object1.css" />
</head>
<body>
<h1>&Uuml;bung mit einem Objekt und Formulardaten</h1>
<p>Die Begr&uuml;ssung:<p>
<p>
<?php 
print($begruessung);
?>
</p>
<h2>Ihre Eingaben</h2>
<form action="#" method="post">
	<p>
		Gew&uuml;nschtes Alter des Begr&uuml;ssers: 
		<input type="number" name="alterBegruesser" value=25 />
	</p>
	<p>
		Gew&uuml;nschtes Geschlecht des Begr&uuml;ssers: 
		<input type="text" name = "genderBegruesser" />
	</p>
	<p>
		Gew&uuml;nschter H&ouml;flichtkeitsgrad des Begr&uuml;ssers: 
		<input type="number" name = "hoeflichkeit" />
	</p>
	<p>
		Ihr Name: 
		<input type="text" name = "geschlechtsname" />
	</p>
	<p>
		Ihr Vorname: 
		<input type="text" name = "vorname" />
	</p>
	<p>
		Ihr Geschlecht: 
		<input type="text" name = "genderNutzer" />
	</p>
	<p>
		Abschicken! 
		<input type="submit" value = "Los!" />
	</p>


</form>
</body>
</html>