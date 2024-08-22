<?php
try{
	$ID=$_POST['ID'];
	$conexion= new PDO('mysql:host=localhost;dbname='.'test','root','123456789');
	$SQL="SELECT `ID`, `INSS`, `Nombres_Apellidos` FROM `personal` WHERE `ID`='$ID'";
	$stmt = $conexion->prepare($SQL);
	$stmt->execute();
	$row=$stmt->fetchAll(\PDO::FETCH_OBJ);
	printf(json_encode($rows));
}catch (PDOExeption $e){
	echo "Error de conexion! ".$e;
	exit;
}
?>