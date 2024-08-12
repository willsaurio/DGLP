<!doctype html>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query=mysqli_query($mysqli, "SELECT `id`, `ubicacion` FROM `ubicaciones` ORDER BY ubicacion ASC");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query2=mysqli_query($mysqli, "SELECT `id`, `planilla` FROM `planilla`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query4=mysqli_query($mysqli, "SELECT `idEstado`, `estado` FROM `estado`");
?>

<?php
$mysqli=mysqli_connect("localhost", "root", "12345678", "los_cocos");

$query5=mysqli_query($mysqli, "SELECT `id`, `cargos` FROM `cargos` ORDER BY  cargos ASC");
?>

<html>
<head>
<title>Registro Personal
</title>

<script src="/DGLP/personal/Nomina/query.js"></script>
<link rel="stylesheet" href="/DGLP/css/bootstrap.css">
<script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>
  
  <style>

* {
	margin: 1px;

	border: 0; 
}

body {
  font-family: Arial;
  font-size: 15px;
  background-image: url("Diseño/veri.png");

min-height: 350px;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;

}

form {
 
background-color: #E4F5F7;
box-sizing: border-box;
border: 2px solid red;
border-radius: 8px;

}

</style>

</head>


<body>

<div class="main">
<table table-layout=fixed; width="95%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">	
<?php
require '../../menu/menunav.php'; 
?>
</table>
</div>

<?php
date_default_timezone_set('America/Managua');
$registro=date("Y-m-d H:i:s"); 
?>

<?php
function build_table($array, $tipo){


// data rows
foreach( $array as $key=>$value){
    $html .= '<tr>';
    $i=0;
    foreach($value as $key2=>$value2){
        if($i==2)
        {
            if($tipo==1)
            {
               $html .= '</tr><tr><td ><img style="width:150px;" id="base64image" src="data:image/jpeg;base64,'.utf8_encode($value2).'" /></td>'; 
            }
            
            else
            {
                 $html .= '</tr><tr><td ><img style="width:150px;" id="base64image" src="data:image/jpeg;base64,'.utf8_encode($value2).'" /></td>'; 
           }
            
        }
        else
        {
            if($i==0)
            {
                if($tipo==1)
                {
                    $html .= '';
                }
                
            }
            else
            {
                if($tipo==1)
                {
                     $html .= '';
                 }                    
               
            }
            
        }
        $i++;
             
    }
    $html .= '</tr>';
}
// finish table and return it
$html .= '</table>';
return $html;
}?>

<div class="main">
<?php
$mysqli = mysqli_connect("localhost", "root", "12345678", "combustible");
$consulta = "SELECT * FROM `personal` WHERE `cedula` = '$_POST[cedula]'";
$query3 = mysqli_query($mysqli, $consulta);
$row = mysqli_num_rows($query3); // Corregir aquí

if ($row > 0) {
    $fetch = mysqli_fetch_array($query3);
}

echo "<div class='container'><form action='' method='post' autocomplete='off'>
<div  class='row'>
<div class='col-md-5'>
<div class='form-group'>
<b><label>Ingrese Cedula</label></b>
<br>
<input type='text' class='form-control' name='cedula' autofocus='on'>
</div>
</div>
</div>
</form></div>";
?>




<Form action= "IngresarTrabajador.php" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label for="">Cedula</label>
<br>
<input type="text" class="form-control" name="cedula" value="<?=$fetch[cedula]?>" placeholder="Ingrese Cedula" required/>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="">INSS</label>
<br>
<input type="number" class="form-control" name="inss" maxlength="7" id="numero" Placeholder="Ingrese INSS" required/>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="">Cargo</label>
<br>
<Select class="form-control" name="cargo" required>
<option value="">CARGO:</option>
<?php
while ($datos= mysqli_fetch_array($query5))
{
?>
<option value="<?php echo $datos['cargos']?>"> <?php echo $datos['cargos']?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<label for="">Jornada Laboral</label>
<br>
<input type="number" name="jornada" class="form-control" Placeholder="Horas a Laborar" required/>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="">Nombres y Apellidos</label>
<br>
<input type="text" class="form-control" name="nombre_apellido" value="<?=$fetch[nombre_apellido]?>" placeholder="Nombre y Apellido" required />
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label for="">Ubicacion</label>
<br>
 <Select class="form-control" name="ubicacion" required>
 <option value="">UBICACION:</option>
 <?php
 while ($datos= mysqli_fetch_array($query))
 {
?>
 <option value="<?php echo $datos['ubicacion']?>"> <?php echo $datos['ubicacion']?></option>
 <?php
 }
 ?>
 </select>
 </div>
 </div>
</div>

<div class="row">
 <div class="col-md-3">
<div class="form-group">
 <label for="">Fecha de Ingreso</label>
 <br>
<input type="date" class="form-control" name="Ingreso" placeholder="Fecha de Ingreso" required/>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
 <label >Planilla:</label>  
 <BR>
<select class="form-control" name="planilla"  required>
<option value="">PLANILLA:</option>
<?php
while ($datos= mysqli_fetch_array($query2))
{
?>
<option value="<?php echo $datos['planilla']?>"> <?php echo $datos['planilla']?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>Estado:</label>
<br>
<Select class="form-control" name="estado" required>
<option value="">ESTADO</option>
<?php
while ($datos= mysqli_fetch_array($query4))
{
?>
<option value="<?php echo $datos['estado']?>"> <?php echo $datos['estado']?></option>
<?php
}
?>
</select>
</div>
</div>

<div class="input-group" style="display:inline-block; float: right; margin-right:10%; margin-top:-7%;">
<?php
require_once "../../asistencia/nusoap/cliente/lib/nusoap.php";

$client = new nusoap_client("https://recaudash.managua.gob.ni/sibu/foto_server/serverFoto.php?wsdl", true);

$cedula = $_POST[cedula];
$result = $client->call("crud.GetData",array("cedula" => "".$cedula.""));

echo build_table($result, $tipo);
?>
</div>
</div>
<input type="hidden" name="usuario" value="<?=$usuario?>">
<input type="hidden" name="registro" value="<?=$registro?>">
<div class="form-inline" style="margin:10px;">
<input type="submit" class="btn btn-success" value="Registrar Trabajador">
</div>
</Form>
</div>

</body>
</html>

