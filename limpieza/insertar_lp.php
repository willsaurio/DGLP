<?php
//var_dump($_POST);
include("../asistencia/conexion.php");
$ID= $_POST["id"];
$fecha = $_POST["fecha"];
$turno = $_POST["turno"];
$distrito = $_POST["distrito"];
$ruta = $_POST["ruta"];
$zona =$_POST["zona"];
$equipo = $_POST["equipos"];
$descripcion = $_POST["descripcion"];
$conductor = $_POST["conductor"];
$inss = $_POST["inss"];
$op1 = $_POST["operario1"];
$inss1 = $_POST["inss1"];
$op2 = $_POST["operario2"];
$inss2 = $_POST["inss2"];
$op3 = $_POST["operario3"];
$inss3 = $_POST["inss3"];
$viaje1 = $_POST["viaje1"];
$viaje2 = $_POST["viaje2"];
$viaje3 = $_POST["viaje3"];
$viaje_apoyo = $_POST["viaje_apoyo"];
$cantidad_vijaes = $_POST["cantidad_viajes"];
$total_kg = $_POST["total_kg"];
$toneladas = $_POST["toneladas"];
$atencion = $_POST["atencion"];
$estado = $_POST["estado"];
$salida = $_POST["salida"];
$retorno = $_POST["entrada"];
$horas_trabajadas = $_POST["horas_trabajadas"];
$km_recorridos = $_POST["km_recorridos"];
$combustible = $_POST["combustible"];
$destino = $_POST["destino"];
$observacion = strtoupper($_POST["observacion"]);
$registro = $_POST["registro"];
$fiscal = $_POST["fiscal"];
$jefe_seccion = $_POST["jefe_seccion"];
$usuario = $_POST["usuario"];

/*$verificar= "SELECT * FROM transferencia WHERE centro='$centro' and equipo='$equipo' and fecha = CURDATE()"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas==0){*/

$datos= "INSERT INTO `limpieza`(`idlimp`, `fecha`, `turno`, `distrito`, `ruta`, `zona`, `equipo`, `descripcion`, `conductor`, `inss`, `operario1`, `inss1`, `operario2`, `inss2`, `operario3`, `inss3`,
 `viaje1`, `viaje2`, `viaje3`, `viaje_apoyo`, `cantidad_viajes`, `total_kg`, `toneladas`, `atencion`, `estado`, `salida`, `retorno`, `horas_trabajadas`, `km_recorridos`, `destino`, 
 `observacion`, `registro`, `fiscal`, `jefe_seccion`, `usuario`) VALUES 
 (NULL,'$fecha', '$turno', '$distrito', '$ruta', '$zona', '$equipo', '$descripcion', '$conductor', '$inss', '$op1', '$inss1', '$op2', '$inss2', '$op3', '$inss3', '$viaje1', '$viaje2', '$viaje3', '$viaje_apoyo',
  '$cantidad_vijaes', '$total_kg', '$toneladas', '$atencion', '$estado', '$salida', '$retorno', '$horas_trabajadas', '$km_recorridos', '$destino', '$observacion', '$registro', '$fiscal', '$jefe_seccion', '$usuario')";  

$resultado= $conexion->query($datos);
if ($resultado) {
   
	echo "<script>alert('Registro de $ruta Realizado!');
	window.location='limpieza.php'</script>";
} else {
  echo "<script>alert('Hubo un Error!!!'); window.location='limpieza.php'</script>";
}
mysqli_close($conexion);

?>

