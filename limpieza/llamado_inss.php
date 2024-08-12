<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query6=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
?>

