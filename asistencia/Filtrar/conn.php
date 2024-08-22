<?php
	$conexion=mysqli_connect("localhost", "root", "123456789", "test");
	
	if(!$conexion){
		die("Error: Failed to connect to database!");
	}
?>