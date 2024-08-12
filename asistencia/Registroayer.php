<?php

include("Database2.php");
$ID= $_POST["id"];
$Fecha= $_POST["fecha_salida"];
$Hora= $_POST["salida"];
$INSS= $_POST["INSS"];
$Nombres_Apellidos= $_POST["Nombres_Apellidos"];
$Cedula= $_POST["Cedula"];
$Cargo= $_POST["Cargo"];
$Departamento= $_POST["Departamento"];
$justificacion= $_POST["Justificacion"];
$autoriza= $_POST["lista1"];
$observacion= $_POST["observacion"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d");

$datos= "UPDATE `asistencia` SET `fecha_salida`='$Fecha',`salida`='$Hora',`justificacion`='$justificacion',`autorizacion`='$autoriza',`observacion`='$observacion' WHERE id='$ID'";  
if ($INSS>0) {
$resultado= mysqli_query($conexion, $datos);

	echo "<script>alert('Salida Registrada');
	window.location='SALIDAAYER.php'</script>";
} else {
  echo "<script>alert('No Se Guardo Salida'); window.location='SALIDAR.php';</script>";
}
mysqli_close($conexion);

?>




