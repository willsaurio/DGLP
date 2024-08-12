<?php
// regreso.php

// Obtén el ID del supervisor desde la solicitud AJAX
$id = $_GET['id'];

// Realiza una consulta SQL para obtener la información del supervisor por ID
require 'Database2.php';

if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}

$tareas = "SELECT `id`, `fecha`, `turno`, `centro`, `equipo`, `descripcion`, `nombre`, `inss`, `cargo`, `salida_dglp`, `regreso_dglp`, `viaje_kg`, `registro`, `usuario` 
FROM `transferencia` WHERE `id` = '$id'";
$resultado = mysqli_query($conexion, $tareas);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$fetch = mysqli_fetch_array($resultado);


// Crear un arreglo asociativo con los datos del supervisor(nombre debe ser diferente al del fetch[''])
$response = array(
    'turno' => $fetch['turno'],
    'center' => $fetch['centro'],
    'codigo' => $fetch['equipo'],
    'tipo' => $fetch['descripcion'],
    'name' => $fetch['nombre'],
    'idinss' => $fetch['inss'],
    'car' => $fetch['cargo'],
    'salida' => $fetch['salida_dglp'],
    'regreso' => $fetch['regreso_dglp'],
    'viaje' => $fetch['viaje_kg'],
 );

// Devolver los datos en formato JSON
echo json_encode($response);

?>

