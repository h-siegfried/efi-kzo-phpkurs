<?php
/* Den sogenannten output buffer starten.
* Dieser sammelt alle Ausgaben des FirePHP-Objekts und
* fuegt sie am Schluss so in die HTML_Seite ein, 
* dass sie fuer Firebug sichtbar sind.
*/ 
ob_start();

// Die Klasse FirePHP einbinden
require_once('../../FirePHPCore/FirePHP.class.php');

// Ein neues FirePHP-Objekt erzeugen:
$firephp = new FirePHP();



?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Object-&Uuml;bungen</title>
<link rel="stylesheet" href="../style/styles_object2.css" />
</head>


<body>
<h1>&Uuml;bungen mit dem Datentyp Object</h1>

<p>Im n&auml;chsten Absatz erscheint die Ausgabe meines PHP-Programms:</p>

<p>
<?php 
$firephp->log($firephp->getOptions());
?>
</p>

</body>

</html>