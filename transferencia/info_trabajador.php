<?php
$mysqli = new mysqli("localhost", "root", "12345678", "los_cocos");

if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

// Obtener el nombre y apellido del parámetro GET
$nombre_apellido = $_GET['nombre_apellido'];

$query = "SELECT inss, cargo FROM nomina WHERE nombre_apellido = ?";
$stmt = $mysqli->prepare($query);

if ($stmt) {
    $stmt->bind_param("s", $nombre_apellido);
    $stmt->execute();
    $stmt->bind_result($inss, $cargo);

    // Obtener los resultados
    $stmt->fetch();

    // Crear un array asociativo con los detalles
    $detalles = array(
        'inss' => $inss,
        'cargo' => $cargo
    );

    // Convertir el array a formato JSON y devolverlo
    echo json_encode($detalles);

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta.";
}

$mysqli->close();
?>
