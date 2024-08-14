<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

if (!$mysqli) {
    die("Error en la conexión: " . mysqli_connect_error());
}

if (isset($_POST['ruta'])) {
    $idRuta = $_POST['ruta'];

    // Utilizar una consulta preparada para evitar problemas de seguridad
    $query = "SELECT kmV1, kmV2 FROM rutas WHERE ruta = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $idRuta);
        $stmt->execute();
        $stmt->bind_result($kmV1, $kmV2);

        if ($stmt->fetch()) {
            // Obtener la cantidad de viajes desde la solicitud POST
            $cantidadViajes = isset($_POST['cantidad_viajes']) ? intval($_POST['cantidad_viajes']) : 0;

            // Comparar con la cantidad de viajes y devolver el resultado como JSON
            $resultado = array('kmV1' => $kmV1, 'kmV2' => $kmV2);
            echo json_encode($resultado);
        } else {
            echo json_encode(array('kmV1' => null, 'kmV2' => null));
        }

        $stmt->close();
    } else {
        echo json_encode(array('kmV1' => null, 'kmV2' => null, 'error' => 'Error en la preparación de la consulta.'));
    }
} else {
    echo json_encode(array('kmV1' => null, 'kmV2' => null, 'error' => 'Parámetro de ruta no proporcionado.'));
}

$mysqli->close();
?>
