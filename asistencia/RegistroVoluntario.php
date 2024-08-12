<?php
//var_dump($_POST);
include("conexion.php");
$ID= $_POST["id"];
$Fecha= $_POST["Fecha"];
$Hora= $_POST["Hora"];
$nombres= $_POST["nombre_apellido"];
$cedula= $_POST["CEDULA"];
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

$verificar= "SELECT * FROM asistencia WHERE cedula='$cedula' AND fecha_entrada=CURDATE()"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas>0){

  echo "<script>alert('$cedula YA EXISTE EN ENTRADA DE HOY!'); window.location='entrada_voluntario.php';</script>";

}
else {

$datos= "INSERT INTO  `asistencia`(`id`, `nombre_apellido`, `cedula`, `ubicacion`, `fecha_entrada`, `entrada`, `observacion`, `usuario`)
VALUES (NULL, '$nombres', '$cedula', '$depa', '$Fecha', '$Hora', '$observacion', '$usuario')";  
$resultado= mysqli_query($conexion, $datos);

echo "<script>alert('ENTRADA DE $cedula REALIZADA!');
	window.location='entrada_voluntario.php'</script>";

	
  }

  mysqli_close($conexion);
  ?>

