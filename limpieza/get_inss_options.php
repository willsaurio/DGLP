
<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

/*$query8=mysqli_query($mysqli, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");*/
function get_inss_options() {
    $query8 = mysqli_query($conexion, "SELECT * FROM `nomina` WHERE estado = 'ACTIVO'");
    $options = '';
    while ($row = mysqli_fetch_assoc($query8)) {
        $options .= "<option value=\"{$row['inss']}\">{$row['inss']}</option>";
    }
    return $options;
}

echo get_inss_options();
?>

