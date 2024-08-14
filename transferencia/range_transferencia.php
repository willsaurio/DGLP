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
	require '../asistencia/conexion.php';

	if(ISSET($_POST['search'])){
		
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		//$buscar = $_POST['buscar'];
		$query=mysqli_query($conexion, "SELECT `id`, `fecha`, `turno`, `centro`, `equipo`, `descripcion`, `nombre`, `inss`, `cargo`, `salida_dglp`, `regreso_dglp`,
		 `viaje_kg`, `registro`, `usuario` FROM `transferencia` WHERE fecha BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){$i++;
?>
	<tr>
	<th scope="row"><?php echo $i; ?></th>
		<td class="table__item"><?php echo $fetch["fecha"]?></td>
		<td class="table__item"><?php echo $fetch["turno"]?></td>
	    <td class="table__item"><?php echo $fetch["centro"]?></td>
		<td class="table__item"><?php echo $fetch["equipo"]?></td>
		<td class="table__item"><?php echo $fetch["descripcion"]?></td>
		<td class="table__item"><?php echo $fetch["nombre"]?></td>
		<td class="table__item"><?php echo $fetch["inss"]?></td>
		<td class="table__item"><?php echo $fetch["cargo"]?></td>
		<td class="table__item"><?php echo $fetch["salida_dglp"]?></td>
		<td class="table__item"><?php echo $fetch["regreso_dglp"]?></td>
		<td class="table__item"><?php echo $fetch["viaje_kg"]?></td>
		<td class="table__item"><?php echo $fetch["registro"]?></td>
		<td class="table__item"><?php echo $fetch["usuario"]?></td>
s		<td class="table__item">
  		<button type="button" name="editar" data-toggle="modal" title="Editar" data-target="#modalRetorno" data-id="<?=$fetch[id]?>">
		<i class="fa-solid fa-pen-nib"></i></button>
		</td>
		<td class="table__item">
		<button title="Eliminar" value="Eliminar" name="eli" onclick="location.href='EliminarRegistro.php?id=<?php echo $fetch['id']?>'" onclick="return ConfirmDelete()">
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
		$query=mysqli_query($conexion, "SELECT `id`, `fecha`, `turno`, `centro`, `equipo`, `descripcion`, `nombre`, `inss`, `cargo`, `salida_dglp`, `regreso_dglp`,
		`viaje_kg`, `registro`, `usuario` FROM `transferencia` WHERE fecha = CURDATE()") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){$i++;
?>
	<tr>
       
	<th scope="row"><?php echo $i; ?></th>
	<td class="table__item"><?php echo $fetch["fecha"]?></td>
		<td class="table__item"><?php echo $fetch["turno"]?></td>
	    <td class="table__item"><?php echo $fetch["centro"]?></td>
		<td class="table__item"><?php echo $fetch["equipo"]?></td>
		<td class="table__item"><?php echo $fetch["descripcion"]?></td>
		<td class="table__item"><?php echo $fetch["nombre"]?></td>
		<td class="table__item"><?php echo $fetch["inss"]?></td>
		<td class="table__item"><?php echo $fetch["cargo"]?></td>
		<td class="table__item"><?php echo $fetch["salida_dglp"]?></td>
		<td class="table__item"><?php echo $fetch["regreso_dglp"]?></td>
		<td class="table__item"><?php echo $fetch["viaje_kg"]?></td>
		<td class="table__item"><?php echo $fetch["registro"]?></td>
		<td class="table__item"><?php echo $fetch["usuario"]?></td>
	    <td class="table__item">
     	<button type="button" name="editar" data-toggle="modal" title="Editar" data-target="#modalRetorno" data-id="<?=$fetch[id]?>">
		<i class="fa-solid fa-pen-nib"></i></span></button>
		</td>
		<td class="table__item">
		<button title="Eliminar" value="Eliminar" name="eli" onclick="location.href='EliminarRegistro.php?id=<?php echo $fetch['id']?>'" onclick="return ConfirmDelete()">
		<i class="fa-solid fa-trash"></i></span></button>
		</td>
			
	</tr>
	
    
<?php
		}
	}

?>
<script>
		AgregarPregunta();
		</script>