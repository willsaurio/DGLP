<?php
//var_dump($_POST);
include("../asistencia/conexion.php");
$ID= $_POST["id"];
$fecha = $_POST["fecha"];
$turno= $_POST["turno"];
$centro= $_POST["centro"];
$equipo= $_POST["equipos"];
$descripcion= $_POST["descripcion"];
$nombres= $_POST["nombres"];
$inss= $_POST["inss"];
$cargo = $_POST["cargo"];
$registro= $_POST["registro"];
$usuario= $_POST["usuario"];

/*$verificar= "SELECT * FROM transferencia WHERE centro='$centro' and equipo='$equipo' and fecha = CURDATE()"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas==0){*/

$datos= "INSERT INTO `transferencia`(`id`, `fecha`, `turno`, `centro`, `equipo`, `descripcion`, `nombre`, `inss`, `cargo`, `registro`, `usuario`) VALUES 
 (NULL,'$fecha', '$turno', '$centro', '$equipo', '$descripcion', '$nombres', '$inss', '$cargo', '$registro', '$usuario')";  

$resultado= $conexion->query($datos);
if ($resultado) {
   
	echo "<script>alert('Actividad al centro $centro Registrada');
	window.location='Transferencia.php'</script>";
} else {
  echo "<script>alert('Hubo un Error!!!'); window.location='Transferencia2.php'</script>";
}
mysqli_close($conexion);

?>

