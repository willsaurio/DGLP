
<?php


//var_dump($_GET);
include("vista/Database2.php");
$id= $_GET["id"];





/*
INSERT INTO `tareas` (`ID`, `Fecha`, `Departamento`, `Seccion`, `Ubicacion`, `Actividad`, `Cantidad_persona`, `Cantidad_equipo`) 
VALUES (NULL, NOW(), 'red vial', 'calles adoquinadas', 'rubenia', 'recarpeteo', '4', '2');
*/

$datos= "DELETE FROM `nomina` WHERE `idEmp` = '$id'";

$resultado= mysqli_query($conexion, $datos);

if ($resultado) {
	echo "<script>alert('Registro Eliminado');
	window.location='/DGLP/Personal/Nomina/nomina.php'</script>";
} else {
  echo "<script>alert('No Se Elimino Registro'); window.history.go(-1);</script>";
}
mysqli_close($conexion);

?>

<?php
require 'Complemento/header6.php'
?>