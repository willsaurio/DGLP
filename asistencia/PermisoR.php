<html>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "test");

$query2=mysqli_query($mysqli, "SELECT `id`, `nombre_apellido` FROM `jefes_departamentos`");

?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "test");

$query3=mysqli_query($mysqli, "SELECT `id`, `justificacion` FROM `justificaciones`");

?>

<head>
<title>Retorno de Permiso</title>
<link rel="stylesheet" href="/infra/Personal/Filtrar/css/bootstrap.css">

 <style> 

* {
	margin: auto;

	border: 0; 
}

body {
  font-family: Arial;
  
  background-image: url("Diseño/register.png");

height: 90vh;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;

}

form {
background-color: #ffffff;
box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;

}


input[type=submit] {
	color: #fff;
	/*display: block;*/
	background: #fd1c11;
	width: 300px;
  margin: 10px;
	height: 40px;
  font-size:18px;
  font-weight:bold;
	border-radius: 3px;
	cursor: pointer;
}

input[type=submit]:hover {
	background-color:#752025;
}

.column {
  padding-right: 600px;
}

.line {
padding-left: 10px;	
}
</style>


</head>
<body>

<?php
require '../Personal/MenuSeguridad.php';
?>


<?php
date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 
?>

<?php
date_default_timezone_set('America/Managua');
$Fecha=date("Y-m-d"); 
?>
<br></br>
<div class="main" style="width:30%;">

<script>
 function validarFormulario() {
      var INSS = document.getElementById('INSS').value;
      if (INSS.length === 0) {
        alert('Numero INSS Invalido!');
        return false; // Evita el envío del formulario si la validación falla
      }
      // Si la validación es exitosa, el botón se desactiva y se envía el formulario.
      document.getElementById('formulario').submit();
      document.querySelector('input[type="submit"]').disabled = true;
      return true;
    }
</script>

<?php
session_start();
$correo = $_SESSION['username'];
if ($correo == 'semaforo'){
$mysqli=mysqli_connect("localhost", "root", "12345678", "test");
$consulta= ("SELECT almuerzo_pemiso.id, almuerzo_pemiso.fecha, almuerzo_pemiso.inss, almuerzo_pemiso.nombres, almuerzo_pemiso.cedula, almuerzo_pemiso.cargo, 
almuerzo_pemiso.departamento, almuerzo_pemiso.justificacion, almuerzo_pemiso.autorizacion, almuerzo_pemiso.salida, almuerzo_pemiso.entrada, personal.pic FROM `almuerzo_pemiso` 
INNER JOIN personal ON almuerzo_pemiso.inss=personal.INSS 
WHERE almuerzo_pemiso.departamento = 'Semaforica' AND almuerzo_pemiso.inss = '$_POST[inss]' AND almuerzo_pemiso.entrada='00:00:00' AND	almuerzo_pemiso.fecha=CURDATE()");
$query=mysqli_query($mysqli, $consulta);
$row=mysqli_num_rows($query);
		if($row>0){
		$fetch=mysqli_fetch_array($query);
		}
  } else{

    $mysqli=mysqli_connect("localhost", "root", "12345678", "test");
$consulta= ("SELECT almuerzo_pemiso.id, almuerzo_pemiso.fecha, almuerzo_pemiso.inss, almuerzo_pemiso.nombres, almuerzo_pemiso.cedula, almuerzo_pemiso.cargo, 
almuerzo_pemiso.departamento, almuerzo_pemiso.justificacion, almuerzo_pemiso.autorizacion, almuerzo_pemiso.salida, almuerzo_pemiso.entrada, personal.pic FROM `almuerzo_pemiso` 
INNER JOIN personal ON almuerzo_pemiso.inss=personal.INSS 
WHERE almuerzo_pemiso.inss = '$_POST[inss]' AND almuerzo_pemiso.entrada='00:00:00' AND	almuerzo_pemiso.fecha=CURDATE()");
$query=mysqli_query($mysqli, $consulta);
$row=mysqli_num_rows($query);
		if($row>0){
		$fetch=mysqli_fetch_array($query);
		}

  }
echo "<form action='PermisoR.php' class='line' method='post' autocomplete='off'>
<br>
<b><label>Ingrese INSS</label></b>
<br>
<input type='number' class='form-control' style='width:300px; margin:10px;' name='inss'  autofocus='on'>

</form>";

?>
</div>
<br>
<div class="main reponsive form-inline" >

<form action="retornoP.php" method="post" id="formulario" class="line" enctype="" >
<p style="text-align: center; font-size: 30px;"><b>Regreso de Permiso</b></p>
  <br>
  <h2><b>Datos del Trabajador</b></h2>
  
<div class="input-group col-md-1 inline" style="border-radius: 4px; border: 3px solid red; text-align:center;">
<img height="240px" src="data:image/jpg;base64,<?php echo base64_encode($fetch['pic']);?>"/> 
</div>
<div class="col-md-8 inline">
  <div class="input-group col-md-2">
<b><label for="">Entrada:</label></b>
<br>
<input type="datetime" class="form-control" name="entrada" value="<?=$Hora?>" readonly>
<input type="hidden" name="id" value="<?=$fetch[id]?>" readonly required>
</div>
<div class="input-group col-md-2">
  <label for="">Salida</label>
<input type="text" class="form-control" name="salida" value="<?=$fetch[salida]?>" readonly>
</div>
<div class="input-group col-md-2">
<b><label name="ingreso">Fecha:</label></b>
<br>
<input type="text" name="fecha" class="form-control" value="<?=$fetch[fecha]?>" readonly required>

</div>
<div class="input-group col-md-2">
<b><label for="">INSS:</label></b>
<br> 
<input type="int" name="inss" class="form-control" id="INSS" value="<?=$fetch[inss]?>" readonly>
</div>
<div class="input-group col-md-5">
<b><label name="nombre">Nombre y Apellido:</label></b>
<br>
<input type="text" name="nombre_apellido" class="form-control" value="<?=$fetch[nombres]?>" readonly required>
</div>
<div class="input-group col-md-2">
<b><label for="">Cedula:</label></b> 
<input type="text" class="form-control" name="cedula" value="<?=$fetch[cedula]?>" readonly>
</div>
<div class="input-group col-md-4">
<b><label name="cargo">Cargo:</label></b>
<input type="text" class="form-control" name="cargo" value="<?=$fetch[cargo]?>" readonly>
</div>
<div class="input-group col-md-3">
<b><label for="">Departamento:</label></b>
<input type="text" class="form-control" name="departamento" value="<?=$fetch[departamento]?>" readonly>
</div>
<div class="input-group col-md-4">
<b><label name="justificacion">Justificacion:</label></b>
<input type="text" class="form-control" name="justificacion" value="<?=$fetch[justificacion]?>" readonly required>
</div>
<div class="input-group col-md-4">
<b><label for="">Autoriza:</label></b>
<input type="text" class="form-control" name="autorizacion" value="<?=$fetch[autorizacion]?>" readonly required>
 </div>

 </div>
 <input type="hidden" name="usuario" value="<?=$correo?>"></input>

<br></br>
<center><input type="submit" onclick="validarFormulario(event); this.disabled = true;" value="Registrar"></center>
<br></br>
</form>
</div>
<br>
</body>
</html>

