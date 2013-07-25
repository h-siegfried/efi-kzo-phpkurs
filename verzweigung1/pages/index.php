<?php
$begruessung = "";

// Programmieren Sie hier eine Fallunterscheidung (Verzweigung):
// Wird ein Alter unterhalb von 18 Jahren eingegeben, 
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
<p>Die Begr&uuml;ssung:<p>
<p>
<?php 
print($begruessung);
?>
</p>


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
</body>
</html>