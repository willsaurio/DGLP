
<?php



include("conn.php");






/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

$datos= "DELETE FROM `personal_autorizado`";

$resultado= mysqli_query($conexion, $datos);

if ($resultado) {
	echo "<script>alert('Registro Eliminado');
	window.location='/test/excel/Filtrar/index.php'</script>";
} else {
  echo "<script>alert('No Se Elimino Registro'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>

<?php
require 'Complemento/header6.php'
?>