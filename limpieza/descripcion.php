<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

if (isset($_GET['equipo'])) {
    $idEquip = $_GET['equipo'];

    // Utilizar una consulta preparada para evitar problemas de seguridad
    $query = "SELECT descripcion FROM equipos WHERE equipo = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $idEquip);
        $stmt->execute();
        $stmt->bind_result($descripcion);

        if ($stmt->fetch()) {
            echo $descripcion;
        } else {
            echo "No se encontró descripción para el equipo seleccionado.";
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta.";
    }
} else {
    echo "Parámetro idEquip no proporcionado.";
}

$mysqli->close();
?>
