<?php
require '../personal/conn.php';


if (isset($_POST['search'])) {

	//$date1 = date("Y-m-d", strtotime($_POST['date1']));
	$totalequipo = 0;
	$totalActivo = 0;
	$totalInactivo = 0;
	$totalResguardo = 0;
	$totalAveria = 0;
	$buscar = $_POST['buscar'];
	$query = mysqli_query($conexion, "SELECT descripcion, SUM(estado = 'ACTIVO') AS activo, SUM(estado='INACTIVO') AS inactivo, SUM(estado='RESGUARDO') as resguardo,
		SUM(estado='AVERIA TECNICA') AS averia_tecnica, SUM() FROM equipos GROUP BY descripcion ORDER BY descripcion ASC") or die(mysqli_error());
	$row = mysqli_num_rows($query);
	if ($row > 0) {
		while ($fetch = mysqli_fetch_array($query)) {
			$n++;
			?>
			<tr>
				<th scope="row"><?php echo $n; ?></th>
				<td class="table__item"><?php echo $fetch["descripcion"] ?></td>
				<td class="table__item"><?php echo $fetch["activo"] ?></td>
				<td class="table__item"><?php echo $fetch["inactivo"] ?></td>
				<td class="table__item"><?php echo $fetch["resguardo"] ?></td>
				<td class="table__item"><?php echo $fetch["averia_tecnica"] ?></td>

			</tr>

			<?php
		}

	} else {
		echo '
			<tr>
				<td colspan = "4"><center>Registros no Existen</center></td>
			</tr>';
	}
} else {

	$query = mysqli_query($conexion, "SELECT descripcion, SUM(estado = 'ACTIVO') AS activo, SUM(estado='INACTIVO') AS inactivo, SUM(estado='RESGUARDO') as resguardo,
		SUM(estado='AVERIA TECNICA') AS averia_tecnica, COUNT(descripcion) AS equipo FROM equipos GROUP BY descripcion ORDER BY descripcion ASC") or die(mysqli_error());
	while ($fetch = mysqli_fetch_array($query)) {
		$n++;
		?>
		<tr>

			<th scope="row"><?php echo $n; ?></th>
			<td class="table__item"><?php echo strtoupper($fetch["descripcion"]) ?></td>
			<td class="table__item"><?php echo $fetch["activo"] ?></td>
			<td class="table__item"><?php echo $fetch["inactivo"] ?></td>
			<td class="table__item"><?php echo $fetch["resguardo"] ?></td>
			<td class="table__item"><?php echo $fetch["averia_tecnica"] ?></td>
			<td class="table__item"><?php echo $fetch["equipo"] ?></td>
		</tr>


		<?php
		$totalequipo += $fetch["equipo"];
		$totalActivo += $fetch["activo"];
		$totalInactivo += $fetch["inactivo"];
		$totalResguardo += $fetch["resguardo"];
		$totalAveria += $fetch["averia_tecnica"];
	}

}

?>
<tr style="font-weight: bold;">
	<td>Total</td>
	<td></td>
	<td><?php echo $totalActivo ?></td>
	<td><?php echo $totalInactivo ?></td>
	<td><?php echo $totalResguardo ?></td>
	<td><?php echo $totalAveria ?></td>
	<td><?php echo $totalequipo ?></td>
</tr>