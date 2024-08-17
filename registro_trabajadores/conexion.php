<?php

$conexion = mysqli_connect("localhost","root","12345678","los_cocos");

mysqli_set_charset($conexion,"utf8");

if (!$conexion) {
 echo "error al conectar a Database2";
} 

?>