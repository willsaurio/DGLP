
<?php
	require '../conn.php';
	if(ISSET($_POST['search'])){
		
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conexion, "SELECT COUNT(entrada) as Entrada, SUM(salida>'00:00:00') as salida FROM `asistencia` 
		WHERE fecha_entrada BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
        <td class="table__item"><?php echo $fetch["Entrada"]?></td>
	    <td class="table__item"><?php echo $fetch["salida"]?></td>
			
	       
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
		$query=mysqli_query($conexion, "SELECT COUNT(entrada) as Entrada, SUM(salida>'00:00:00') as salida FROM `asistencia` 
		WHERE fecha_entrada= CURDATE()") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
      <td class="table__item"><?php echo $fetch["Entrada"]?></td>
	  <td class="table__item"><?php echo $fetch["salida"]?></td>
			
	</tr>
	
    
<?php
		}
	}
?>

