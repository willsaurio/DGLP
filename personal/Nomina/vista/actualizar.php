<?php
// Incluye el archivo de conexión a la base de datos
include("Database2.php");

// Recopila los datos del formulario
$id = $_POST["id"];
$nomina = $_POST["planilla"];
$inss = $_POST["inss"];
$empleado = $_POST["empleado"];
$cargo = $_POST["cargo"];
$ubicacion = $_POST["ubicacion"];
$jornada = $_POST["jornada"];
$ingreso = $_POST["ingreso"];
$cedula = $_POST["cedula"];
$registro = $_POST["registro"];
$estado = $_POST["estado"];


// Prepara la consulta SQL para actualizar la hora de salida en la tabla visitas


$datos= "UPDATE `nomina` SET  `nomina`='$nomina',`inss`='$inss',`nombre_apellido`='$empleado',`cargo`='$cargo',`ubicacion`='$ubicacion',`jornada_laboral`='$jornada',`fecha_ingreso`='$ingreso',`cedula`='$cedula',
`estado`='$estado' WHERE idEmp = '$id'";  

$resultado= $conexion->query($datos);

echo "<script>alert('Datos $empleado Actualizado');
window.location='/DGLP/personal/Nomina/nomina.php'</script>";


// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

