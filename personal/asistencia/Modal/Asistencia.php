<!DOCTYPE html>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "alfas");

$query2=mysqli_query($mysqli, "SELECT `id`, `usuario`, idrol FROM `usuario` WHERE  idrol='10'");

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Agregar Ruta</title>
    <!-- Incluye las bibliotecas necesarias (jQuery y Bootstrap) -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="/DGLP/css/modalestilo.min.js"></script>

    <style>

/* Estilo para el contenedor del spinner */
#loader {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100px; /* Ajusta la altura según tus necesidades */
    font-size: 24px;
    color: #333; /* Color del texto del spinner */
}

/* Spinner animado */
.spinner {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    border-top: 4px solid #333; /* Color de la parte superior del spinner */
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite; /* Animación del spinner */
}

/* Animación del spinner */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

button[name=editar] {
	color: #fff;
	/*display: block;*/
	background: #3575A9;
	width: 90px;
	height: 44px;
	margin-left: 5px;
	margin-top: 5px;
	border: 0;
	border-radius: 3px;
	cursor: pointer;
}

button[name=editar]:hover {
	background-color:#0C406B;
}
    </style>

</head>
<body>

<!-- Foto Padron -->

<?php
date("H:i:s"); 
?>

<!-- Modal -->
<div class="modal fade" id="modalRetorno" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" style="background-color:red; height:50px; width:50px; color:black; margin-left: -2px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="exampleModalLabel" style="font-weight: bold; font-size:25px;"><u>Asistencia Trabajadores</u></p>
            </div>
            <div class="modal-body">
               <div id="loader">
                <div class="spinner"></div>
                Cargando información...
               </div>
                <form method="post" action="/DGLP/personal/asistencia/Modal/ActualizarRegistro.php">
                    <input type="hidden" id="supervisorId" name="id">

                    <div id="contentImagen" style="border-radius: 4px; border:2px solid red; width:155px;"></div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ubicacion">F. Entrada:</label>
                            <input class="form-control" type="date" id="efecha" name="fecha">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ubicacion">F. Salida:</label>
                            <input class="form-control" type="date" id="sfecha" name="fecha_salida">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ubicacion">Entrada:</label>
                            <input class="form-control" type="text" id="h_entrada" name="entrada"  oninput="formatoHora(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ubicacion">Salida:</label>
                            <input class="form-control" type="text" id="s_hora" name="salida"  oninput="formatoHora(this)">
                        </div>
                    <div class="form-group col-md-12">
                        <label for="ubicacion">Nombre y Apellido:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" readonly></input>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="departamento">Cedula:</label>
                        <input type="text" class="form-control"  id="cedu" name="cedula"readonly>
                    </div>
                   
                    <div class="form-group col-md-6">
                        <label for="departamento">Ubicacion:</label>
                        <input type="text" class="form-control"  id="ubi" name="ubicacion"readonly>
                    </div>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="departamento">Observacion:</label>
                        <textarea type="text" class="form-control"  id="observ" name="observacion" row="4" ></textarea>
                    </div>
                    
                    <div class="modal-footer inline">
                <button type="submit" name="editar" class="btn btn-primary">Actualizar</button>
            </div>
                </form>
            </div>
         
        </div>
    </div>
</div>
<script>
function cargarFoto(id) {
    $("#contentImagen").html("");
    
    $.ajax({
        url: "Modal/data_soap.php?id=" + id,
        type: "GET",
        dataType: "json",
        success: function (data) {

            console.log(data);
            let foto = data.result[0].foto;
            let imagen=`<img style="width:150px;" id="base64image" src="data:image/jpeg;base64,${foto}" />`;
            $("#contentImagen").html(imagen);
          
        },
        error: function (error) {
            let imagen=`<img style="width:150px;" id="base64image" src="/DGLP/css/icons/user.png" />`;
            $("#contentImagen").html(imagen);
            alert("Error:" + JSON.stringify(error));
        }
    });
}

$(document).ready(function() {
    $('#modalRetorno').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#supervisorId').val(id);
        $('#loader').show();
        $('#infoContainer').hide();

        // Hacer una solicitud AJAX para obtener la información del supervisor por ID
        $.ajax({
            url: '/DGLP/personal/asistencia/Modal/data.php?' + new Date().getTime(),
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                $('#loader').hide();
                $('#infoContainer').show();
                // Mostrar la información en los campos del formulario modal
                $('#nombre').val(response.nombre);
                $('#efecha').val(response.fecha1);
                $('#h_entrada').val(response.horae);
                $('#sfecha').val(response.fecha2);
                $('#s_hora').val(response.horas);
                $('#cedu').val(response.cedu);
                $('#ubi').val(response.ubi);
                $('#observ').val(response.observ);

                 // Integrar la función cargarFoto
                 cargarFoto(id);

                               
            },
            error: function(error) {
                console.error('Error en la solicitud AJAX: ' + error.responseText);
            }
        });
    });

    $('#modalRetorno').on('hidden.bs.modal', function () {
        // Limpiar los campos del modal al cerrarse
        $('#nombre').val('');
        $('#efecha').val('');
        $('#h_entrada').val('');
        $('#sfecha').val('');
        $('#s_hora').val('');
        $('#cedu').val('');
        $('#depa').val('');
        $('#observ').val('');
        $('#foto').attr('src', '');
    });

   

});
</script>

<script>
function formatoHora(input) {
    // Limpiar la entrada dejando solo los dígitos numéricos
    var valorLimpio = input.value.replace(/[^\d]/g, '');

    // Verificar si la longitud es mayor que 2 y agregar los dos puntos
    if (valorLimpio.length > 2) {
        valorLimpio = valorLimpio.slice(0, 2) + ':' + valorLimpio.slice(2);
    }

    // Verificar si la longitud es mayor que 5 y agregar los dos puntos adicionales
    if (valorLimpio.length > 5) {
        valorLimpio = valorLimpio.slice(0, 5) + ':' + valorLimpio.slice(5, 7);
    }

    // Obtener las horas y verificar que estén en el rango de 00 a 23
    var horas = parseInt(valorLimpio.slice(0, 2), 10);
    if (horas > 24) {
        alert("Por favor, ingrese una hora válida (formato de 24 horas).");
        input.value = ""; // Puedes restablecer el valor a un estado válido o dejarlo vacío
        return;
    }

    // Obtener los minutos y verificar que estén en el rango de 00 a 59
    var minutos = parseInt(valorLimpio.slice(3, 5), 10);
    if (minutos > 59) {
        alert("Por favor, ingrese minutos válidos.");
        input.value = ""; // Puedes restablecer el valor a un estado válido o dejarlo vacío
        return;
    }

    // Obtener los segundos y verificar que estén en el rango de 00 a 59
    var segundos = parseInt(valorLimpio.slice(6, 8), 10);
    if (segundos > 59) {
        alert("Por favor, ingrese segundos válidos.");
        input.value = ""; // Puedes restablecer el valor a un estado válido o dejarlo vacío
        return;
    }

    // Establecer el valor formateado en el campo de entrada
    input.value = valorLimpio;
}
</script>


</body>
</html>
