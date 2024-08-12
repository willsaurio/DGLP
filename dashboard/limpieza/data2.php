<?php

// Establecer conexión a la base de datos
$conexion = new mysqli("localhost", "root", "12345678", "los_cocos");

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

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
 
     // Iterar sobre los resultados y mostrar en una tabla
    while ($fila = $resultado->fetch_assoc()) {
        ?>

    <tr>
        <td class='table'><?php echo $fila['fecha']?></td>
        <td class='table'><?php echo $fila['turno'] . "-" . $fila['cantidad_turno']?></td>
        <td class='table'><?php echo $fila['distrito']?></td>
        <td class='table'><?php echo $fila['viajes']?></td>
        <td class='table'><?php echo number_format($fila['tonelada'], 2) ?></td>

        </tr>

       <?php
    }
    }
}
    ?>
    