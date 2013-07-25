<?php
/*
 * Den Code der Klassendatei einbinden:
 * (das Kürzel "../" bedeutet:
 * "Geh in den übergeordneten Ordner!"
 */
require_once('../classes/Begruesser.php');

// Erzeugen Sie hier ein neues Objekt vom Typ
// Begruesser und weisen Sie es der 
// Variable $snoopy zu.

$snoopy;


// Rufen Sie hier die Begruessungs-Methode auf.
// Weisen Sie deren Rueckgabewert der Variable
// $begruessung zu.
$begruessung;

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Erste &Uuml;bung mit Objekten</title>
<link rel="stylesheet" href="../stylesheets/styles_object1.css" />
</head>
<body>
<h1>Erste &Uuml;bung mit einem Objekt</h1>
<p>Die Begr&uuml;ssung:<p>
<p>
<?php 
print($begruessung);
?>
</p>
</body>
</html>