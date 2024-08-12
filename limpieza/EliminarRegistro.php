
<?php


//var_dump($_POST);
include("Recepcion/Database2.php");
$ID= $_GET["id"];


/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

$datos= "DELETE FROM `limpieza` WHERE `idlimp` = '$ID'";

$resultado= mysqli_query($conexion, $datos);

if ($resultado) {
	echo "<script>alert('Registro Eliminado');
	window.location='/DGLP/limpieza/detalle_limpieza.php'</script>";
} else {
  echo "<script>alert('No Se Elimino Registro'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>

