<?php
$woerter = array("erstens", "zweitens", "drittens", "viertens");
/*
 * Weisen Sie gleich unter diesem Kommentar
 * der Variable $wort eines der Wörter aus dem Array $woerter zu!
 */
$wort = "";

$hauptstaedte = array(
    'Ägypten' => "Kairo",
    'Belgien' => "Bruxelles",
    'BRD' => "Berlin",
    'China' => "Peking",
    'Estland' => 'Tallinn'
);
/*
 * Weisen Sie gleich unter diesem Kommentar
 * der Variable $hauptstadt einen der Strings
 * aus dem Array $hauptstaedte zu!
 */
$hauptstadt = "";


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Erste &Uuml;bungen mit Arrays</title>
    <link rel="stylesheet" href="../style/styles_array1.css"/>
</head>


<body>
<h1>Erste &Uuml;bungen mit Arrays</h1>

<l2>Hier erscheint eines der Wörter</l2>
<p>
    <?php

    ?>
</p>
<l2>...und hier eine der Hauptstädte</l2>
<p>
    <?php

    ?>
</p>

<l2>
    ...und hier das ganze Hauptstädte-Array:
</l2>
<p>
    <?php
    print_r($hauptstaedte);
    ?>
</p>

</body>

</html>