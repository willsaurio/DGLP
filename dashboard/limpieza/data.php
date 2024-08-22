<?php

// Establecer conexión a la base de datos
$conexion = new mysqli("localhost", "root", "123456789", "los_cocos");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario cuando se envíe

    // Obtener las fechas del formulario
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $turno = $_POST['turno'];

// Consulta SQL para obtener datos generales
$query = "SELECT fecha, turno, distrito, COUNT(turno) AS cantidad_turno, SUM(cantidad_viajes) AS viajes, SUM(toneladas) as tonelada FROM `limpieza` WHERE fecha BETWEEN '$date1' AND '$date2'
 AND turno LIKE '%$turno%' GROUP BY distrito ORDER BY distrito ASC";

// Ejecutar la consulta
$resultado = $conexion->query($query);

echo "<label>Rango comprendido desde $date1 hasta $date2</label>";

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
 
    echo "<table class='table' border='1'>";
    echo "<tr><th class='info hidden'>FECHA</th><th class='info'>TURNO</th><th class='info'>DISTRITO</th><th class='info'>VIAJES</th><th class='info'>TONELADAS</th></tr>";

    // Iterar sobre los resultados y mostrar en una tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
       // echo "<td class='td'>" . date('Y-m-d', strtotime($fila['fecha'])) . "</td>";
       echo "<td class='td'>" . $fila['turno'] . "-" . $fila['cantidad_turno'] . "</td>";
        echo "<td class='td'>" . $fila['distrito'] . "</td>";
        echo "<td class='td'>" . $fila['viajes'] . "</td>";
        echo "<td class='td'>" . number_format($fila['tonelada'],2 ). "</td>";
        echo "</tr>";
    }

    echo "</table>";
    

    // Ahora, obtenemos datos específicos para los gráficos radiales

    // Consulta SQL para obtener la cantidad de viajes por distrito
    $queryViajes = "SELECT distrito, SUM(cantidad_viajes) as cantidad_viajes FROM `limpieza` WHERE fecha BETWEEN '$date1' AND '$date2' AND turno LIKE '%$turno%' 
    GROUP BY distrito ORDER BY distrito";
    $resultadoViajes = $conexion->query($queryViajes);

    // Consulta SQL para obtener las toneladas por distrito
    $queryToneladas = "SELECT distrito, SUM(toneladas) as toneladas FROM `limpieza` WHERE fecha BETWEEN '$date1' AND '$date2' AND turno LIKE '%$turno%'
     GROUP BY distrito ORDER BY distrito";
    $resultadoToneladas = $conexion->query($queryToneladas);

    $queryTurnos = "SELECT distrito, COUNT(turno) as turnos FROM `limpieza` WHERE fecha BETWEEN '$date1' AND '$date2' AND turno LIKE '%$turno%' 
    GROUP BY distrito ORDER BY distrito";
    $resultadoTurnos = $conexion->query($queryTurnos);

    // Procesar los resultados de las consultas adicionales y generar los datos para los gráficos
    $datosViajes = array();
    $datosToneladas = array();
    $datosTurnos = array();

    while ($filaViajes = $resultadoViajes->fetch_assoc()) {
        $datosViajes['labels'][] = $filaViajes['distrito'];
        $datosViajes['data'][] = $filaViajes['cantidad_viajes'];
    }

    while ($filaToneladas = $resultadoToneladas->fetch_assoc()) {
        $datosToneladas['labels'][] = $filaToneladas['distrito'];
        $datosToneladas['data'][] = $filaToneladas['toneladas'];
    }

    while ($filaTurnos = $resultadoTurnos->fetch_assoc()) {
        $datosTurnos['labels'][] = $filaTurnos['distrito'];
        $datosTurnos['data'][] = $filaTurnos['turnos'];
    }

    // Aquí puedes usar $datosViajes y $datosToneladas para generar los gráficos radiales en JavaScript

} else {
    echo "No hay datos para mostrar.";
}
}
// Cerrar la conexión
$conexion->close();
?>
