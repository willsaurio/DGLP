<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query = mysqli_query($mysqli, "SELECT `iddist`, `distrito` FROM `distrito` ORDER BY distrito ASC");
?>

<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query2 = mysqli_query($mysqli, "SELECT `idruta`, `ruta` FROM `rutas`");
?>

<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query3 = mysqli_query($mysqli, "SELECT `idturno`, `turno` FROM `turno`");
?>

<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query4 = mysqli_query($mysqli, "SELECT `idzona`, `zona` FROM `zona`");
?>

<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query5 = mysqli_query($mysqli, "SELECT `idEquip`, `equipo`, descripcion, estado FROM `equipos`");
?>

<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query6 = mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
?>

<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query7 = mysqli_query($mysqli, "SELECT * FROM `centro_atencion`");
?>