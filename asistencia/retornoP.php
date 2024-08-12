<?php

include("Database2.php");
$ID= $_POST["id"];
$Fecha= $_POST["fecha"];
$Hora= $_POST["entrada"];
$salida= $_POST["salida"];
$INSS= $_POST["inss"];
$Nombres_Apellidos= $_POST["nombre_apellido"];
$Cedula= $_POST["cedula"];
$Cargo= $_POST["cargo"];
$Departamento= $_POST["departamento"];
$justificacion= $_POST["justificacion"];
$autorizacion= $_POST["autorizacion"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d");

$datos= "UPDATE `almuerzo_pemiso` SET inss='$INSS', `entrada`='$Hora' WHERE id='$ID'";  
if ($INSS>0) {
$resultado= mysqli_query($conexion, $datos);

	echo "<script>alert('Hora Registrada');
	window.location='PermisoR.php'</script>";
} else {
  echo "<script>alert('No Se Guardo Entrada'); window.location='PermisoR.php';</script>";
}
mysqli_close($conexion);

?>



