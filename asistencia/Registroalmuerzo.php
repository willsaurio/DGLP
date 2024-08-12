<?php
//var_dump ($_POST);
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
/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 


$datos= "UPDATE `almuerzo` SET `fecha`='$Fecha',`salida`='$salida',`entrada`='$Hora',`inss`='$INSS',`nombre_apellido`='$Nombres_Apellidos',`cedula`='$Cedula',`cargo`='$Cargo',`departamento`='$Departamento' WHERE id='$ID'";
if ($INSS>0) {
$resultado= mysqli_query($conexion, $datos);

	echo "<script>alert('Hora Registrada');
	window.location='RALMUERZO.php'</script>";
} else {
  echo "<script>alert('No Se Guardo Entrada'); window.location='RALMUERZO.php';</script>";
}
mysqli_close($conexion);

?>



