<?php
//var_dump($_POST);
include("conexion.php");
$ID= $POST["iduser"];
$nombre = $_POST["nombre"];
$inss = $_POST["inss"];
$contrasena = $_POST["contraseña"];
$confirmar = $_POST["confirmar"];
$rol = $_POST["roles"];

$verificar= "SELECT * FROM usuarios WHERE inss='$inss'"; 
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado); 
if($filas>0){

  echo "<script>alert('$nombre YA EXISTE EN ENTRADA DE HOY!'); window.location='registro_usuario.php';</script>";

}
else {

$datos= "INSERT INTO `usuarios`(`iduser`, `usuario`, `contraseña`, `verificacion`, `inss`, `rol`) VALUES 
 (NULL,'$nombre', MD5('$contrasena'), '$confirmar', '$inss', '$rol')";  

$resultado= mysqli_query($conexion, $datos);
  
	echo "<script>alert('Usuario $nombre Registrado!');
	window.location='registro_usuario.php'</script>";
}
mysqli_close($conexion);

?>

