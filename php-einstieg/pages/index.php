<?php
$gruss = "Sei gegr&uuml;sst, mein Freund!";
?>
 
 
<!DOCTYPE html>
<html lang="de">

<!-- "head" ist nicht etwa der Seitenkopf, 
der head-Bereich enthaelt vielmehr Informationen, die dem 
Browser anzeigen, wie er die Webseite aufbereiten soll -->
<head>
<!-- Die Tags im Head-Bereich werden spaeter in diesem
Kurs erklaert. Insbesondere werden Sie dann verstehen,
was "charset" bedeutet -->
<meta charset="UTF-8">
<title>Meine erste PHP-Webseite</title>
</head>


<!-- Der Body-Bereich enthaelt alles, was auf der 
Webseite sichtbar ist. -->
<body>

<!-- Hier folgt ein <p>-Tag. <p> bedeutet "paragraph",
auf deutsch also ein Absatz. -->
<p>
Im n&auml;chsten Absatz erscheint die Ausgabe meines PHP-Programms:
</p>
<?php 
print($gruss);
?>
<p>

</p>
</body>
</html>