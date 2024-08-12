<script type="text/javascript">
function ConfirmDelete(Funcion)
{
	var respuesta = confirm("Esta seguro de Eliminar Registro?");

	if(respuesta == true)
{
	Funcion()
}
else{
	return;
}
}

function AgregarPregunta(){
	var botones=document.getElementsByName("eli");
	botones.forEach((boton)=>{
		var funcionEliminado=boton.onclick;
		boton.onclick=()=>{
			ConfirmDelete(funcionEliminado);
		}
	});
}

</script>


<style>

button[name=editar] {
	color: #fff;
	/*display: block;*/
	background: #3575A9;
	width: 50px;
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

button[name=eli] {
	color: #fff;
	/*display: block;*/
	background: #DC2910;
	width: 50px;
	height: 44px;
	margin-left: 5px;
	margin-top: 5px;
	border: 0;
	border-radius: 3px;
	cursor: pointer;
}

button[name=eli]:hover {
	background-color:#851D0F;
}

</style>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query=mysqli_query($mysqli, "SELECT `id`, `estado` FROM `estados_equipos` ORDER BY estado ASC");
?>


<?php
	require '../personal/conn.php';


	if(ISSET($_POST['search'])){
		
		//$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$buscar = $_POST['buscar'];
		$query=mysqli_query($conexion, "SELECT * FROM equipos ORDER BY descripcion ASC ") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){$i++;
?>
	<tr>
	<th scope="row"><?php echo $i; ?></th>
		<td class="table__item"><?php echo $fetch["equipo"]?></td>
		<td class="table__item"><?php echo $fetch["descripcion"]?></td>
	    <td class="table__item"><?php echo $fetch["estado"]?></td>
		<td class="table__item"><?php echo $fetch["observacion"]?></td>
s		<td class="table__item hidden">
      	<!--<input type="button" value="Editar" name="editar" onclick="location.href='../RegistroUP.php?id=<?php echo $fetch['id']?>'"/>-->
		<button type="button" name="editar" data-toggle="modal" title="Editar" data-target="#modalRetorno" data-id="<?=$fetch[idEmp]?>">
		<i class="fa-solid fa-pen-nib"></i></button>
		</td>
		<td class="table__item hidden">
		<button title="Eliminar" value="Eliminar" name="eli" onclick="location.href='EliminarRegistro.php?id=<?php echo $fetch['idEmp']?>'" onclick="return ConfirmDelete()">
		<i class="fa-solid fa-trash"></i></span></button>
		</td>
			
	</tr>
		
<?php
			}
		
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Registros no Existen</center></td>
			</tr>';
		}
	}else{
		
		$query = mysqli_query($conexion, "SELECT * FROM equipos ORDER BY descripcion ASC") or die(mysqli_error());

		$i = 0;
		
		// Obtener los estados antes del bucle principal
		$query2 = mysqli_query($conexion, "SELECT * FROM estados_equipos ORDER BY estado ASC") or die(mysqli_error());
$estados = array();

while ($row = mysqli_fetch_assoc($query2)) {
    $estados[] = $row;
}

while ($fetch = mysqli_fetch_array($query)) {
    $i++;
    $idEquip = $fetch['idEquip'];
	?>

			
<tr id="fila<?=$idEquip?>">
    <th scope="row"><?php echo $i; ?></th>
    <td class="table__item"><?php echo $fetch["equipo"]?></td>
    <td class="table__item"><?php echo strtoupper($fetch["descripcion"]) ?></td>
    <td class="table__item">
        <select class="form-control" type="text" id="estado<?=$idEquip?>" name="estado">
            <option value="">SELECCIONE:</option>
            <?php
            foreach ($estados as $estado) {
                $selected = ($fetch["estado"] == $estado['estado']) ? "selected" : "";
                echo "<option value='{$estado['estado']}' $selected>{$estado['estado']}</option>";
            }
            ?>
        </select>
    </td>
    <td class="table__item">
        <textarea name="observacion" style="text-transform: uppercase;" id="observacion<?=$idEquip?>" class="form-control"><?php echo strtoupper($fetch["observacion"])?></textarea>
    </td>
    <td class="table__item hidden">
        <button onclick="actualizarRegistro(<?=$idEquip?>)">Actualizar Registro</button>
    </td>
</tr>
    
<?php
		}
	}

?>

<script>
  function obtenerDatosRegistro(idEquip) {
    var estado = document.getElementById('estado' + idEquip).value;
    var observacion = document.getElementById('observacion' + idEquip).value;

    return {
        idEquip: idEquip,
        estado: estado,
        observacion: observacion
    };
}

function enviarActualizacionAlServidor(datos) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'actualizar_equipos.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
					Swal.fire({
        icon: 'success',
        title: `<span class="swal2-title-lg">${'REALIZADO!'}</span>`,
        html: `<span class="swal2-text-lg">${'Actualizado Exitoso!'}</span>`,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    });
                } else {
                    Swal.fire({
        icon: 'error',
        title: 'ERROR',
        text: 'Ha Ocurrido un Error!',
        confirmButtonColor: '#d33',
        confirmButtonText: 'OK'
    });
                }
            } else {
                alert('Error en la solicitud. Código de estado: ' + xhr.status);
            }
        }
    };

    var datosCodificados = 'updatedData=' + encodeURIComponent(JSON.stringify(datos));
    xhr.send(datosCodificados);
}

function actualizarRegistro(idEquip) {
    var datosActualizados = obtenerDatosRegistro(idEquip);
    enviarActualizacionAlServidor(datosActualizados);
}

function actualizarTodo() {
    var filas = document.querySelectorAll('tr[id^="fila"]');
    var datosActualizados = [];

    filas.forEach(function (fila) {
        var idEquip = fila.id.replace('fila', '');
        var datosRegistro = obtenerDatosRegistro(idEquip);
        datosActualizados.push(datosRegistro);
    });

    enviarActualizacionAlServidor(datosActualizados);
}
</script>

<script>
		AgregarPregunta();
		</script>