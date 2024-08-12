<?php
 
// incluimos la libreria ó toolkit nusoap que descargamos previamente

require_once('lib/nusoap.php');
 
$server = new nusoap_server();
 
$server->configureWSDL('Mi Web Service', 'urn:mi_ws1');
 
// Parametros de entrada
$server->wsdl->addComplexType(  'datos_persona_entrada', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array('cedula'              => array('name' => 'cedula','type' => 'xsd:string'))
);
// Parametros de Salida
$server->wsdl->addComplexType(  'datos_persona_salida', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array('expediente'   => array('name' => 'expediente','type' => 'xsd:string'),
                                      'cedula' =>array('name' => 'cedula','type' => 'xsd:string'),
                                      'foto' => array('name' => 'foto','type' => 'xsd:string'))
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
    $exp = '';  
    $ced='';
    $foto='';
    // Recorro el arreglo de datos enviados
    foreach ($datos as $key => $value){
         $query = "select expediente, cedula, base64_field from foto where cedula like  '%".$value['cedula']."%'";
         $sql = sqlsrv_query($conn,$query);
         while($row2 = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC))
        {
        $exp = $row2['expediente'];  
        $ced=$row2['cedula'];  
        $foto=$row2['base64_field']; 
        }
        }
     
    return array('expediente' => $exp, 'cedula'=> $ced, 'foto'=>$foto);

}
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>