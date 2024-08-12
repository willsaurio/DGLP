<html>



<head>
<title>Registro Personal</title>
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
      var INSS = document.getElementById('INSS').value;
      if (INSS.length === 0) {
        alert('Numero INSS Invalido!');
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
                 $html .= '</tr><><td ><img style="width:180px;" id="base64image" src="data:image/jpeg;base64,'.utf8_encode($value2).'" /></td>'; 
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
require 'conexion.php';

        $consulta= ("SELECT * FROM nomina WHERE inss = '$_POST[inss]'");
        $query=mysqli_query($conexion, $consulta);
        $row=mysqli_num_rows($query);
            if($row>0){
            $fetch=mysqli_fetch_array($query);
                }	
echo "<form action='entrada.php' class='line' method='post' autocomplete='off'>
<br>
<b><label style='margin-left:1%;'>Ingrese INSS</label></b>
<br>
<input type='number' class='form-control' style='width:300px; margin:5px;' name='inss'  autofocus='on'>

</form>";

?>
</div>
<br>
<div class="main reponsive form-inline" >
<form action="RegistroPistol.php" method="post" id="formulario" class="" enctype="" >
  <br>
  <h2 style="margin-left:1%;"><b>Datos del Trabajador</b></h2>
  
<div class="input-group" style="display:inline-block;">
<?php
require_once "nusoap/cliente/lib/nusoap.php";

// Obtener el número de INSS del formulario POST
$inss = $_POST['inss'];

// Realizar la búsqueda en la tabla_inss para obtener la cédula asociada al INSS
$query = "SELECT cedula FROM nomina WHERE inss = '$inss'";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $cedula = $fila['cedula'];

    // Crear el cliente SOAP
    $client = new nusoap_client("https://recaudash.managua.gob.ni/sibu/foto_server/serverFoto.php?wsdl", true);

    // Llamar al método "GetData" con la cédula obtenida
    $result = $client->call("crud.GetData", array("cedula" => $cedula));

    // Supongo que $tipo debería ser definido en alguna parte de tu código
    $tipo = 1;  // Asegúrate de reemplazar esto con el valor correcto

    // Mostrar la tabla con la información obtenida
    echo build_table($result, $tipo);

}
// Función build_table (debes incluir el código de la función aquí)

// Cierra la conexión a la base de datos
$conexion->close();
?>

</div>
<input type="hidden" name="idEmp" value="<?=$fetch[idEmp]?>">
<div class="col-md-8 inline">
  <div class="input-group col-md-2">
<b><label for="">Entrada:</label></b>
<br>
<input type="datetime" class="form-control" name="Hora" value="<?=$Hora?>" readonly>
</div>
<div class="input-group col-md-2">
<b><label name="ingreso">Fecha Ingreso:</label></b>
<br>
<input type="datetime" class="form-control" name="Fecha" value="<?=$Fecha?>" readonly>
<input type="hidden" name="salida" value="00:00:00" readonly>
<input type="hidden" name="fecha_salida" value="0000-00-00" readonly>
</div>
<div class="input-group col-md-2">
<b><label for="">INSS:</label></b>
<br> 
<input type="int" name="INSS" class="form-control" id="INSS" value="<?=$fetch[inss]?>" readonly>
</div>
<div class="input-group col-md-5">
<b><label name="nombre">Nombre y Apellido:</label></b>
<br>
<input type="text" name="nombre_apellido" class="form-control" value="<?=$fetch[nombre_apellido]?>" readonly required>
</div>
<div class="input-group col-md-2">
<b><label for="">Cedula:</label></b> 
<input type="text" class="form-control" name="cedula" value="<?=$fetch[cedula]?>" readonly>
</div>
<div class="input-group col-md-4">
<b><label name="cargo">Cargo:</label></b>
<input type="text" class="form-control" name="cargo" value="<?=$fetch[cargo]?>" readonly>
</div>
<div class="input-group col-md-3">
<b><label for="">Departamento:</label></b>
<input type="text" class="form-control" name="departamento" value="<?=$fetch[ubicacion]?>" readonly>
</div>
 
 <div class="input-group col-md-10">
 <label name="observacion">Observacion:</label></b>
 <textarea  class="form-control" name="observacion" placeholder="Observacion"></textarea>
 </div>
 </div>
 <input type="hidden" name="usuario" value="<?=$usuario?>"></input>

  <div class="input-group col-md-5">
    <center><input type="submit" onclick="validarFormulario(event); this.disabled = true;" value="Registrar"></center>
</div>

<br></br>
</form>
</div>
<br>
</body>
</html>

