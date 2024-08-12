<?php
// regreso.php

// Obtén el ID del supervisor desde la solicitud AJAX
$id = $_GET['id'];

// Realiza una consulta SQL para obtener la información del supervisor por ID
require 'Database2.php';

if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos.");
}

$tareas = "SELECT `idlimp`, `fecha`, `turno`, `ruta`, `equipo`, `descripcion`, `operario1`, `inss1`, `operario2`, `inss2`, `operario3`, `inss3`, `distrito`, `cantidad_viajes`, `total_kg`, `toneladas`,
 `horas_trabajadas`, `km_recorridos`, `fiscal`, `jefe_seccion`
FROM `limpieza` WHERE `idlimp` = '$id'";
$resultado = mysqli_query($conexion, $tareas);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$fetch = mysqli_fetch_array($resultado);


// Crear un arreglo asociativo con los datos del supervisor(nombre debe ser diferente al del fetch[''])
$response = array(
    'turno' => $fetch['turno'],
    'destino' => $fetch['ruta'],
    'codigo' => $fetch['equipo'],
    'tipo' => $fetch['descripcion'],
    'op1' => $fetch['operario1'],
    'id1' => $fetch['inss1'],
    'op2' => $fetch['operario2'],
    'id2' => $fetch['inss2'],
    'op3' => $fetch['operario3'],
    'id3' => $fetch['inss3'],
    'dist' => $fetch['distrito'],
    'viajes' => $fetch['cantidad_viajes'],
    'kg' => $fetch['total_kg'],
    'ton' => $fetch['toneladas'],
    'horas' => $fetch['horas_trabajadas'],
    'km' => $fetch['km_recorridos'],
    'fiscal' => $fetch['fiscal'],
    'jefe' => $fetch['jefe_seccion']
 );

// Devolver los datos en formato JSON
echo json_encode($response);

?>

