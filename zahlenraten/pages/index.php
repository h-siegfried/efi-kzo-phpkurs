<?php 
$antwort_teil1 = "Ihr Rateversuch ist ";
$antwort_teil2 = "";



// Hier wird geprueft, ob dies der erste Seitenaufruf ist,
// oder ob der Benutzer ein neues Spiel beginnen moechte:
if((!isset($_POST)) || isset($_POST['neuesSpiel'])) {
	// In diesem Fall muessen wir eine neue Zufallszahl erzeugen!
	// Programmieren Sie das und weisen Sie die Zufallszahl der Variable
	// $meineZahl zu.
	
	
	
}
else{  // Ein Spiel ist am Laufen, Geheimzahl reaktivieren:
	$meineZahl = $_POST['geheimzahl'];
}


// Hier wird geprueft, ob der Benutzer ueberhaupt schon  
// einen Rateversuch eingegeben und abgeschickt hat.
if(isset($_POST['rateversuch'])) {
	$versuch = $_POST['rateversuch'];
} 
else {
	$versuch = 0;
	$antwort_teil2 = "noch nicht erfolgt.";
}


// Programmieren Sie hier die Fallunterscheidung:
// Der Antwortversuch steht unter der Variable $versuch
// zur Verfuegung.
// Weisen Sie der Variable $antwort_teil2 den passenden
// String zu, je nachdem, ob die Antwort zu hoch,
// zu niedrig oder genau richtig war!




?>


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Zahlenratespiel</title>
</head>

<body>

	<h1>Ein Zahlenratespiel</h1>

	<div id="feedback">
		<h2>Die Antwort</h2>
		<p>
			<?php 
			// Programmieren Sie hier mit der Funktion print(),
			// dass die Antwort ausgegeben wird.
			// Die beiden Strings der Variablen
			// $antwort_teil1 und $antwort_teil2
			// sollen aneinandergehaengt werden.


			?>
		</p>
	</div>

	<div id="formular">
		<h2>Raten Sie, welche Zahl ich mir ausgedacht habe!</h2>
		<p>
			Sie liegt zwischen
			<?php print($min);?>
			und
			<?php print($max);?>
			.
		</p>
		<form action="#" method="post">
			<p>
				Ihr Rateversuch: 
				<input type="number" name="rateversuch" />
				<input type="hidden" name="geheimzahl" value=<?php print($meineZahl);?>
			</p>
			<p>
				Pr&uuml;fen? <input type="submit" value="Pr&uuml;fen!" />
			
			</p>
			
		</form>

	</div>

</body>

</html>