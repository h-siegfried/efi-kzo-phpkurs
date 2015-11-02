<?php
$gruss = "Hallo Welt!";
?>
 
 
<!DOCTYPE html>
<html lang="de">

<!-- 
	Nun folgt der "head"-Bereich.
	"head" ist nicht etwa der Seitenkopf, 
	der head-Bereich enthaelt vielmehr Informationen, die dem 
	Browser anzeigen, wie er die Webseite aufbereiten soll. 
	
	Die Tags im Head-Bereich werden spaeter in diesem
	Kurs erklaert. Insbesondere werden Sie dann verstehen,
	was "charset" bedeutet
-->
<head>

<meta charset="UTF-8">
<title>Meine erste PHP-Webseite</title>
<link rel="stylesheet" href="../style/php-einstieg.css">
</head>


<!-- 
	Es folgt der Body-Bereich der Webseite.
	Der Body-Bereich enthaelt alles, was auf der 
	Webseite sichtbar ist. 
-->
<body>

<!-- 
	Hier folgt ein <p>-Tag. <p> bedeutet "paragraph",
	auf deutsch also ein Absatz. 
-->
<p>
Im n&auml;chsten Absatz erscheint die Ausgabe meines PHP-Programms:
</p>

<p>
<?php 
// Auf der folgenden Zeile können Sie 
// die Ausgabe programmieren.
print($gruss);
?>
</p>



</body> <!-- Ende des Body-Bereichs -->

</html>