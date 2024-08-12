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
                                array('cedula'              => array('name' => 'cedula','type' => 'xsd:string'),
                                      'nombre'              => array('name' => 'nombre','type' => 'xsd:string'),
                                      'FechaNacimiento'     => array('name' => 'FechaNacimiento','type' => 'xsd:string'))
);
// Parametros de Salida
$server->wsdl->addComplexType(  'datos_persona_salida', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
                                array('mensaje'   => array('name' => 'mensaje','type' => 'xsd:string'))
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
 
 
function calculo_edades($datos) {
 
    $msg = '';  
    // Recorro el arreglo de datos enviados
    foreach ($datos as $key => $value){
         
        $edad_actual = date('Y') - $value['FechaNacimiento'];
        $msg .= 'La edad de '. $value['nombre'] .' es:' . $edad_actual . ' años ==== <br />'; 

    }
     
    return array('mensaje' => $msg);
}
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>