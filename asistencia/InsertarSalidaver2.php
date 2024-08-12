<?php
var_dump($_POST);
include("Database2.php");
$ID= $_POST["ID"];
$Estado= $_POST["Estado"];
$Cedula= $_POST["Cedula"];
$Nombre_Apellido= $_POST["Nombre_Apellido"];
$Placa= $_POST["Placa"];
$Vehiculo= $_POST["Vehiculo"];
$Departamento= $_POST["Departamento"];
$Motivo= $_POST["Motivo"];
$Observacion= $_POST["Observacion"];
$Fecha= $_POST["Fecha"];
$entrada= $_POST["entrada"];
$Hora= $_POST["salida"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/


date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d"); 



$datos= "UPDATE `visitas` SET `salida`='$Hora' WHERE ID='$ID'";  

$resultado= mysqli_query($conexion, $datos);

if ($resultado) {
	echo "<script>alert('Salida Registrada');
	window.location='/test/Personal/Filtrar/Rvisitaver2.php'</script>";
} else {
  echo "<script>alert('No Se Guardo'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>
<BR>



