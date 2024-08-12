<?php
	$conexion=mysqli_connect("localhost", "root", "12345678", "test");
	
	if(!$conexion){
		die("Error: Failed to connect to database!");
	}
?>