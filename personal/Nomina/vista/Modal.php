<!DOCTYPE html>

<html>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query3=mysqli_query($mysqli, "SELECT `idEstado`, `estado` FROM `estado`");

?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query2=mysqli_query($mysqli, "SELECT `id`, `planilla` FROM `planilla`");

?>

<head>
    <meta charset="utf-8">
    <title>Agregar Salida</title>
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

button[name=edit] {
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

button[name=edit]:hover {
	background-color:#0C406B;
}
    </style>

</head>
<body>

<!-- Botón para abrir el modal -->



<!-- Modal -->
<div class="modal fade" id="modalRetorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" style="background-color:red; height:40px;  width:40px; color:black;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-right: 70px; font-size:20px"><u>Datos Trabajador</u></p>
            </div>
            <div class="modal-body">
               <div id="loader">
                <div class="spinner"></div>
                Cargando información...
               </div>
               <form method="POST" action="/DGLP/personal/Nomina/vista/actualizar.php">
    <input type="hidden" id="supervisorId" name="id">
<!-- Asegúrate de ajustar el ID según sea necesario -->
<div id="contentImagen" style="border-radius: 4px; border:2px solid red; width:155px;"></div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="planilla">Nomina:</label>
            <select class="form-control" type="text" id="planilla" name="planilla">
            <?php
           while ($datos = mysqli_fetch_array($query2)) {
           $selected = ($_POST["planilla"] == $datos['planilla']) ? "selected" : "";
           echo "<option value='{$datos['planilla']}' $selected>{$datos['planilla']}</option>";
            }
            ?>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="inss">INSS:</label>
            <input class="form-control" type="number" id="inss" name="inss" readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="empleado">Nombre y Apellido:</label>
        <input class="form-control" type="text" id="empleado" name="empleado" readonly>
    </div>

    
    <div class="form-row">
    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <input class="form-control" type="text" id="cargo" name="cargo" readonly>
    </div>

        <div class="form-group col-md-6">
            <label for="ubicacion">Ubicacion:</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" readonly>
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="empleado">Cedula:</label>
        <input class="form-control" type="text" id="cedula" name="cedula" readonly>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="empleado">Registro:</label>
        <input class="form-control" type="datetime" id="registro" name="registro" readonly>
    </div>

    <div class="form-group col-md-6">
        <label for="empleado">Ingreso:</label>
        <input class="form-control" type="date" id="ingreso" name="ingreso">
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="empleado">Jornada Laboral:</label>
        <input class="form-control" type="number" id="jornada" name="jornada" readonly>
    </div>

    <div class="form-group col-md-6">
        <label for="">Estado:</label>
        <select class="form-control" type="text" id="estado" name="estado">
    <?php
    while ($datos = mysqli_fetch_array($query3)) {
    $selected = ($_POST["estado"] == $datos['estado']) ? "selected" : "";
    echo "<option value='{$datos['estado']}' $selected>{$datos['estado']}</option>";
    }
     ?>
    </select>
    </div>
    </div>

    <div class="modal-footer">
        <button type="submit" name="edit" id="guardar" class="btn btn-primary">Actualizar</button>
    </div>
</form>

            <div id="mensajeExito" style="display: none;"></div>
        </div>
    </div>
</div>
<script>
function cargarFoto(id) {
    $("#contentImagen").html("");
    
    $.ajax({
        url: "vista/soap.php?id=" + id,
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
            //alert("Error:" + JSON.stringify(error));
        }
    });
}

$(document).ready(function () {
    $('#modalRetorno').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#supervisorId').val(id);
        $('#loader').show();
        $('#infoContainer').hide();
        $.ajax({
            url: '/DGLP/personal/Nomina/vista/data.php?' + new Date().getTime(),
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                $('#loader').hide();
                $('#infoContainer').show();
                $('#planilla').val(response.nomi);
                $('#inss').val(response.idinss);
                $('#empleado').val(response.nombres);
                $('#cargo').val(response.puesto);
                $('#ubicacion').val(response.ubi);
                $('#cedula').val(response.idcedu);
                $('#ingreso').val(response.ingreso);
                $('#registro').val(response.digitado);
                $('#jornada').val(response.jornada);
                $('#estado').val(response.est);

                // Integrar la función cargarFoto
                cargarFoto(id);
            },
            error: function (error) {
                console.error('Error en la solicitud AJAX: ' + error.responseText);
            }
        });
    });

    // Limpiar campos cuando se oculta el modal
    $('#modalRetorno').on('hidden.bs.modal', function () {
        $('#planilla').val('');
        $('#inss').val('');
        $('#empleado').val('');
        $('#cargo').val('');
        $('#ubicacion').val('');
        $('#foto').attr('src', '');  // Limpiar la imagen en el modal
    });
});


</script>



</body>
</html>
