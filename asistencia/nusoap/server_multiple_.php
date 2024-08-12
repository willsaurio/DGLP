<?php
 
// incluimos la libreria ó toolkit nusoap que descargamos previamente

require_once('../lib/nusoap.php');
 
$server = new nusoap_server();
 
$server->configureWSDL('Mi Web Service', 'urn:mi_ws1');
 
// Parametros de entrada
$server->wsdl->addComplexType(  'datos_persona_entrada', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array('cedula'              => array('name' => 'cedula','type' => 'xsd:string'),
								'tipoVehiculo'              => array('name' => 'tipoVehiculo','type' => 'xsd:string'))
);
// Parametros de Salida
$server->wsdl->addComplexType(  'datos_persona_salida', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array('placa'   => array('name' => 'placa','type' => 'xsd:string'),
                                      'cedula' =>array('name' => 'cedula','type' => 'xsd:string'),
                                      'foto' => array('name' => 'foto','type' => 'xsd:string'),
                                      'tipo_placa' => array('name' => 'tipo_placa','type' => 'xsd:string'),
                                      'vehiculo' => array('name' => 'vehiculo','type' => 'xsd:string'),
                                      'model' => array('name' => 'model','type' => 'xsd:string'),
                                      'fabricante' => array('name' => 'fabricante','type' => 'xsd:string'),
                                      'anio' => array('name' => 'anio','type' => 'xsd:string'),
									  'ServicioVehiculo' => array('name' => 'ServicioVehiculo','type' => 'xsd:string'),
									  'color1' => array('name' => 'color1','type' => 'xsd:string'),
									  'color2' => array('name' => 'color2','type' => 'xsd:string'),
									  'duenio' => array('name' => 'duenio','type' => 'xsd:string'),
									  'direccion' => array('name' => 'direccion','type' => 'xsd:string'),
									  'direccion2' => array('name' => 'direccion2','type' => 'xsd:string'),
									  'telefono' => array('name' => 'telefono','type' => 'xsd:string'),
									  'celular' => array('name' => 'celular','type' => 'xsd:string'),
									  'municipio' => array('name' => 'municipio','type' => 'xsd:string')
									  )
);
 
 
$server->register(   'calculo_edades', // nombre del metodo o funcion
                    array('datos_persona_entrada' => 'tns:datos_persona_entrada'), // parametros de entrada
                    array('return' => 'tns:datos_persona_salida'), // parametros de salida
                    'urn:mi_ws1', // namespace
                    'urn:hellowsdl2#calculo_edades', // soapaction debe ir asociado al nombre del metodo
                    'rpc', // style
                    'encoded', // use
                    'La siguiente funcion recibe un arreglo multidimensional de personas y calcula las Edades respectivas segun la fecha de nacimiento indicada' // documentation,
                     //$encodingStyle
);
$server->register(   'obtener_expediente', // nombre del metodo o funcion
                    array('datos_persona_entrada' => 'tns:datos_persona_entrada'), // parametros de entrada
                    array('return' => 'tns:datos_persona_salida'), // parametros de salida
                    'urn:mi_ws1', // namespace
                    'urn:hellowsdl2#obtener_expediente', // soapaction debe ir asociado al nombre del metodo
                    'rpc', // style
                    'encoded', // use
                    'La siguiente funcion recibe un arreglo multidimensional de personas y calcula las Edades respectivas segun la fecha de nacimiento indicada' // documentation,
                     //$encodingStyle
);
 
 
function calculo_edades($datos) {
 
    $msg = '';  
    // Recorro el arreglo de datos enviados
    foreach ($datos as $key => $value){
         
      //  $edad_actual = date('Y') - $value['FechaNacimiento'];
        $msg .= 'La edad de '. $value['cedula'] .' es: años ==== <br />'; 

    }
     
    return array('mensaje' => $msg);
}


function obtener_expediente($datos) {
    include 'conexion.php';
    $placa = '';  $tipo_placa='';
    $ced=''; $fabricante='';
    $foto='';$ServicioVehiculo='';
	$vehiculo=''; $telefono=''; $celular='';
	$model='';$direccion=''; $direccion2='';
	$anio='';$duenio='';$municipio='';
	$color1='';$color2='';
    // Recorro el arreglo de datos enviados
    foreach ($datos as $key => $value){
		if($value['tipoVehiculo']=='Moto')
		{
			$query = "select placa, tipoPlaca,vehiculo,model,fabricante, anio,duenio,direccion,direccion2,telefono, celular,municipio, ServicioVehiculo,color1,color2, cedula, base64_field from placa where placa =  '".$value['cedula']."' and tipoPlaca = 'Moto'";
       
		}
		else
		{
			if($value['tipoVehiculo']=='Particular')
			{
				$query = "select placa, tipoPlaca,vehiculo,model,fabricante, anio,duenio,direccion,direccion2,telefono, celular,municipio, ServicioVehiculo,color1,color2, cedula, base64_field from placa where placa =  '".$value['cedula']."' and tipoPlaca = 'Particular'";
       
			}
			else{
				$query = "select placa, tipoPlaca,vehiculo,model,fabricante, anio,duenio,direccion,direccion2,telefono, celular,municipio, ServicioVehiculo,color1,color2, cedula, base64_field from placa where placa =  '".$value['cedula']."' and tipoPlaca <> 'Moto' and tipoPlaca <>'Particular'";
       
			}
			
			
			
		}
		
           $sql = sqlsrv_query($conn,$query);
         while($row2 = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC))
        {
        $placa = $row2['placa']; 
$tipo_placa=$row2['tipoPlaca'];		
		//$exp = "123456";  
        $ced=$row2['cedula'];  
        $foto=$row2['base64_field']; 
		$vehiculo=$row2['vehiculo'];
		$model=$row2['model'];
		$fabricante=$row2['fabricante'];
		$anio=$row2['anio'];
		$ServicioVehiculo=$row2['ServicioVehiculo'];
		$color1=$row2['color1'];
		$color2=$row2['color2']; $municipio = $row2['municipio'];
		$duenio=$row2['duenio'];$telefono=$row2['telefono'];$celular=$row2['celular'];
		$direccion=$row2['direccion'];$direccion2=$row2['direccion2'];
        }
        }
		sqlsrv_close (  $conn );
     
    return array('placa' => $placa, 'cedula'=> $ced, 'foto'=>$foto, 'tipo_placa'=>$tipo_placa, 'vehiculo'=>$vehiculo, 'model'=>$model, 'fabricante'=>$fabricante , 'anio'=>$anio  , 'ServicioVehiculo'=>$ServicioVehiculo , 'color1'=>$color1 , 'color2'=>$color2 , 'duenio'=>$duenio , 'direccion'=>$direccion, 'direccion2'=>$direccion2, 'telefono'=>$telefono,  'celular'=>$celular, 'municipio'=>$municipio);

}
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>