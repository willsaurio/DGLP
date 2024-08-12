
<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query2 = mysqli_query($mysqli, "SELECT `idruta`, `ruta` FROM `rutas`");

$options = array();

while ($row = mysqli_fetch_assoc($query2)) {
    // Añadir cada fila como una opción al array
    $options[] = array(
        'idruta' => $row['idruta'],
        'ruta' => $row['ruta']
    );
}

// Convertir el array a formato JSON
$jsonOptions = json_encode($options);

// Imprimir el JSON
echo $jsonOptions;
?>