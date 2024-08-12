<?php
require '../conn.php';

if (isset($_POST['search'])) {
    $date1 = date("Y-m-d", strtotime($_POST['date1']));
    $date2 = date("Y-m-d", strtotime($_POST['date2']));
    $query = mysqli_query($conexion, "SELECT IFNULL(t2.ubicacion, 'VOLUNTARIO') AS ubicacion, COUNT(t1.entrada) AS Personal
        FROM `asistencia` AS t1 
        LEFT JOIN nomina AS t2 ON t1.cedula = t2.cedula 
        WHERE t1.fecha_entrada BETWEEN '$date1' AND '$date2' 
        GROUP BY ubicacion 
        ORDER BY ubicacion ASC") or die(mysqli_error());
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        while ($fetch = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td class="table__item"><?php echo $fetch["ubicacion"] ?></td>
                <td class="table__item"><?php echo $fetch["Personal"] ?></td>
            </tr>
            <?php
        }
    } else {
        echo '
        <tr>
            <td colspan="4"><center>Registros no Existen</center></td>
        </tr>';
    }
} else {
    $query = mysqli_query($conexion, "SELECT IFNULL(t2.ubicacion, 'VOLUNTARIO') AS ubicacion, COUNT(entrada) AS Personal
        FROM `asistencia` AS t1
        LEFT JOIN nomina AS t2 ON t1.cedula = t2.cedula
        WHERE t1.fecha_entrada = CURDATE() 
        GROUP BY ubicacion 
        ORDER BY ubicacion ASC") or die(mysqli_error());
    while ($fetch = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td class="table__item"><?php echo $fetch["ubicacion"] ?></td>
            <td class="table__item"><?php echo $fetch["Personal"] ?></td>
        </tr>
        <?php
    }
}

?>
