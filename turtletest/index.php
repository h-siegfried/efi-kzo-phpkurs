<?php
/**
 * Created by PhpStorm.
 * User: sif
 * Date: 13.08.16
 * Time: 22:24
 */

require_once "../Turtle_class/Turtle.php";
$img=imagecreatetruecolor(600,600);

$snoopy = new Turtle($img);

$snoopy->setPenColor(255, 0, 0);
$snoopy->setPenWidth(3);
$snoopy->jumpTo(300, 100);
$snoopy->penDown();

$anzEcken = 24;
for($i = 0; $i < $anzEcken; $i++)
{
    $snoopy->forward(10);
    $snoopy->turn(360 / $anzEcken);
}

$snoopy->jumpTo(300, 300);

for($i = 0; $i < $anzEcken; $i++)
{
    $snoopy->forward(10);
    $snoopy->turn(360 / $anzEcken);
}



imagepng($img,"bild.png");


?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Test der Klasse Turtle</title>
</head>

<body>
<h1>Test der KLasse Turtle</h1>
<img src="bild.png">
</body>
</html>
