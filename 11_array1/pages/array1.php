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

<h2>Hier erscheint eines der Wörter</h2>
<p>
    <?php

    ?>
</p>
<h2>...und hier eine der Hauptstädte</h2>
<p>
    <?php

    ?>
</p>


<h2>Hier erscheint das ganze Wörter-Array</h2>
<p>
    <?php
    print_r($woerter);
    ?>
</p>

<h2>...und hier das ganze Hauptstädte-Array:</h2>
<p>
    <?php
    print_r($hauptstaedte);
    ?>
</p>

</body>

</html>