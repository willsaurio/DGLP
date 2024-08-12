<html>

<head>
<title>Salida Personal</title>
<link rel="stylesheet" href="/DGLP/css/bootstrap.css">


 <style> 

* {
	margin: auto;

	border: 0; 
}

body {
  font-family: Arial;
  
  background-image: url("Diseño/register.png");

height: 90vh;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;

}

form {
background-color: #ffffff;
box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;

}


input[type=submit] {
	color: #fff;
	/*display: block;*/
	background: #fd1c11;
	width: 300px;
  margin: 10px;
	height: 40px;
  font-size:18px;
  font-weight:bold;
	border-radius: 3px;
	cursor: pointer;
}

input[type=submit]:hover {
	background-color:#752025;
}

.column {
  padding-right: 600px;
}

.line {
padding-left: 10px;	
}
</style>


</head>
<body>

<?php
require '../menu/menunav.php';
?>


<?php
date_default_timezone_set('America/Managua');
$Hora=date("H:i:s"); 
?>

<?php
date_default_timezone_set('America/Managua');
$Fecha=date("Y-m-d"); 
?>
<br></br>
<div class="main" style="width:30%;">

<script>
 function validarFormulario() {
      var cedula = document.getElementById('CEDULA').value;
      if (cedula.length === 0) {
        alert('Numero de Cedula Invalido!');
        return false; // Evita el envío del formulario si la validación falla
      }
      // Si la validación es exitosa, el botón se desactiva y se envía el formulario.
      document.getElementById('formulario').submit();
      document.querySelector('input[type="submit"]').disabled = true;
      return true;
    }
</script>

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
               $html .= '</tr><tr><td ><img style="width:180px;" id="base64image" src="data:image/jpeg;base64,'.utf8_encode($value2).'" /></td>'; 
            }
            
            else
            {
                 $html .= '</tr><tr><td ><img style="width:180px;" id="base64image" src="data:image/jpeg;base64,'.utf8_encode($value2).'" /></td>'; 
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

<?php
require "conexion.php";
?>

<?php
$consulta= ("SELECT id, entrada, nombre_apellido, cedula, observacion from asistencia WHERE fecha_entrada = CURDATE() AND salida='00:00:00' AND fecha_salida = '0000-00-00' AND cedula = '$_POST[cedula]' LIMIT 1");
$query=mysqli_query($conexion, $consulta);
$row=mysqli_num_rows($query);
		if($row>0){
		$fetch=mysqli_fetch_array($query);
		}
  
echo "<form action='salida_voluntario.php' class='line' method='post' autocomplete='off'>
<br>
<b><label>Ingrese Cedula</label></b>
<br>
<input type='text' class='form-control' style='width:300px; margin:10px;' name='cedula'  autofocus='on'>

</form>";

?>
</div>
<br>
<div class="main reponsive form-inline" >
<form action="RegistroVoluntariosalida.php" method="post" id="formulario" class="line" enctype="" >
  <br>
  <h2><b>Datos del Trabajador Voluntario</b></h2>
  
  <div class="input-group" style="display:inline-block;">
<?php
require_once "nusoap/cliente/lib/nusoap.php";

// Obtener el número de INSS del formulario POST

$cedu = $_POST['cedula'];
// Realizar la búsqueda en la tabla_inss para obtener la cédula asociada al INSS
$query = "SELECT cedula FROM asistencia WHERE cedula = '$cedu' and salida = '00:00:00'";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
  $fila = $resultado->fetch_assoc();
  $cedula = $fila['cedula'];

$client = new nusoap_client("https://recaudash.managua.gob.ni/sibu/foto_server/serverFoto.php?wsdl", true);

$cedula = $_POST[cedula];
$result = $client->call("crud.GetData",array("cedula" => "".$cedula.""));

echo build_table($result, $tipo);
}
?>
</div>

<div class="col-md-8 inline">
  <div class="input-group col-md-2">
<b><label for="">Entrada:</label></b>
<br>
<input type="datetime" class="form-control" name="entrada" value="<?=$fetch[entrada]?>" readonly>
<input type="hidden" name="id" value="<?=$fetch[id]?>" readonly>
</div>
<div class="input-group col-md-2">
<b><label name="ingreso">Salida:</label></b>
<br>
<input type="hidden" name="fecha_salida" value="<?=$Fecha?>" readonly>
<input type="datetime" class="form-control" name="salida" value="<?=$Hora?>" readonly>
</div>
<div class="input-group col-md-5">
<b><label name="nombre">Nombre y Apellido:</label></b>
<br>
<input type="text" name="nombre_apellido" class="form-control" value="<?=$fetch[nombre_apellido]?>" readonly required>
</div>
<div class="input-group col-md-2">
<b><label for="">Cedula:</label></b> 
<input type="text" class="form-control" id="CEDULA" name="CEDULA" value="<?=$fetch[cedula]?>" readonly>
</div>
 <div class="input-group col-md-10">
 <label name="observacion">Observacion:</label></b>
 <textarea  class="form-control" name="observacion" placeholder="Observacion"><?=$fetch[observacion]?></textarea>
 </div>
 </div>
 <input type="hidden" name="usuario" value="<?=$usuario?>"></input>

  <div class="input-group col-md-5">
    <center><input type="submit" onclick="validarFormulario(event); this.disabled = true;" value="Registrar"></center>
</div>
</form>
</div>
<br>
</body>
</html>

