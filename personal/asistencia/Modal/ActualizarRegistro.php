<?php
//var_dump($_POST);
include("Database2.php");
$ID= $_POST["id"];
$Fecha= $_POST["fecha"];
$entrada= $_POST["entrada"];
$salida= $_POST["salida"];
$fecha_salida= $_POST["fecha_salida"];
$observacion= $_POST["observacion"];
$nombre = $_POST["nombre"];

/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/


$datos= "UPDATE `asistencia` SET `entrada`='$entrada',`fecha_salida`='$fecha_salida',`salida`='$salida',`observacion`='$observacion' WHERE `id`='$ID'";  

$resultado= $conexion->query($datos);

if ($resultado) {
	echo "<script>alert('Registro de $nombre Actualizado');
	window.location='/DGLP/personal/asistencia/asistencia.php'</script>";
} else {
  echo "<script>alert('No Se Guardo Cambio'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>


