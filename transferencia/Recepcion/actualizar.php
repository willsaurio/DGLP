<?php
// Incluye el archivo de conexión a la base de datos
include("Database2.php");

// Recopila los datos del formulario
$id = $_POST["id"];
$salida = $_POST["salida"];
$regreso = $_POST["regreso"];
$viaje = $_POST["viaje"];
$centro = $_POST["centro"];



// Prepara la consulta SQL para actualizar la hora de salida en la tabla visitas


$datos= "UPDATE `transferencia` SET `salida_dglp`='$salida',`regreso_dglp`='$regreso',`viaje_kg`='$viaje' WHERE id = '$id'";  

$resultado= $conexion->query($datos);

echo "<script>alert('Datos $centro Registrados!');
window.location='/DGLP/transferencia/detalle_transferencia.php'</script>";


// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>

