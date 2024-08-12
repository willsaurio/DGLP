<?php
// regreso.php

// Obtén el ID del supervisor desde la solicitud AJAX
$id = $_GET['id'];

// Realiza una consulta SQL para obtener la información del supervisor por ID
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

if (!$mysqli) {
    die("Error: No se pudo conectar a la base de datos.");
}

$tareas = "SELECT `id`, `nombre_apellido`,  `cedula`, `ubicacion`, `fecha_entrada`, `entrada`, `salida`, `fecha_salida`, `observacion` FROM `asistencia` WHERE  id='$id'";
$resultado = mysqli_query($mysqli, $tareas);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($mysqli));
}

$fetch = mysqli_fetch_array($resultado);

// Crear un arreglo asociativo con los datos del supervisor(nombre debe ser diferente al del fetch[''])
$response = array(
    'nombre' => $fetch['nombre_apellido'],
    'fecha1' => $fetch['fecha_entrada'],
    'horae' => $fetch['entrada'],
    'fecha2' => $fetch['fecha_salida'],
    'horas' => $fetch['salida'],
    'cedu' => $fetch['cedula'],
    'ubi' => $fetch['ubicacion'],
    'observ' => $fetch['observacion'],
  );

// Devolver los datos en formato JSON
echo json_encode($response);

?>

