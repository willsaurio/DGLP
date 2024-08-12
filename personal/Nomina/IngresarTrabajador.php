<?php
//var_dump($_POST);
include("vista/Database2.php");
$ID= $_POST["id"];
$nomina = $_POST["planilla"];
$INSS= $_POST["inss"];
$Nombres_Apellidos= $_POST["nombre_apellido"];
$Cedula= $_POST["cedula"];
$Cargo= $_POST["cargo"];
$ubicacion= $_POST["ubicacion"];
$Ingreso= $_POST["Ingreso"];
$jornada = $_POST["jornada"];
$estado= $_POST["estado"];
$registro= $_POST["registro"];
$usuario= $_POST["usuario"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

$verificar= "SELECT * FROM nomina WHERE cedula='$Cedula' and inss = '$INSS'"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas==0){

$datos= "INSERT INTO `nomina`(`idEmp`, `nomina`, `inss`, `nombre_apellido`, `cargo`, `ubicacion`, `jornada_laboral`, `fecha_ingreso`, `cedula`, `registro`, `estado`, `usuario`)
VALUES (NULL,'$nomina', '$INSS', '$Nombres_Apellidos', '$Cargo', '$ubicacion', '$jornada', '$Ingreso', '$Cedula', '$registro',  '$estado', '$usuario')";  

$resultado= $conexion->query($datos);


	echo "<script>alert('Trabajador $Nombres_Apellidos Registrado');
	window.location='nomina.php'</script>";
} else {
  echo "<script>alert('Registro de $Nombres_Apellidos ya Existe!'); window.location='NuevoTrabajador.php'</script>";
}
mysqli_close($conexion);

?>

