<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$connect = new PDO("mysql:host=localhost;dbname=los_cocos", "root", "12345678");

$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));
//$tipoReporte = $_POST['tipo_reporte'];

if(isset($_POST["export"]))
{

$query2 = "SELECT * from limpieza WHERE fecha BETWEEN '$date1' AND '$date2'";

$statement = $connect->prepare($query2);

$statement->execute();

$result = $statement->fetchAll();

  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setTitle('Recoleccion Domiciliar');

  $active_sheet->setCellValue('A1', 'DIRECCION GENERAL DE LIMPIEZA PUBLICA');

  $active_sheet->setCellValue('A2', 'RECOLECCION DOMICILIAR');

  $active_sheet->setCellValue('A3', '#');

  $active_sheet->setCellValue('B3', 'Fecha');
  $active_sheet->setCellValue('C3', 'Turno');
  $active_sheet->setCellValue('D3', 'Distrito');
  $active_sheet->setCellValue('E3', 'Zona');
  $active_sheet->setCellValue('F3', 'Codigo');
  $active_sheet->setCellValue('G3', 'Unidad');
	$active_sheet->setCellValue('H3', 'Tipo');
	$active_sheet->setCellValue('I3', 'Conductor');
  $active_sheet->setCellValue('J3', 'INSS');
  $active_sheet->setCellValue('K3', 'Operario1');
  $active_sheet->setCellValue('L3', 'INSS1');
  $active_sheet->setCellValue('M3', 'Operario2');
  $active_sheet->setCellValue('N3', 'INSS2');
  $active_sheet->setCellValue('O3', 'Operario3');
  $active_sheet->setCellValue('P3', 'INSS3');
  $active_sheet->setCellValue('Q3', 'Viaje1-PesoKg');
  $active_sheet->setCellValue('R3', 'Viaje2-PesoKg');
  $active_sheet->setCellValue('S3', 'Viaje3-PesoKg');
  $active_sheet->setCellValue('T3', 'Viaje Apoyo');
  $active_sheet->setCellValue('U3', 'Cantidad de Viajes');
  $active_sheet->setCellValue('V3', 'Total-PesoKg');
  $active_sheet->setCellValue('W3', 'Toneladas');
  $active_sheet->setCellValue('X3', '% de Atencion');
  $active_sheet->setCellValue('Y3', 'Estado');
  $active_sheet->setCellValue('Z3', 'Hora Salida');
  $active_sheet->setCellValue('AA3', 'Hora Regreso');
  $active_sheet->setCellValue('AB3', 'Horas Trabajadas');
  $active_sheet->setCellValue('AC3', 'Km Recorridos');
  $active_sheet->setCellValue('AD3', 'Destino RS');
  $active_sheet->setCellValue('AE3', 'Observaciones');
  $active_sheet->setCellValue('AF3', 'Usuario');
  $active_sheet->setCellValue('AG3', 'Fiscal');
  $active_sheet->setCellValue('AH3', 'Jefe de Seccion');


  $file->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(30);

  $file->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(24);

  $file->getActiveSheet()->getStyle('A3:AH3')->getFont()->setBold(true)->setSize(13);

  $file->getActiveSheet()->getStyle('A4:AH999')->getFont()->setBold(false)->setName('Courier New')->setSize(11);

  
   //Alto
   $file->getActiveSheet()->getRowDimension('3')->setRowHeight(32);

   //Ancho
   $file->getActiveSheet()->getColumnDimension('A')->setWidth(10);
   $file->getActiveSheet()->getColumnDimension('B')->setWidth(30);
   $file->getActiveSheet()->getColumnDimension('C')->setWidth(19);
   $file->getActiveSheet()->getColumnDimension('D')->setWidth(25);
   $file->getActiveSheet()->getColumnDimension('E')->setWidth(18);
   $file->getActiveSheet()->getColumnDimension('F')->setWidth(25);
   $file->getActiveSheet()->getColumnDimension('G')->setWidth(25);
   $file->getActiveSheet()->getColumnDimension('H')->setWidth(15);
   $file->getActiveSheet()->getColumnDimension('I')->setWidth(18);
   $file->getActiveSheet()->getColumnDimension('J')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('K')->setWidth(18);
   $file->getActiveSheet()->getColumnDimension('L')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('M')->setWidth(18);
   $file->getActiveSheet()->getColumnDimension('N')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('O')->setWidth(18);
   $file->getActiveSheet()->getColumnDimension('P')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('Q')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('R')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('S')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('T')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('U')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('V')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('W')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('X')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('Y')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('Z')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('AA')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('AB')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('AC')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('AD')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('AE')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('AF')->setWidth(26);
   $file->getActiveSheet()->getColumnDimension('AG')->setWidth(18);
   $file->getActiveSheet()->getColumnDimension('AH')->setWidth(18);


   $file->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
	   
   $file->getActiveSheet()->getStyle('A3:AH3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CEFCF2');

    //Ajustar text
    $file->getActiveSheet()->getStyle('A3:AH999')->getAlignment()->setWrapText(true); 

  $count = 4 ;

  $count = 4; // Inicializar el contador

  foreach($result as $row) {
      $active_sheet->setCellValue('A' . $count, $count-3); // Agregar el número de enumeración
  
      $active_sheet->setCellValue('B' . $count, $row["fecha"]);
      $active_sheet->setCellValue('C' . $count, $row["turno"]);
      $active_sheet->setCellValue('D' . $count, $row["distrito"]);
      $active_sheet->setCellValue('E' . $count, $row["zona"]);
      $active_sheet->setCellValue('F' . $count, $row["ruta"]);
      $active_sheet->setCellValue('G' . $count, $row["equipo"]);
      $active_sheet->setCellValue('H' . $count, $row["descripcion"]);
      $active_sheet->setCellValue('I' . $count, $row["conductor"]);
      $active_sheet->setCellValue('J' . $count, $row["inss"]);
      $active_sheet->setCellValue('K' . $count, $row["operario1"]);
      $active_sheet->setCellValue('L' . $count, $row["inss1"]);
      $active_sheet->setCellValue('M' . $count, $row["operario2"]);
      $active_sheet->setCellValue('N' . $count, $row["inss2"]);
      $active_sheet->setCellValue('O' . $count, $row["operario3"]);
      $active_sheet->setCellValue('P' . $count, $row["inss3"]);
      $active_sheet->setCellValue('Q' . $count, $row["viaje1"]);
      $active_sheet->setCellValue('R' . $count, $row["viaje2"]);
      $active_sheet->setCellValue('S' . $count, $row["viaje3"]);
      $active_sheet->setCellValue('T' . $count, $row["viaje_apoyo"]);
      $active_sheet->setCellValue('U' . $count, $row["cantidad_viajes"]);
      $active_sheet->setCellValue('V' . $count, $row["total_kg"]);
      $active_sheet->setCellValue('W' . $count, $row["toneladas"]);
      $active_sheet->setCellValue('X' . $count, $row["atencion"]);
      $active_sheet->setCellValue('Y' . $count, $row["estado"]);
      $active_sheet->setCellValue('Z' . $count, $row["salida"]);
      $active_sheet->setCellValue('AA' . $count, $row["retorno"]);
      $active_sheet->setCellValue('AB' . $count, $row["horas_trabajadas"]);
      $active_sheet->setCellValue('AC' . $count, $row["km_recorridos"]);
      $active_sheet->setCellValue('AD' . $count, $row["destino"]);
      $active_sheet->setCellValue('AE' . $count, $row["observacion"]);
      $active_sheet->setCellValue('AF' . $count, $row["usuario"]);
      $active_sheet->setCellValue('AG' . $count, $row["fiscal"]);
      $active_sheet->setCellValue('AH' . $count, $row["jefe_seccion"]);
      
  
      $count = $count + 1;
  }
  

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

 // $date1 = date("M/Y");

  $file_name = 'Reporte_Limpieza' . $date1 . '_hasta_' . $date2 . '.' . strtolower($_POST["file_type"]);

  
  $temp_file = tmpfile();
  $temp_file_path=stream_get_meta_data($temp_file);
  $temp_file_path=$temp_file_path["uri"];
 fclose($temp_file);
  $writer->save($temp_file_path);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($temp_file_path);

  exit;

}

?>

