<?php

include("Database2.php");
$ID= $_POST["ID"];
$Fecha= $_POST["Fecha"];
$Hora= $_POST["Hora"];
$Estado= $_POST["Estado"];
$INSS= $_POST["INSS"];
$Nombres_Apellidos= $_POST["Nombres_Apellidos"];
$Cedula= $_POST["Cedula"];
$Cargo= $_POST["Cargo"];
$Departamento= $_POST["Departamento"];
$justificacion= $_POST["Justificacion"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d");

$datos= "INSERT INTO `registro_personal`(`ID`, `Fecha`, `Hora`, `Estado`, `INSS`, `Nombres_Apellidos`, `Cedula`, `Cargo`, `Departamento`, `Justificacion`)
VALUES (NULL, '$Fecha', '$Hora', '$Estado', '$INSS', '$Nombres_Apellidos', '$Cedula', '$Cargo', '$Departamento', '$justificacion')";  

$resultado= mysqli_query($conexion, $datos);

if ($resultado) {
	echo "<script>alert('Hora Registrada');
	window.location='CedulaSalida.php'</script>";
} else {
  echo "<script>alert('No Se Guardo Entrada'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>




