<!DOCTYPE html>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query8=mysqli_query($mysqli, "SELECT cedula FROM `asistencia` WHERE fecha_entrada = CURDATE() ORDER BY nombre_apellido ASC");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query9=mysqli_query($mysqli, "SELECT * FROM `limpieza` WHERE fecha=CURDATE() ORDER BY ruta ASC");
?>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrapcss.css" />
  <link rel="stylesheet" href="cloudflare.css" />
  <script src="/DGLP/css/modalestilo.min.js"></script>
  <script src="googleapisjs.js"></script>
  <script src="ajaxjs.js"></script>  
  <script src="bootstrapjs.js"></script>
  <script src="cloudflarejs.js"></script>
 
  <title>Modal Ejemplo</title>
</head>


<?php
date_default_timezone_set('America/Managua');
$registro=date("Y-m-d H:i:s"); 
$fecha = date("Y-m-d");
?>

<body>

<!-- Botón para abrir el modal -->
<button id="openModalBtn" class="btn-info btn">Agregar Ayudantes</button>

<!-- El modal -->
<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- Contenido del modal -->
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
             <button type="button" class="close" style="background-color:red; height:40px;  width:40px; color:black;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-right: 70px; font-size:20px"><u>Agregar Limpieza Publica</u></p>
            </div>
         
    <form action="/DGLP/limpieza/ayudantes/insert_ayuda.php" method="POST">
  <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fecha">Fecha:</label>
       <input class="form-control" id="" type="datetime" name="fecha" value="<?=$fecha?>" readonly>
        </div>

        <div class="form-group col-md-6">
            <label for="equipo">Equipo:</label>
            <select  class="form-control" id="equipo" name="equipo" required>
<option value="">Equipo:</option>
<?php
while ($datos= mysqli_fetch_array($query9))
{
?>
<option value="<?php echo $datos['equipo']?>"> <?php echo $datos['equipo']?></option>
<?php
}
?>
  </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="planilla">Ayudante:</label>
            <select  class="form-control" id="ayudante" name="ayudante" required>
<option value="">Cedula:</option>
<?php
while ($datos= mysqli_fetch_array($query8))
{
?>
<option value="<?php echo $datos['cedula']?>"> <?php echo $datos['cedula']?></option>
<?php
}
?>
  </select>
  <input type="hidden" name="cargo" value="AYUDANTE">
        </div>
     
    </div>
    <div class="modal-footer">
        <button type="submit" style="margin: 10px; width:200px; font-weight:bold;" id="" class="btn btn-primary">Agregar</button>
    </div>
    <input type="hidden" name="usuario" value="<?=$usuario?>">
<input type="hidden" name="registro" value="<?=$registro?>">
    </form>
  </div>
  </div>
  </div>

  
<!-- Script JavaScript para manejar el modal -->
<!-- Script JavaScript para manejar el modal -->
<script>
  // Obtener referencias a elementos del DOM
  var modal = document.getElementById('myModal');
  var openModalBtn = document.getElementById('openModalBtn');
  var closeModalBtn = document.querySelector('.close'); // Modificado para seleccionar el botón de cierre

  // Función para abrir el modal
  openModalBtn.onclick = function() {
    modal.style.display = 'block';
  }

  // Función para cerrar el modal
  closeModalBtn.onclick = function() {
    modal.style.display = 'none';
  }

  // Cerrar el modal si se hace clic fuera de él
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }
</script>

<!--selects-->
<script>
$(document).ready(function(){
 $('#ayudante').multiselect({
  nonSelectedText: 'ayudante',
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
    $('#ayudante option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#ayudante').multiselect('refresh');
    alert(data);
   }
  });
 });
  
});
</script>

<script>
$(document).ready(function(){
 $('#equipo').multiselect({
  nonSelectedText: 'equipo',
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
    $('#equipo option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#equipo').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>


</body>
</html>
