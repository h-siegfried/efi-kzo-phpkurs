<?php
$satz = "Premiere in der Schweiz: 
		Der Flughafen Genf schleust Passagiere 
		gegen einen Aufpreis schneller durch die Sicherheitskontrolle.";
$quelle = "TA vom 24.7.13";
$woerter = array();




?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Erste &Uuml;bungen mit Arrays</title>
<link rel="stylesheet" href="../style/styles_array1.css" />
</head>


<body>
<h1>Erste &Uuml;bungen mit Arrays</h1>

<p>
	Hier der urspr&uuml;ngliche Satz:<br />
	<?php print($satz);?>
</p>

<p>
	...und hier die Ausgabe des Wörter-Arrays:
</p>
<p>
	<?php 
	print_r($woerter);
	?>
</p>

</body>

</html>