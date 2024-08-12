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
	require '../conn.php';


	if(ISSET($_POST['search'])){
		
		//$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$buscar = $_POST['buscar'];
		$query=mysqli_query($conexion, "SELECT idEmp, nomina, inss, nombre_apellido, cedula, cargo, ubicacion, jornada_laboral, fecha_ingreso, registro, estado FROM nomina WHERE inss = '$buscar' ") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){$i++;
?>
	<tr>
	<th scope="row"><?php echo $i; ?></th>
		<td class="table__item"><?php echo $fetch["nomina"]?></td>
		<td class="table__item"><?php echo $fetch["inss"]?></td>
	    <td class="table__item"><?php echo $fetch["nombre_apellido"]?></td>
		<td class="table__item"><?php echo $fetch["cedula"]?></td>
		<td class="table__item"><?php echo $fetch["cargo"]?></td>
		<td class="table__item"><?php echo $fetch["ubicacion"]?></td>
		<td class="table__item"><?php echo $fetch["jornada_laboral"]?></td>
		<td class="table__item"><?php echo $fetch["fecha_ingreso"]?></td>
		<td class="table__item"><?php echo $fetch["registro"]?></td>
		<td class="table__item"><?php echo $fetch["estado"]?></td>
s		<td class="table__item">
      	<!--<input type="button" value="Editar" name="editar" onclick="location.href='../RegistroUP.php?id=<?php echo $fetch['id']?>'"/>-->
		<button type="button" name="editar" data-toggle="modal" title="Editar" data-target="#modalRetorno" data-id="<?=$fetch[idEmp]?>">
		<i class="fa-solid fa-pen-nib"></i></button>
		</td>
		<td class="table__item">
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
		$query=mysqli_query($conexion, "SELECT idEmp, nomina, inss, nombre_apellido, cedula, cargo, ubicacion, jornada_laboral, fecha_ingreso, registro, estado  FROM nomina") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){$i++;
?>
	<tr>
       
	<th scope="row"><?php echo $i; ?></th>
	<td class="table__item"><?php echo $fetch["nomina"]?></td>
		<td class="table__item"><?php echo $fetch["inss"]?></td>
	    <td class="table__item"><?php echo $fetch["nombre_apellido"]?></td>
		<td class="table__item"><?php echo $fetch["cedula"]?></td>
		<td class="table__item"><?php echo $fetch["cargo"]?></td>
		<td class="table__item"><?php echo $fetch["ubicacion"]?></td>
		<td class="table__item"><?php echo $fetch["jornada_laboral"]?></td>
		<td class="table__item"><?php echo $fetch["fecha_ingreso"]?></td>
		<td class="table__item"><?php echo $fetch["registro"]?></td>
		<td class="table__item"><?php echo $fetch["estado"]?></td>
	    <td class="table__item">
      	<!--<input type="button" value="Editar" name="editar" onclick="location.href='../RegistroUP.php?id=<?php echo $fetch['id']?>'"/>-->
		<button type="button" name="editar" data-toggle="modal" title="Editar" data-target="#modalRetorno" data-id="<?=$fetch[idEmp]?>">
		<i class="fa-solid fa-pen-nib"></i></span></button>
		</td>
		<td class="table__item">
		<button title="Eliminar" value="Eliminar" name="eli" onclick="location.href='EliminarRegistro.php?id=<?php echo $fetch['idEmp']?>'" onclick="return ConfirmDelete()">
		<i class="fa-solid fa-trash"></i></span></button>
		</td>
			
	</tr>
	
    
<?php
		}
	}

?>
<script>
		AgregarPregunta();


		/*function cargarFoto(id){
          alert(id);
            $.ajax({
                url:"vista/soap.php?id="+id,
				type: "GET",
				dataType: "json",
				success:function(result){
					let foto = result.foto;
                   console.log(result);

				},error:function(error){
					alert("Error:"+ JSON.stringify(error));
				}


			});

		}*/
</script>