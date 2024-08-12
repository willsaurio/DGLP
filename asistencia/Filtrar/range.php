<?php
	require'conn.php';
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conexion, "SELECT `ID`, `Fecha`, `Hora`, `Estado`, `Nombre_Apellido`, `Inss`, `Cedula`, `Departamento`, `Cargo`, `Rubro` FROM `jornada_ext` WHERE Fecha BETWEEN '$date1' AND '$date2' ") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch["Fecha"]?></td>
		<td><?php echo $fetch["Hora"]?></td>
		<td><?php echo $fetch["Estado"]?></td>
		<td><?php echo $fetch["Nombre_Apellido"]?></td>
		<td><?php echo $fetch["Inss"]?></td>
		<td><?php echo $fetch["Cedula"]?></td>
		<td><?php echo $fetch["Departamento"]?></td>
		<td><?php echo $fetch["Cargo"]?></td>
		<td><?php echo $fetch["Rubro"]?></td>
		
		
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
		$query=mysqli_query($conexion, "SELECT `ID`, `Fecha`, `Hora`, `Estado`, `Nombre_Apellido`, `Inss`, `Cedula`, `Departamento`, `Cargo`, `Rubro` FROM `jornada_ext`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch["Fecha"]?></td>
		<td><?php echo $fetch["Hora"]?></td>
		<td><?php echo $fetch["Estado"]?></td>
		<td><?php echo $fetch["Nombre_Apellido"]?></td>
		<td><?php echo $fetch["Inss"]?></td>
		<td><?php echo $fetch["Cedula"]?></td>
		<td><?php echo $fetch["Departamento"]?></td>
		<td><?php echo $fetch["Cargo"]?></td>
		<td><?php echo $fetch["Rubro"]?></td>
    </tr>
    
<?php
		}
	}
?>
