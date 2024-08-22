<?php
	$conexion=mysqli_connect("localhost", "root", "123456789", "los_cocos");
	
	if(!$conexion){
		die("Error: Failed to connect to database!");
	}
?>