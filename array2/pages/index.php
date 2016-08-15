<?php
/* Programmieren Sie hier das Auslesen der Benutzer-Eingaben
*  aus dem Array $_POST und das Zusammensetzen einer anstaendigen Begruessung:
*/


$begruessung = "";
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>HTML-Formular-Beispiel</title>
<link rel="stylesheet" href="../style/styles_array1.css" />
</head>

<body>
<h1>Beispiel f&uuml; ein HTML-Formular</h1>

<h2>Die Ausgabe des PHP-Programms</h2>
<p>
<?php
print($begruessung);
?>
</p>

<h2>Das Formular zur Dateneingabe</h2>
<form action="#" method = "post">
	<p>
		Name: <input type="text" name="nachname" />
	</p>

	<p>
		Vorname: <input type="text" name="vorname" />
	</p>

	<p>
		Geburtsjahr: <input type="text" name="gebJahr" />
	</p>

	<p>
		<input type="submit" name="go" value="abschicken!" />
	</p>
</form>
</body>

</html>