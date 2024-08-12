<?php

include("Database2.php");
$ID= $POST["id"];
$Fecha= $_POST["fecha"];
$Hora= $_POST["salida"];
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

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d");

$verificar= "SELECT * FROM almuerzo WHERE inss='$INSS' AND fecha=CURDATE()"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas==0){

$datos= "INSERT INTO `almuerzo` (`id`, `fecha`, `salida`, `inss`, `nombre_apellido`, `cedula`, `cargo`, `departamento`)
VALUES (NULL, '$Fecha', '$Hora', '$INSS', '$Nombres_Apellidos', '$Cedula', '$Cargo', '$Departamento')";  
$resultado= mysqli_query($conexion, $datos);

	echo "<script>alert('Hora de Almuerzo Registrada');
	window.location='ALMUERZO.php'</script>";
} else {
  echo "<script>alert('Ya Existe Registro!!!'); window.location='ALMUERZO.php';</script>";
}
mysqli_close($conexion);

?>



