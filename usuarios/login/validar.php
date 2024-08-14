<?php

$usuario= $_POST['usuario'];
$rol= $_POST['rol'];
$contraseña= md5($_POST['contraseña']);
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","12345678","los_cocos");

$consulta="SELECT * FROM `usuarios` WHERE usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['rol']==1){ //administrador
    header("location:/DGLP/menu/Menu.php");

}else

if($filas['rol']==2){ //asistencia
    header("location:/DGLP/menu/Menu.php");

}else
	
if($filas['rol']==3){ //digitador
    header("location:/DGLP/menu/Menu.php");

}else
{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
