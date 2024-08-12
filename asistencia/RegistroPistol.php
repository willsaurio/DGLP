<?php

include("conexion.php");
$ID= $_POST["id"];
$idemp = $_POST["idEmp"];
$Fecha= $_POST["Fecha"];
$Hora= $_POST["Hora"];
$INSS= $_POST["INSS"];
$nombres= $_POST["nombre_apellido"];
$cedula= $_POST["cedula"];
$depa= $_POST["departamento"];
$observacion= $_POST["observacion"];
$usuario= $_POST["usuario"];



/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 

date_default_timezone_set('America/Managua');
$Fecha=date("y-m-d");

$verificar= "SELECT * FROM asistencia WHERE inss='$INSS' AND fecha_entrada=CURDATE()"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas>0){

  echo "<script>alert('$INSS YA EXISTE EN ENTRADA DE HOY!'); window.location='entrada.php';</script>";

}
else {

$datos= "INSERT INTO  `asistencia`(`id`, `idemp`, `nombre_apellido`, `inss`, `cedula`, `ubicacion`, `fecha_entrada`, `entrada`,  `observacion`, `usuario`)
VALUES (NULL, '$idemp', '$nombres', '$INSS', '$cedula', '$depa', '$Fecha', '$Hora', '$observacion', '$usuario')";  
$resultado= mysqli_query($conexion, $datos);

echo "<script>alert('ENTRADA DE $INSS REALIZADA!');
	window.location='entrada.php'</script>";

	
  }

  mysqli_close($conexion);
  ?>

