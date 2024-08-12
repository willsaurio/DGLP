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
  
// Consulta SQL para obtener datos generales
$query = "SELECT fecha_entrada, ubicacion,  COUNT(ubicacion) AS personal FROM `asistencia` 
WHERE fecha_entrada BETWEEN '$date1' AND '$date2' GROUP BY ubicacion ORDER BY ubicacion ASC";

// Ejecutar la consulta
$resultado = $conexion->query($query);

echo "<label>Rango comprendido desde $date1 hasta $date2</label>";

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
 
    echo "<table class='table' border='1'>";
    echo "<tr><th class='info'>FECHA</th><th class='info'>UBICACIONES</th><th class='info'>PERSONAL</th></tr>";

    // Iterar sobre los resultados y mostrar en una tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
       // echo "<td class='td'>" . date('Y-m-d', strtotime($fila['fecha'])) . "</td>";
        echo "<td class='td'>" . $fila['fecha_entrada'] . "</td>";
        echo "<td class='td'>" . $fila['ubicacion'] . "</td>";
        echo "<td class='td'>" . $fila['personal'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    

    // Ahora, obtenemos datos específicos para los gráficos radiales

    // Consulta SQL para obtener la cantidad de Personal por distrito
    $queryPersonal = "SELECT ubicacion, count(ubicacion) as personal FROM `asistencia` WHERE fecha_entrada BETWEEN '$date1' AND '$date2' GROUP BY ubicacion";
    $resultadoPersonal = $conexion->query($queryPersonal);

       // Procesar los resultados de las consultas adicionales y generar los datos para los gráficos
    $datosPersonal = array();
  
 

    while ($filaPersonal = $resultadoPersonal->fetch_assoc()) {
        $datosPersonal['labels'][] = $filaPersonal['ubicacion'];
        $datosPersonal['data'][] = $filaPersonal['personal'];
    }
     
    // Aquí puedes usar $datosPersonal y $datosVoluntarios para generar los gráficos radiales en JavaScript

} else {
    echo "No hay datos para mostrar.";
}
}
// Cerrar la conexión
$conexion->close();
?>
