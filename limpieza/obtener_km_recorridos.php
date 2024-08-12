<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
}

if (isset($_GET['ruta'])) {
    $idRuta = $_GET['ruta'];

    // Utilizar una consulta preparada para evitar problemas de seguridad
    $query = "SELECT viaje, kmV1, kmV2 FROM rutas WHERE ruta = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $idRuta);
        $stmt->execute();
        $stmt->bind_result($viaje, $kmV1, $kmV2);

        if ($stmt->fetch()) {
            // Obtener la cantidad de viajes desde la solicitud GET
            $cantidadViajes = isset($_GET['cantidad_viajes']) ? intval($_GET['cantidad_viajes']) : 0;

            // Comparar con la cantidad de viajes y devolver el resultado como JSON
            $resultado = array('kmV1' => $kmV1, 'kmV2' => $kmV2);
            echo json_encode($resultado);
        } else {
            echo json_encode(array('kmV1' => null, 'kmV2' => null));
        }

        $stmt->close();
    } else {
        echo json_encode(array('kmV1' => null, 'kmV2' => null));
    }
} else {
    echo json_encode(array('kmV1' => null, 'kmV2' => null));
}

$mysqli->close();
?>
