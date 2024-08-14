<!doctype html>
<?php require 'llamados.php'; ?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpieza Pública</title>

    <!-- Estilos y scripts -->
    <link rel="stylesheet" href="/DGLP/css/bootstrap.css">
   
    <script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="bootstrap_limpieza.css"/> 
    <link href="s2/select2.min.css" rel="stylesheet" />
    <script src="s2/jquery.min.js"></script>
    <script src="s2/select2.min.js"></script>
    <script src="call_select2.js"></script>

    <style>
        .select2-container .select2-selection--single {
  height: 40px; /* Ajusta esta altura según tus necesidades */
  
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 40px; /* Asegúrate de que el texto esté centrado verticalmente */
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 38px; /* Ajusta el tamaño de la flecha para que se alinee */
}

input, select {
  height: 40px !important;
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
    <form id="regForm" method="POST" action= "insertar_lp.php" enctype="multipart/form-data">
        <div class="tab">
            <h1><b>1-Datos Generales</b></h1>
           <div class="row form-style">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <br>
                        <input type="date" class="form-control" name="fecha" value="<?=$fecha?>" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Turno</label>
                        <br>
                        <select class="mi-select-turnos form-control" name="turno">
                          
                        </select>
                    </div>
                </div>
          
            <div class="col-md-3">
<div class="form-group">
<label for="Cargo">Distrito:</label>
<br>
<select class="mi-select-distritos form-control" name="distrito">
<option value="">Distrito:</option>

  </select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="zona">Zona:</label>
    <br>
    <select  class=" mi-select-zona form-control"  name="zona" >
<option value="">Zona:</option>
  </select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="">Ruta</label>

<select name="ruta" id="ruta" class="mi-select-ruta form-control" onchange="mostrarKM()">
        <option value="">Selecciona Ruta:</option>
     </select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label for="">Equipo</label>

<select id="equipos" name="equipos" class="mi-select-equipos form-control">
        <option value="">Selecciona un equipo:</option>

    </select>
    </div>
</div>
<div class="col-md-3">
<div class="form-group">
    <label for="descripcion">Tipo:</label>
  
    <input type="text" class="form-control" id="descripcion" name="descripcion" readonly>
    </div>
</div>
</div>
</div>
    
        <div class="tab container">
    <h1><b>2-Viajes Realizados</b></h1>
    <div class="row form-style">
    <div class="col-md-2">
    <div class="form-group">
<label for="viaje1"> Viaje1 Peso-kg</label>

<input type="number" class="form-control" step="0.001" id="viaje1" oninput="contarViajes()" name="viaje1">
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
<label for="viaje2"> Viaje2 Peso-kg</label>

<input type="number" class="form-control" step="0.001" id="viaje2" oninput="contarViajes()" name="viaje2">
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
<label for="viaje3"> Viaje3 Peso-kg</label>

<input type="number" class="form-control" step="0.001" id="viaje3" oninput="contarViajes()" name="viaje3">
    </div>
</div>

<div class="col-md-2">
    <div class="form-group">
<label for="viaje Apoyo"> Viaje Apoyo</label>

<input type="number" class="form-control" step="0.001" id="viaje4" oninput="contarViajes()" name="viaje_apoyo">
    </div>
</div>
<div class="container">
<div class="col-md-2">
    <div class="form-group">
<label for="vaje3">Cantidad de Viajes</label>

<input type="number" class="form-control" id="cantidad_viajes" name="cantidad_viajes" readonly>
    </div>
</div>
</div>
</div>
<div class="row form-style">
<div class="col-md-3">
    <div class="form-group">
<label for="salida">Hora de salida</label>
<input type="time" name="salida" id="horaSalida" class="form-control" >
</div>
</div>
<div class="col-md-3">
    <div class="form-group">
<label for="salida">Hora de Entrada</label>
<input type="time" name="entrada" id="horaEntrada" class="form-control" >
</div>
</div>

<div class="col-md-3">
    <div class="form-group">
<label for="salida">Horas Trabajadas</label>
<input type="time" name="horas_trabajadas" id="totalHorasTrabajadas" class="form-control" readonly>
</div>
</div>
<div class="col-md-2">
    <div class="form-group">
<label for="salida">KM Recorridos</label>
<input type="text" class="form-control" id="kmV1" name="km_recorridos" readonly>
</div>
</div>
</div>
<div class="row form-style">
<div class="col-md-2">
    <div class="form-group">
<label for="vaje3">Suma Peso-Kg</label>

<input type="number" class="form-control" name="total_kg" readonly>
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
<label for="vaje3">Toneladas</label>

<input type="number" class="form-control" name="toneladas" readonly>
</div>
</div>
<div class="col-md-2">
    <div class="form-group">
<label for="atencion">% de Atencion</label>

<input type="number" id="atencion" class="form-control" name="atencion" >
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<label for="Estado">Estado:</label>
  
    <select  class="form-control" id="estado" name="estado" >
<option value="">Estado:</option>
<?php
while ($datos= mysqli_fetch_array($query11))
{
?>
<option value="<?php echo $datos['estado']?>"> <?php echo $datos['estado']?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="salida">Destino</label>
<input type="text" name="destino" class="form-control" value="EMTRIDES" readonly>
</div>
</div>
</div>
<div class="row form-style">
<div class="col-md-12">
<div class="form-group">
<label for="salida">Observacion</label>
<textarea name="observacion" class="form-control" style="text-transform: uppercase;"></textarea>
</div>
</div>
</div>
</div>


<div class="container tab">    
<h2 id='titulo' ><b>3-Datos del Personal Asignado</b></h2><br>
<div class="row form-style">
<h4 id='titulo'><b>Datos del conductor</b></h4><br>
<div class="col-md-4">
<div class="form-group">
<label for="">INSS</label>
<br>
<select name="inss" class="form-control mi-select-nomina">  
    </select>
    </div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="nombre">Nombre y Apellido:</label>
    <br>
    <input type="text" class="form-control" id="nombre" name="conductor" readonly>
</div>
</div>
</div>
<div class="row form-style">
<div class="col-md-12">
<h4 id='titulo'><b>Datos de Operarios</b></h4><br>
</div>
<div class="col-md-4">
<div class="form-group">
<label for="">INSS</label>
<br>
<select id="frame2" name="inss1" class="form-control mi-select-operario1">
        <option value="">Seleccione:</option>
 
    </select>
    </div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="nombre">Nombre y Apellido:</label>
<br>
<input type="text" class="form-control" id="nombre2" name="operario1" readonly>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">INSS</label>
<br>
<select id="frame3" name="inss2" class="form-control mi-select-operario2">
        <option value="">Seleccione:</option>
</select>
    </div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="nombre">Nombre y Apellido:</label>
<br>
<input type="text" class="form-control" id="nombre3" name="operario2" readonly>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label for="">INSS</label>
<br>
<select id="frame4" name="inss3" class="form-control mi-select-operario3">
        <option value="">Seleccione:</option>
    
    </select>
    </div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="nombre">Nombre y Apellido:</label>
<br>
<input type="text" class="form-control" id="nombre4" name="operario3" readonly>
</div>
</div>
</div>
</div>

<div class="tab">
<h2 id='titulo' ><b>4-Autorizado y Revisado</b></h2><br>
<div class="row form-style">
<h4 id='titulo' class="solid2">Fiscal</h4><br>
<div class="col-md-5">
<div class="form-group">
<label for="">INSS</label>
<br>
<select  name="inss4" class="form-control mi-select-fiscal">
        <option value="">Seleccione:</option>

    </select>
    </div>
</div>
        <div class="col-md-5">
<div class="form-group">
<label for="nombre">Nombre y Apellido:</label>
<br>
<input type="text" class="form-control" id="nombre5" name="fiscal" readonly>
</div>
</div>
</div>
<div class="row form-style">
<div class="col-md-12">
<h4 id='titulo' class="solid2">Jefe de Seccion</h4><br>
</div>
       
<div class="col-md-5">
<div class="form-group">
<label for="">INSS</label>
<br>
<select  name="inss5" class="form-control mi-select-jefe">
        <option value="">Seleccione:</option>
</select>
    </div>
</div>
<div class="col-md-5">
<div class="form-group">
<label for="nombre">Nombre y Apellido:</label>
<br>
<input type="text" class="form-control" id="nombre6" name="jefe_seccion" readonly>
<input type="hidden" name="usuario" value="<?=$usuario?>">
<input type="hidden" name="registro" value="<?=$registro?>">
</div>
</div>
</div>

        </div>
        <div class="col-md-12">
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
            </div>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
        </div>
    </form>
    </div>
    <script src="/DGLP/limpieza/f_limpieza2.js"></script>

  <script src="/DGLP/limpieza/steps_limpieza.js"></script>


  
  <script>
    function calcularTotalHoras() {
        // Obtener las horas de entrada y salida
        var horaEntrada = document.getElementById('horaEntrada').value;
        var horaSalida = document.getElementById('horaSalida').value;

        // Asegurarse de que ambos campos tienen valores
        if (horaEntrada && horaSalida) {
            // Convertir las horas a minutos desde medianoche
            var partesEntrada = horaEntrada.split(':');
            var partesSalida = horaSalida.split(':');

            var minutosEntrada = parseInt(partesEntrada[0]) * 60 + parseInt(partesEntrada[1]);
            var minutosSalida = parseInt(partesSalida[0]) * 60 + parseInt(partesSalida[1]);

            // Calcular la diferencia en minutos
            var diferenciaMinutos = minutosEntrada - minutosSalida;

            // Si la entrada es mayor que la salida, añadir 24 horas en minutos
            if (diferenciaMinutos < 0) {
                diferenciaMinutos += 24 * 60; // Añadir 24 horas
            }

            // Calcular las horas y minutos
            var horas = Math.floor(diferenciaMinutos / 60);
            var minutos = diferenciaMinutos % 60;

            // Formatear el resultado en HH:mm
            var horasFormateadas = ('0' + horas).slice(-2);
            var minutosFormateados = ('0' + minutos).slice(-2);

            // Mostrar el total de horas trabajadas en el campo correspondiente
            document.getElementById('totalHorasTrabajadas').value = horasFormateadas + ':' + minutosFormateados;
        }
    }

    // Agregar eventos de cambio para los campos de entrada de fecha
    document.getElementById('horaEntrada').addEventListener('change', calcularTotalHoras);
    document.getElementById('horaSalida').addEventListener('change', calcularTotalHoras);
</script>


   
    <script>
        document.getElementById('ruta').addEventListener('change', function () {
    // Llamar a contarViajes antes de mostrar los kilómetros

    

   // let totalViajes=contarViajes();
   console.log( contarViajes());
    contarViajes().then(function (result) {
        alert(result);
        // Llamar a mostrarKM con el valor actualizado de totalViajes
        mostrarKM(result);
    });
});

    </script>
 
</body>
</html>
