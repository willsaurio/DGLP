<?php
require 'Database2.php';
require_once "../../../nusoap/cliente/lib/nusoap.php";

// Obtener el número de INSS del formulario POST
$id = $_GET['id'];

// Realizar la búsqueda en la tabla_inss para obtener la cédula asociada al INSS
$query = "SELECT cedula FROM nomina WHERE idEmp = '$id'";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $cedula = $fila['cedula'];
    
    // Crear el cliente SOAP
    $client = new nusoap_client("https://recaudash.managua.gob.ni/sibu/foto_server/serverFoto.php?wsdl", true);

    // Llamar al método "GetData" con la cédula obtenida
    $result = $client->call("crud.GetData", array("cedula" => $cedula));

    // Supongo que $tipo debería ser definido en alguna parte de tu código
    $tipo = 1;  // Asegúrate de reemplazar esto con el valor correcto

    // Obtener la URL de la foto desde la respuesta SOAP
    $foto = $result['foto'];  // Asegúrate de que este campo coincida con el campo real en la respuesta

    // Construir un array con la información obtenida
    $data = array(
        'result' => $result,
        'tipo' => $tipo,
        'foto' => $foto
    );

    // Convertir el array a formato JSON
    $json_data = json_encode($data);

    // Mostrar la cadena JSON
    echo $json_data;

}
// Cierra la conexión a la base de datos
$conexion->close();
?>
