<?php
// updateEquipos.php

// Suponiendo que ya tienes una conexión a la base de datos
require '../personal/conn.php';
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datosActualizados = json_decode($_POST['updatedData'], true);

    foreach ($datosActualizados as $data) {
        $idEquip = $data['idEquip'];
        $estado = mysqli_real_escape_string($conexion, $data['estado']);
        $observacion = mysqli_real_escape_string($conexion, $data['observacion']);

        $updateQuery = "UPDATE equipos SET estado = '$estado', observacion = '$observacion' WHERE idEquip = '$idEquip'";
        $result = mysqli_query($conexion, $updateQuery);

        if ($result) {
            $response['success'] = true;
            $response['message'] = 'Actualización exitosa';
        } else {
            $response['success'] = false;
            $response['message'] = 'Error en la actualización: ' . mysqli_error($conexion);
        }
    }
} else {
    $response['success'] = false;
    $response['message'] = 'Error en la solicitud';
}

header('Content-Type: application/json');
echo json_encode($response);
?>

