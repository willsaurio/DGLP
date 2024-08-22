<?php

$conexion = mysqli_connect("localhost","root","123456789","combustible");

mysqli_set_charset($conexion,"utf8");

if (!$conexion) {
 echo "error al conectar a Database2";
} 

?>