<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query=mysqli_query($mysqli, "SELECT `iddist`, `distrito` FROM `distrito` ORDER BY distrito ASC");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query2=mysqli_query($mysqli, "SELECT ruta, kmV1, kmV2 FROM `rutas`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query3=mysqli_query($mysqli, "SELECT `idturno`, `turno` FROM `turno`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query4=mysqli_query($mysqli, "SELECT `idzona`, `zona` FROM `zona`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query5=mysqli_query($mysqli, "SELECT `idEquip`, `equipo`, descripcion, estado FROM `equipos` WHERE descripcion = 'RECOLECTORA'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query6=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query7=mysqli_query($mysqli, "SELECT * FROM `centro_atencion`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query8=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query9=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query10=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query11=mysqli_query($mysqli, "SELECT * FROM `atencion_estado`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query12=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE cargo='FISCAL' AND estado = 'ACTIVO'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query13=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE cargo='JEFE DE SECCION' AND estado = 'ACTIVO'");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query14=mysqli_query($mysqli, "SELECT * FROM `roles`");
?>

