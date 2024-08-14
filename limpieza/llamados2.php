<?php
// archivo: llamados.php

// Conexión a la base de datos
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

if (!$mysqli) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtiene el parámetro de consulta
$queryType = isset($_GET['query']) ? $_GET['query'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$options = [];

// Ejecuta la consulta correspondiente según el parámetro
switch ($queryType) {
    case 'distritos':
        $query = "SELECT `distrito` AS id, `distrito` AS text FROM `distrito` WHERE distrito LIKE '%$search%' ORDER BY `distrito` ASC";
        break;
    case 'rutas':
        $query = "SELECT `ruta` AS id, `ruta` AS text, kmV1, kmV2 FROM `rutas` WHERE ruta LIKE '%$search%'";
        break;
    case 'turnos':
        $query = "SELECT `turno` AS id, `turno` AS text FROM `turno` WHERE `turno` LIKE '%$search%'";
        break;
    case 'zonas':
        $query = "SELECT `zona` AS id, `zona` AS text FROM `zona` WHERE zona LIKE '%$search%'";
        break;
    case 'equipos':
       
        $query = "SELECT `equipo` AS id, `equipo` AS text, `descripcion` FROM `equipos` WHERE `descripcion` = 'RECOLECTORA' AND `equipo` LIKE '%$search%'";
        break;
    case 'nomina':
        $query = "SELECT `inss` AS id,  `inss` AS text, nombre_apellido FROM `nomina` WHERE `estado` = 'ACTIVO' AND `inss` LIKE '%$search%'";
        break;
    case 'centro_atencion':
        $query = "SELECT `id` AS id, `nombre` AS text FROM `centro_atencion`";
        break;
    case 'atencion_estado':
        $query = "SELECT `id` AS id, `estado` AS text FROM `atencion_estado`";
        break;
    case 'fiscal':
        $query = "SELECT `idEmp` AS id, `inss` AS text,  nombre_apellido FROM `nomina` WHERE `cargo` = 'FISCAL' AND `estado` = 'ACTIVO' AND inss LIKE '%$search%'";
        break;
    case 'jefe':
        $query = "SELECT `idEmp` AS id, `inss` AS text, nombre_apellido FROM `nomina` WHERE `cargo` = 'JEFE DE SECCION' AND `estado` = 'ACTIVO' AND inss LIKE '%$search%'";
        break;
    case 'roles':
        $query = "SELECT `id`, `rol` AS text FROM `roles`";
        break;
    default:
        $query = "";
        break;
}
if ($query) {
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $options[] = $row;
        }
        mysqli_free_result($result);
    }
}

mysqli_close($mysqli);

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($options);
?>
