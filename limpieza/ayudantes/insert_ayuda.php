<?php
// Incluye el archivo de conexión a la base de datos
include("../Recepcion/Database2.php");
//var_dump($_POST);
// Recopila los datos del formulario
$id = $_POST["id"];
$cedula = $_POST["ayudante"];
$cargo = $_POST["cargo"];
$equipo = $_POST["equipo"];
$fecha = $_POST["fecha"];
$registro = $_POST["registro"];
$usuario = $_POST["usuario"];


// Prepara la consulta SQL para actualizar la hora de salida en la tabla visitas


$datos= "INSERT INTO `ayudantes`(`idayuda`, `ayudantes`, `cargo`, `equipo`, `fecha`, `registro`, `usuario`) VALUES
(NULL, '$cedula', '$cargo', '$equipo', '$fecha', '$registro', '$usuario')";  

$resultado= $conexion->query($datos);

echo "<script>alert('Ayudante $cedula Agregado');
window.location='/DGLP/limpieza/detalle_limpieza.php'</script>";


// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

