<?php
//var_dump($_POST);
include("conexion.php");
$ID = $_POST["idEmp"];
$nomina =$_POST["nomina"];
$inss = $_POST["inss"];
$Nombres_Apellidos = $_POST["nombre_apellido"];
$cargo = $_POST["cargo"];
$ubicacion = $_POST["ubicacion"];
$jornada = $_POST["jornada_laboral"];
$fecha_ingreso = $_POST["fecha_ingreso"];
$cedula = $_POST["cedula"];
$registro = $_POST["registro"];
$estado = $_POST["estado"];


$verificar= "SELECT * FROM nomina WHERE inss='$inss'";
$resultado = mysqli_query($conexion, $verificar);
$filas = mysqli_num_rows($resultado);
if($filas>0){

    echo"<script>alert('$nombre YA EXISTE EN ENTRADA DE HOY!'); window.location='registro_';</script>";

}else{

$datos= "INSERT INTO `nomina`(`idEmp`,`nomina`,`inss`,`nombre_apellido`,`cargo`,`ubicacion`,`jornada_laboral`,`fecha_ingreso`,`cedula`,`registro`,`estado`) VALUES
(NULL,'$ID',`$nomina`,`$inss`,`$nombre_apellido`,`$cargo`,`$ubicacion`,``````````````````)

}
mysqli_close($conexion);
?>