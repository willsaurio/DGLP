<!DOCTYPE html>

<html>

ead>
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
                <p class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin-right: 70px; font-size:20px"><u>Detalle de Transferencia</u></p>
            </div>
            <div class="modal-body">
               <div id="loader">
                <div class="spinner"></div>
                Cargando información...
               </div>
               <form method="POST" action="/DGLP/transferencia/Recepcion/actualizar.php">
    <input type="hidden" id="supervisorId" name="id">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="planilla">Turno:</label>
       <input class="form-control" id="turno" type="text" name="turno" readonly>
        </div>

        <div class="form-group col-md-6">
            <label for="inss">Centro de Atencion:</label>
            <input class="form-control" type="text" id="centro" name="centro" readonly>
        </div>
    </div>

   <div class="form-row">
    <div class="form-group col-md-6">
        <label for="empleado">Equipo:</label>
        <input class="form-control" type="text" id="codigo" name="equipo" readonly>
    </div>

    <div class="form-group col-md-6">
        <label for="cargo">Descripcion:</label>
        <input class="form-control" type="text" id="tipo" name="descripcion" readonly>
    </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="ubicacion">Nombre y Apellido:</label>
            <input type="text" class="form-control" id="name" name="nombre" readonly>
        </div>
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="empleado">INSS:</label>
        <input class="form-control" type="text" id="inss" name="inss" readonly>
    </div>

    <div class="form-group col-md-6">
        <label for="empleado">Cargo:</label>
        <input class="form-control" type="text" id="car" name="cargo" readonly>
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="empleado">Salida:</label>
        <input class="form-control" type="time" id="salida" name="salida">
    </div>
  
    <div class="form-group col-md-6">
        <label for="empleado">Regreso:</label>
        <input class="form-control" type="time" id="regreso" name="regreso">
    </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
        <label for="">Viaje_kg:</label>
        <input class="form-control" type="int" id="viaje" name="viaje">
    </div>
    </div>
   
    <div class="modal-footer">
        <button type="submit" name="edit" style="margin: 10px; width:200px;" id="guardar" class="btn btn-primary">Actualizar</button>
    </div>
</form>

            <div id="mensajeExito" style="display: none;"></div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#modalRetorno').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('#supervisorId').val(id);
        $('#loader').show();
        $('#infoContainer').hide();
        $.ajax({
            url: '/DGLP/transferencia/Recepcion/data.php?' + new Date().getTime(),
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                $('#loader').hide();
                $('#infoContainer').show();
                $('#turno').val(response.turno);
                $('#centro').val(response.center);
                $('#codigo').val(response.codigo);
                $('#tipo').val(response.tipo);
                $('#name').val(response.name);
                $('#inss').val(response.idinss);
                $('#car').val(response.car);
                $('#salida').val(response.salida);
                $('#regreso').val(response.regreso);
                $('#viaje').val(response.viaje);
                var imgElement = document.getElementById("foto");
                if (!response.foto || response.foto === "") {
                    imgElement.src = "/DGLP/css/icons/user.png";
                } 
            },
            error: function(error) {
                console.error('Error en la solicitud AJAX: ' + error.responseText);
            }
        });
    });

    // Limpiar campos cuando se oculta el modal
    $('#modalRetorno').on('hidden.bs.modal', function () {
        $('#turno').val('');
        $('#centro').val('');
        $('#codigo').val('');
        $('#tipo').val('');
        $('#name').val('');
        $('#inss').val('');
        $('#car').val('');
        $('#salida').val('');
        $('#regreso').val('');
        $('#viaje').val('');
        $('#foto').attr('src', '');
    });
 
});

</script>



</body>
</html>
