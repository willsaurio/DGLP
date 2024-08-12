<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Tiempo Extra</title>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>

<?php
session_start();
$correo = $_SESSION['username'];

if (!isset($correo)){
 header("location: /test/ALFA9.php");	
}else{	
echo "<h1>Bienvenido $correo</h1>";
}

?>

		<nav class="navbar navbar-default">
		<div class="container-fluid">
			
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-12 well">
	    <h1 class="text-primary">Direccion General de Infraestructura</h1>
		<h3 class="text-primary">Personal Confirmado para Tiempo Extraordinario</h3>
		<a href= "../../MenuPM.php">Regresar a Menu</a>
		<hr style="border-top:1px dotted #000;"/>
		<form class="form-inline" method="POST" action="">
			<label>Fecha Desde:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1"/>
			<label>Hasta</label>
			<input type="date" class="form-control" placeholder="End"  name="date2"/>
			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="index.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
		</form>
			<br></br>
		<form class="form-inline" method="POST" action="Report2.php">
        <label>Descargar Personal Activo</label><BR></BR>
		
		<input type="submit" value="Personal EXT" name="Tiempo_Extra">		
		</form>	

	
		
		<br /><br />
		<div class="table-responsive">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Estado</th>
						<th>Nombre y Apellido</th>
						<th>Inss</th>
						<th>Cedula</th>
						<th>Departamento</th>
						<th>Cargo</th>
						<th>Rubro</th>
                        
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>
	
	</div>
</body>
</html>