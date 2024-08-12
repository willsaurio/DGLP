<?php

// Obtén el ID del supervisor desde la solicitud AJAX
$id = $_GET['id'];

// Realiza una consulta SQL para obtener la información del supervisor por ID
require 'Database2.php';

if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}

$tareas = "SELECT `idEmp`, `nomina`, `inss`, `nombre_apellido`, `cargo`, `ubicacion`, `jornada_laboral`, `fecha_ingreso`, `cedula`, `registro`, `estado`, `usuario` FROM `nomina` WHERE `idEmp` = '$id'";
$resultado = mysqli_query($conexion, $tareas);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$fetch = mysqli_fetch_array($resultado);


// Crear un arreglo asociativo con los datos del supervisor(nombre debe ser diferente al del fetch[''])
$response = array(
    'nomi' => $fetch['nomina'],
    'idinss' => $fetch['inss'],
    'nombres' => $fetch['nombre_apellido'],
    'idcedu' => $fetch['cedula'],
    'puesto' => $fetch['cargo'],
    'ubi' => $fetch['ubicacion'],
    'jornada' => $fetch['jornada_laboral'],
    'ingreso' => $fetch['fecha_ingreso'],
    'digitado' => $fetch['registro'],
    'est' => $fetch['estado'],
 );

// Devolver los datos en formato JSON
echo json_encode($response);

?>

