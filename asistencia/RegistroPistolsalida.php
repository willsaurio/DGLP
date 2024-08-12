<?php
include("conexion.php");
//var_dump($_POST);
// Verifica si los datos POST están presentes
if(isset($_POST["id"], $_POST["fecha_salida"], $_POST["salida"], $_POST["INSS"], $_POST["observacion"])) {
    
    // Recoge los valores de los datos POST
    $ID = $_POST["id"];
    $Fecha = $_POST["fecha_salida"];
    $Hora = $_POST["salida"];
    $INSS = $_POST["INSS"];
    $observacion = $_POST["observacion"];

    // Obtiene la fecha y hora actual
    date_default_timezone_set('America/Managua');
    $Hora = date("H:i:s");
    $Fecha = date("y-m-d");

    // Prepara la consulta SQL para actualizar la tabla 'asistencia'
    $datos = "UPDATE `asistencia` SET `inss`='$INSS', `salida`='$Hora', `fecha_salida`='$Fecha', `observacion`='$observacion' WHERE id = '$ID'";

    // Ejecuta la consulta
    $resultado = mysqli_query($conexion, $datos);

    // Verifica si la consulta fue exitosa
    if ($resultado) {
        echo "<script>alert('Salida de $INSS Registrada'); window.location='salida.php'</script>";
    } else {
        echo "<script>alert('No Se Guardo Salida'); window.location='salida.php';</script>";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "<script>alert('Error en los datos POST'); window.location='salida.php';</script>";
}
?>
