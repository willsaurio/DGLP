<!DOCTYPE html>
<html>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query2=mysqli_query($mysqli, "SELECT `idEmp`, `inss` FROM `nomina`");

?>

	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="/DGLP/css/bootstrap.css">
		<script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>

	</head>
	
	<style>

table tr:hover {
  background-color: #B2DFDB;
  cursor: pointer;
}

 .table-container thead {
    position: sticky;
    top: 0;
    /* Cambia esto al color de fondo deseado */
    z-index: 1;
}

</style>
		

	<title> Detalle Limpieza Publica
</title>
	
<body>

<div class="main">
<table table-layout=fixed; width="100%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">	
<?php
require '../menu/menunav.php'; 
?>
</table>
</div>

<div class="main2" style="background:whitesmoke;">
	<div class="col-md-3"></div>
	<div class="col-md-12 well">
		<div style="margin-left: 3%">
		<b><p style="font-size: 35px;" class="text-primary">DETALLE DE LIMPIEZA DOMICILIAR DGLP <i class="fa-solid fa-trash-can"></i></p></b>
		</div>
		<hr style="border-top:1px dotted #000;"/>
	
		<body>
    	<div class="container">	
		<div class="col-md-10">
    		 		
           
          </div>
          <div class="panel-body">
        		<div class="table-responsive">
        	
        		</div>
          </div>

</div>


		<fieldset>
        
		<div class="panel panel-default" style="margin: 5px;">
          <div class="panel-heading"  style="width:40%; float:left;">
		  <b><label style="font-size:17px;">Busqueda</label></b>
		<form class="form-inline" method="POST" action="">
		    <label for="buscar">Desde</label>
			<input  class="form-control hidden" placeholder="Ingresar INSS"  name="buscar">
             <input type="date" class="form-control" name="date1">
			 <label for="">A</label>
			 <input type="date" class="form-control" name="date2">
			<button class="btn btn-info" style="width: 50px; height: 35px; margin-left:5px;" name="search">
			<i class="fa-solid fa-magnifying-glass fa-beat-fade"></i>
		    </button> 
			<a href="detalle_limpieza.php" type="button" style="width: 50px; height: 35px; margin-left:5px;" class="btn btn-success">
			<i class="fa-solid fa-repeat fa-beat"></i></a>
        </form>
</div>

<div class="panel-heading inline"  style="width 40%; float:right;">
<label style="font-size:17px; font-weight:bold;">Descargar Planilla</label>
<form method="post" class="form-inline" action="/DGLP/reportes/limpieza_reporte.php">
	<label for="">De:</label>
	<input type="date" class="form-control" name="date1">
	<label for="">A:</label>
	<input type="date" class="form-control" name="date2">
		 <label>Tipo</label>
			  <select name="file_type" class="form-control input-sm">
				<option value="Xlsx">Xlsx</option>
				<option value="Xls">Xls</option>
				<option value="Csv">Csv</option>
			  </select>
		  
			  <button type="submit" title="Descargar" name="export" class="btn btn-primary btn-sm" style="width:150px; height: 40px; margin-left:3px; height: 32.5px; font-weight:bold;" value="Descargar">
			  <i style="font-size: 20px;" class="fa-solid fa-download"></i></span></button>
		  
		</form>
</div>

</fieldset>

		<div class="table-container" style=" overflow: scroll; max-height: 600px;">	
			<table class="table table-bordered">
				<thead class="alert-info" >
					<tr class="info">
						<th>#</th>
						<th>Fecha</th>
						<th>Turno</th>
						<th>Ruta</th>
						<th>equipo</th>
						<th>Descripcion</th>
						<th>Nombre y Apellido</th>
						<th>INSS</th>
						<th>Distrito</th>
						<th>Salida</th>
						<th>Retorno</th>
						<th>Viaje1</th>
						<th>Viaje2</th>
						<th>Viaje3</th>
						<th>Apoyo</th>
						<th>Total Viajes</th>
						<th>Km Recorridos</th>
						<th>Registro</th>
						<th>usuario</th>
						<th>Resumen</th>
						<th>Eliminar</th>
					
					</tr>
				</thead>
				<tbody>
					<?php include'range_limpieza.php'?>	
				</tbody>
			</table>
			</div>
		</div>
		</div>
	  <!-- Modal de Retorno -->
      <?php include 'Recepcion/Modal.php'; ?>
		
	  </body>
</html>