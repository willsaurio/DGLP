<!doctype html>

<?php
require 'llamados.php'
?>



<html>
<head>
<title>Transferencia
</title>

<link rel="stylesheet" href="DGLP/select2/select2.min.css">
<script src="/DGLP/select2/select2.min.js"></script>
<script src="/DGLP/select2/jquery_s2.js"></script>
<script src="/DGLP/transferencia/query.js"></script>
<link rel="stylesheet" href="/DGLP/css/bootstrap.css">
<script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>
<script src="googleapisjs.js"></script>
  <script src="ajaxjs.js"></script>  
  <link rel="stylesheet" href="bootstrapcss.css" />
  <script src="bootstrapjs.js"></script>
  <script src="cloudflarejs.js"></script>
  <link rel="stylesheet" href="cloudflare.css" />

  
  <style>

* {
	margin: 1px;

	border: 0; 
}

body {
  font-family: Arial;
  font-size: 15px;
  background-image: url("Diseño/veri.png");

min-height: 350px;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;

}

.form-style {
  background-color: #f9f9f9; /* Fondo típico de un formulario */
  border: 1px solid #ccc;    /* Borde gris claro */
  padding: 20px;             /* Espacio interno */
  border-radius: 5px;        /* Bordes redondeados */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para darle profundidad */
  max-width: 100%;          /* Ancho máximo */
  margin: 20px auto;         /* Centrado en la página */
}

</style>

</head>


<body>

<div class="main">
<table table-layout=fixed; width="100%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">	
<?php
require '../menu/menunav.php'; 
?>
</table>
</div>

<?php
date_default_timezone_set('America/Managua');
$registro=date("Y-m-d H:i:s"); 
$fecha = date("Y-m-d");
?>


<div class="main col-md-10">

<Form action= "insertar_trans.php" method="POST" enctype="multipart/form-data">
<div class="form-style">
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="">Fecha</label>
<br>
<input type="datetime" class="form-control" name="fecha" value="<?=$fecha?>" readonly/>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="">Turno</label>
<br>
<Select class="form-control" name="turno" required>
<option value="">TURNO:</option>
<?php
while ($datos= mysqli_fetch_array($query3))
{
?>
<option value="<?php echo $datos['turno']?>"> <?php echo $datos['turno']?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="">Ruta</label>
<br>
<select id="centro" class="form-control" name="centro">
<option value="">Centro de Atencion:</option>
<?php
while ($datos= mysqli_fetch_array($query7))
{
?>
<option value="<?php echo $datos['centro']?>"> <?php echo $datos['centro']?></option>
<?php
}
?>
  </select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="">Equipo</label>
<br>
<select id="equipos" name="equipos" class="form-control" onchange="mostrarDescripcion()">
        <option value="">Selecciona un equipo:</option>
        <?php
        while ($row = mysqli_fetch_assoc($query5)) {
            echo "<option value=\"{$row['equipo']}\">{$row['equipo']}</option>";
        }
        ?>
    </select>
    </div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <br>
    <input type="text" class="form-control" id="descripcion" name="descripcion" readonly>
    </div>
</div>
<div class="col-md-5">
<div class="form-group">
<label for="">Nombres y Apellidos</label>
<br>
<select id="frame" name="nombres" class="" onchange="mostrarDetalles()">
        <option value="">Seleccione Trabajador:</option>
        <?php
        while ($row = mysqli_fetch_assoc($query6)) {
            echo "<option value=\"{$row['nombre_apellido']}\">{$row['nombre_apellido']}</option>";
        }
        ?>
    </select>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="INSS">INSS:</label>
    <br>
    <input type="number" class="form-control" id="inss" name="inss" readonly>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="Cargo">Cargo:</label>
    <br>
    <input type="text" class="form-control" id="cargo" name="cargo" readonly>
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
    <button type="submit" class="btn btn-info" style="width:200px; height:40px;">Registrar</button>
    <input type="hidden" name="usuario" value="<?=$usuario?>">
<input type="hidden" name="registro" value="<?=$registro?>">
</div>
</div>
</div>
</div>
</Form>

</div>

<script>
function mostrarDescripcion() {
    var equipoSeleccionado = document.getElementById("equipos").value;

    // Realizar una petición AJAX para obtener la descripción del equipo
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("descripcion").value = xhr.responseText;
        }
    };

    xhr.open("GET", "descripcion.php?equipo=" + equipoSeleccionado, true);
    xhr.send();
}
</script>

<script>
function mostrarDetalles() {
    var empleadoSeleccionado = document.getElementById("frame").value;

    // Realizar una petición AJAX para obtener detalles del empleado
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var detalles = JSON.parse(xhr.responseText);
            document.getElementById("inss").value = detalles.inss;
            document.getElementById("cargo").value = detalles.cargo;
        }
    };

    xhr.open("GET", "info_trabajador.php?nombre_apellido=" + empleadoSeleccionado, true);
    xhr.send();
}
</script>


<script>
$(document).ready(function(){
 $('#frame').multiselect({
  nonSelectedText: 'nombres',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'350px',
  maxHeight: 200,
 });
 
 $('#framework_form').on( function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"",
   method:"",
   data:form_data,
   success:function(data)
   {
    $('#frame option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#frame').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>

<script>
$(document).ready(function(){
 $('#centro').multiselect({
  nonSelectedText: 'centro',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'350px',
  maxHeight: 200,
 });
 
 $('#framework_form').on( function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"",
   method:"",
   data:form_data,
   success:function(data)
   {
    $('#centro option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#centro').multiselect('refresh');
    alert(data);
   }
  });
 });
 
});
</script>

<script>
$(document).ready(function(){
 $('#equipos').multiselect({
  nonSelectedText: 'equipos',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'330px',
  maxHeight: 200,
 });
 
 $('#framework_form').on( function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"",
   method:"",
   data:form_data,
   success:function(data)
   {
    $('#equipos option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#equipos').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>

</body>
</html>

