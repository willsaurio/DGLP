<?php
$serverName = 'GREENBUCKET'; //serverName\instanceName
$connectionInfo = array( "Database"=>'db_foto', "UID"=>'Tito', "PWD"=>'Tito1487-');
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if($conn)
{
//echo "se re conecto";
}
else
{
//echo "no se conecto";
}


?>