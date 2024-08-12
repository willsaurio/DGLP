<?php
var_dump($_POST);
include("Database2.php");
$ID= $POST["ID"];
$Cedula= $_POST["Cedula"];
$Nombre_Apellido= $_POST["Nombre_Apellido"];
$Placa= $_POST["Placa"];
$Vehiculo= $_POST["vehiculo"];
$Departamento= $_POST["lista1"];
$Observacion= $_POST["Observacion"];
$Fecha= $_POST["Fecha"];
$Hora= $_POST["entrada"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/


date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d"); 



$datos= "INSERT INTO `visitas`(`ID`, `Cedula`, `Nombre_Apellido`, `Placa`, `Vehiculo`, `Departamento`, `Observacion`, `Fecha`, `entrada`)
VALUES (NULL, '$Cedula', '$Nombre_Apellido', '$Placa', '$Vehiculo', '$Departamento', '$Observacion', '$Fecha', '$Hora')";  

$resultado= mysqli_query($conexion, $datos);

if ($resultado) {
	echo "<script>alert('Visita Registrada');
	window.location='visitasver2.php'</script>";
} else {
  echo "<script>alert('No Se Guardo'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>
<BR>



