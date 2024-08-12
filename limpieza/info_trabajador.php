<?php
$mysqli = new mysqli("localhost", "root", "12345678", "los_cocos");

if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

// Obtener el nombre y apellido del parámetro GET
$inss = $_GET['inss'];

$query = "SELECT nombre_apellido, cargo FROM nomina WHERE inss = ?";
$stmt = $mysqli->prepare($query);

if ($stmt) {
    $stmt->bind_param("s", $inss);
    $stmt->execute();
    $stmt->bind_result($nombre_apellido, $cargo);

    // Obtener los resultados
    $stmt->fetch();

    // Crear un array asociativo con los detalles
    $detalles = array(
        'nombre_apellido' => $nombre_apellido,
        'cargo' => $cargo
    );

    // Convertir el array a formato JSON y devolverlo
    echo json_encode($detalles);
    
    // Cerrar la conexión y liberar recursos
    $stmt->close();
} else {
    // Enviar un mensaje de error si la preparación de la consulta falla
    echo json_encode(array('error' => 'Error en la preparación de la consulta.'));
}

$mysqli->close();
?>
