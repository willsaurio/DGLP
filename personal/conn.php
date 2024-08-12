<?php
	$conexion=mysqli_connect("localhost", "root", "12345678", "los_cocos");
	
	if(!$conexion){
		die("Error: Failed to connect to database!");
	}
?>