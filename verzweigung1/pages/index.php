<?php
$alter = -1;        // Das Alter, das die Benutzerin eingegeben hat
$begruessung = "";  // Die Begrüssung, die wir ihr präsentieren


// Den folgenden Code verstehen Sie vielleicht schon der Spur nach,
// wenn Sie wissen, dass die Eingabe des Benutzers
// unter $_POST['alter'] vorliegt:

if(!empty($_POST['alter'])) {
	$alter = $_POST['alter'];
}

// Programmieren Sie hier eine Fallunterscheidung:
// Ist der Wert von $alter gleich -1, so hat die Benutzerin noch gar nichts eingegeben.
// Liegt der Wert unterhalb von 18 Jahren,
// weisen Sie $begruessung einen String fuer Minderjaehrige zu,
// sonst einen fuer Volljaehrige:






?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Erste &Uuml;bung mit Objekten</title>
<link rel="stylesheet" href="../stylesheets/styles_verzweigung1.css" />
</head>
<body>
<h1>Erste &Uuml;bung mit einer Verzweigung</h1>



<h2>Geben Sie hier Ihr Alter ein!</h2>
<form action="#" method="post">
<p>
	Ihr Alter: 
	<input type="number" name="alter" />
</p>
<p>
	Abschicken: 
	<input type="submit" value="Los!" />
</p>
</form>


<h2>Die Begr&uuml;ssung:<h2>
<p>
	<?php
	print($begruessung);
	?>
</p>

</body>
</html>