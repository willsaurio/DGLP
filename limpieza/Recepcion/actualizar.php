<?php
// Incluye el archivo de conexión a la base de datos
include("Database2.php");
var_dump($_POST);
// Recopila los datos del formulario
$id = $_POST["id"];
$salida = $_POST["salida"];
$regreso = $_POST["regreso"];
$viaje = $_POST["viaje"];
$ruta = $_POST["ruta"];


// Prepara la consulta SQL para actualizar la hora de salida en la tabla visitas


$datos= "UPDATE `limpieza` SET `salida`='$salida',`retorno`='$regreso',`viaje_kg`='$viaje' WHERE idlimp = '$id'";  

$resultado= $conexion->query($datos);

echo "<script>alert('Datos $ruta Actualizado');
window.location='/DGLP/limpieza/detalle_limpieza.php'</script>";


// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

