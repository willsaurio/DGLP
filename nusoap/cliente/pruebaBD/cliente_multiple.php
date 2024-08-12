
<html>
<head>
  
    <link rel="stylesheet" type="text/css" href="../nusoap/cliente/pruebaBD/css/css.css">
<script type="text/javascript" src="../nusoap/cliente/pruebaBD/html2canvas-master/dist/html2canvas.js"></script>
</head>
<body>
<form  action="index.php" method="post">
   
    <fieldset>
    <legend style=" width :400px;">Buscar foto</legend>
   <div style="float:left; ">
    <label for="casilla">Placa:</label>
    <input type="text" name="casilla" id="casilla"></p></div>
   <div style="float:left; margin-left: 10px;">
<label for="Manufacturer"> Tipo de Vehículo : </label>
<select id="cmbMake" name="Make" >
   <option value="0">Selecciona un tipo</option>
   <option value="1">Particular</option>
   <option value="2">Moto</option>
   <option value="3">Taxi</option>
   <option value="3">N/D</option>
</select></div>

    <p><input style ="margin-left: 10px; margin-top: 10px;" class= "btn_buscar" type="submit" value="Buscar" name="btn_buscar2"></p>
  </fieldset>
</form>
<?php
include 'conexion.php';
//include 'conexion.php';

    require_once('lib/nusoap.php');
     
   /*  session_start();
     if ($_SESSION['usuario'] && $_SESSION['pass'])
      {
       
           
      }
    else
    {
     
       header('Location: index.php');
        echo'<script type="text/javascript"> alert("Usuario incorrecto");</script>';
    } */
   /* if(isset($_POST["btn_buscar2"]))
{
  session_start();
  echo "mierda";
$_SESSION['tab_activa']=2;
}*/

       
      $cedula = $_POST['casilla'];
    //  $tipoVehiculo='Vehiculo';
      if( $_POST['Make']== 2)
      {
       $tipoVehiculo='Moto';
      }
      else
      {
        if( $_POST['Make']== 1)
        {
          $tipoVehiculo='Particular';
        }
        else
        {
          $tipoVehiculo='Taxi';
        }
      }

      
    if($cedula <>'')
    {
      
    
    $personas = array();
    $personas[1] =  array('cedula' => $cedula, 'tipoVehiculo'=>$tipoVehiculo);
    /*$personas[2] =  array('cedula' => '123B', 'nombre' => 'Marcos',   'FechaNacimiento'   => 1980);
    $personas[3] =  array('cedula' => '123C', 'nombre' => 'Pedro',    'FechaNacimiento'   => 1990);
    $personas[4] =  array('cedula' => '123D', 'nombre' => 'Ana',  'FechaNacimiento'   => 1995);
    $personas[5] =  array('cedula' => '123F', 'nombre' => 'Maria',    'FechaNacimiento'   => 1972);*/
     
     
    $cliente = new nusoap_client('http://192.168.4.112/nusoap/server_multiple_.php');
    //print_r($cliente);
     
    $datos_persona_entrada = array( "datos_persona_entrada" => $personas);
 
    $resultado = $cliente->call('obtener_expediente',$datos_persona_entrada);}
     
     ?>
  <center>
    
<table style="width:70%;   text-align: left;" class="container" id='container'>
  <tr>
    <th width ="20%">CAMPOS</th>
    <th width ="35%">DATOS</th> 
    <th width ="45%">IMAGEN</th> 
    
  </tr>
  <tr>
    <td>Placa</td>
    <td>
<?php echo utf8_encode($resultado['placa']);  ?>
</td> 
    
<td rowspan="16">
    <?php
   //print_r($resultado['expediente']);
    //print_r($resultado['cedula']);
     echo '<img style ="float:left;  width:100%;" src="data:image/jpeg;base64,'.$resultado['foto'].'" title="'.$resultado['cedula'].'" />'; 
    ?>
    </td> 
  </tr>
  <tr>
    <td>Tipo de Placa</td>
    <td><?php echo utf8_encode($resultado['tipo_placa']);  ?></td> 
   
  </tr>
  <tr>
    <td>Vehículo</td>
    <td><?php echo utf8_encode($resultado['vehiculo']);  ?></td> 
   
  </tr>

  <tr>
    <td>Modelo</td>
    <td><?php echo utf8_encode($resultado['model']);  ?></td> 
   
  </tr>
  <tr>
    <td>Fabricante</td>
    <td><?php echo utf8_encode($resultado['fabricante']);  ?></td> 
   
  </tr>
  <tr>
    <td>Año</td>
    <td><?php echo utf8_encode($resultado['anio']);  ?></td> 
   
  </tr>
  <tr>
    <td>Servicio Vehículo</td>
    <td><?php echo utf8_encode($resultado['ServicioVehiculo']);  ?></td> 
   
  </tr>
  <tr>
    <td>Color Primario</td>
    <td><?php echo utf8_encode($resultado['color1']);  ?></td> 
   
  </tr>
   <tr>
    <td>Color Secundario</td>
    <td><?php echo utf8_encode($resultado['color2']);  ?></td> 
   
  </tr>
  <tr>
    <td>Cédula</td>
    <td><?php echo utf8_encode($resultado['cedula']);  ?></td> 
   
  </tr>
  <tr>
    <td>Dueño</td>
    <td><?php echo utf8_encode($resultado['duenio']);  ?></td> 
   
  </tr>
  <tr>
    <td>Dirección</td>
    <td><?php echo utf8_encode($resultado['direccion']);  ?></td> 
   
  </tr>

  <tr>
    <td>Dirección2</td>
    <td><?php echo utf8_encode($resultado['direccion2']);  ?></td> 
   
  </tr>
  <tr>
    <td>Teléfono</td>
    <td><?php echo utf8_encode($resultado['telefono']);  ?></td> 
   
  </tr>
  <tr>
    <td>Celular</td>
    <td><?php echo $resultado['celular'];  ?></td> 
   
  </tr>
  <tr>
    <td>Municipio</td>
    <td><?php echo utf8_encode($resultado['municipio']);  ?></td> 
   
  </tr>
</table>


</center>







     

<br/><input type='button' id='but_screenshot' value='Guardar imagen' onclick='screenshot();' class="btn_buscar" style="margin-left: 15%;"><br/>





  <?php  
  $nombre=   $resultado['placa'].".png"; 
?>

 <script type='text/javascript'>
            function screenshot(){
                html2canvas(document.getElementById("container")).then(function(canvas) {
           
                   
var link = document.createElement('a');
    if (typeof link.download === 'string') {
      link.href = canvas.toDataURL();
      link.download =   '<?php echo $nombre;?>';
      //'canvas.png';

      //Firefox requires the link to be in the body
     
      document.body.appendChild(link);

      //simulate click
      link.click();

      //remove the link when done
      document.body.removeChild(link);
    } else {
      window.open(canvas.toDataURL());
    }

                });
            }
        </script>
</body>
</html>