<!DOCTYPE html>
<html>

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
		

	<title> Reporte Trabajadores
</title>
	
<body>

<div class="main">
<table table-layout=fixed; width="100%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">	
<?php
require '../../menu/menunav.php'; 
?>
</table>
</div>
<div class="main2" style="background:whitesmoke;">
	<div class="col-md-3"></div>
	<div class="col-md-12 well">
		<div style="margin-left: 3%">
		<b><p style="font-size: 35px;" class="text-primary">HORA DE ENTRADA CUMPLIDA</p></b>
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
		
		<div class="container">
			<div class="table-responsive">	
				
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr class="info">
						
						<th>Ubicacion</th>
						<th>Personal Registrado</th>
											
					</tr>
				</thead>
				<tbody>
					<?php include 'rangeTdepa.php';?>	
				</tbody>
			</table>
		</div>
</div>

		<div class="container">
			<div class="table-responsive">	
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr class="info">
						
						<th>Entradas Registradas</th>
						<th>Salidas Registradas</th>
											
					</tr>
				</thead>
				<tbody>
					<?php 
							
					include 'rangeTpersonal.php';
				
					?>	
					
				</tbody>
			</table>
		</div>
</div>

		<fieldset>
        
		<div class="panel panel-default" style="margin: 5px;">
          <div class="panel-heading"  style="width:40%; float:left;">
		  <b><label style="font-size:17px;">Rango de Busqueda</label></b>
		<form class="form-inline" method="POST" action="">
			<label>Desde:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1"/>
			<label>Hasta</label>
			<input type="date" class="form-control" placeholder="End"  name="date2"/>
			<button class="btn btn-info" style="width: 60px; height: 40px; margin-left:5px;" name="search">
		    <i class="fa-solid fa-magnifying-glass"></i>
		    </button> 
			<a href="asistencia.php" type="button" style="width: 60px; height: 40px; margin-left:5px;" class="btn btn-success">
			<i class="fa-solid fa-repeat"></i></a>
        </form>
</div>



<div class="panel-heading inline"  style="width:52%; float:right;">
<label style="font-size:17px; font-weight:bold;">Rango de fecha a Exportar</label>
<form method="post" class="form-inline" action="/DGLP/reportes/AsistenciaDGLP.php">
			
        <label>De:</label>
		<input type="date"  class="form-control" placeholder="Start"  name="date1" required/>
		<label>A:</label>
		<input type="date"  class="form-control" placeholder="End"  name="date2" required/>
		<select id="" class="form-control" name="tipo_reporte" required>
				<option value="">Seleccione Reporte</option>
				<option value="DGLP">DGLP</option>
				<option value="VOLUNTARIO">VOLUNTARIO</option>
			</select>
	
		 <label>Tipo</label>
			  <select name="file_type" class="form-control input-sm">
				<option value="Xlsx">Xlsx</option>
				<option value="Xls">Xls</option>
				<option value="Csv">Csv</option>
			  </select>
		  
			  <button type="submit" title="Descargar" name="export" class="btn btn-primary btn-sm" style="width:60px; margin-left:3px; height: 32.5px; font-weight:bold;" value="Descargar">
			  <i style="font-size: 17px;" class="fa-solid fa-download"></i></span></button>
		  
		</form>
</div>

</fieldset>


		<div class="table-container" style=" overflow: scroll; max-height: 600px;">	
			<table class="table table-bordered">
				<thead class="alert-info" >
					<tr class="info">
						<th>#</th>
						<th>Fecha Ingreso</th>
						<th>Entrada</th>
						<th>Salida</th>
						<th>Fecha Salida</th>
						<th>INSS</th>
						<th>Nombre y Apellido</th>
						<th>Cedula</th>
						<th>Cargo</th>
						<th>Ubicacion</th>
             			<th>Observacion</th>
						<th>Usuario</th>
					   <th>Corregir</th>
						<th>Eliminar</th>
					
										
					</tr>
				</thead>
				<tbody>
					<?php include'range7.php'?>	
				</tbody>
			</table>
			</div>
		</div>
	
	  <!-- Modal de Retorno -->
      <?php include 'Modal/Asistencia.php'; ?>
				
	  </body>
</html>