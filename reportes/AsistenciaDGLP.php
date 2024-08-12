<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$connect = new PDO("mysql:host=localhost;dbname=los_cocos", "root", "12345678");

$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));
$tipoReporte = $_POST['tipo_reporte'];

if(isset($_POST["export"]))
{

  if ($tipoReporte == 'DGLP') {

$query2 = "SELECT t1.fecha_entrada, t1.entrada, t1.salida, t1.fecha_salida, t1.inss, t1.nombre_apellido, t1.cedula, t2.cargo,  t2.ubicacion,
t1.observacion, t1.usuario from asistencia as t1 
left JOIN nomina as t2 ON t1.cedula = t2.cedula 
  WHERE t1.fecha_entrada BETWEEN '$date1' AND '$date2' AND t2.ubicacion <> ''";

$statement = $connect->prepare($query2);

$statement->execute();

$result = $statement->fetchAll();

  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setTitle('Entrada & Salida');

  $active_sheet->setCellValue('A1', 'DIRECCION GENERAL DE LIMPIEZA PUBLICA');

  $active_sheet->setCellValue('A2', 'REGISTRO DE ENTRADA & SALIDA DEL PERSONAL');
  
  $active_sheet->setCellValue('A3', 'INSS');

  $active_sheet->setCellValue('B3', 'Nombre y Apellido');
  
  $active_sheet->setCellValue('C3', 'Cedula');

  $active_sheet->setCellValue('D3', 'Cargo');
  
  $active_sheet->setCellValue('E3', 'Ubicacion');
   
  $active_sheet->setCellValue('F3', 'Observacion');
	
	$active_sheet->setCellValue('G3', 'Fecha de Ingreso');
	 
	$active_sheet->setCellValue('H3', 'Entrada');
	 
  $active_sheet->setCellValue('I3', 'Salida');
	  
  $active_sheet->setCellValue('J3', 'Fecha de Salida');
	  
	$active_sheet->setCellValue('K3', 'Usuario');

  $file->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(30);

  $file->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(24);

  $file->getActiveSheet()->getStyle('A3:K3')->getFont()->setBold(true)->setSize(13);

  $file->getActiveSheet()->getStyle('A4:K999')->getFont()->setBold(false)->setName('Courier New')->setSize(11);

  
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
   $file->getActiveSheet()->getColumnDimension('H')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('I')->setWidth(11);
   $file->getActiveSheet()->getColumnDimension('J')->setWidth(11);
   $file->getActiveSheet()->getColumnDimension('K')->setWidth(13);


   $file->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
	   
   $file->getActiveSheet()->getStyle('A3:K3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CEFCF2');

    //Ajustar text
    $file->getActiveSheet()->getStyle('A3:K999')->getAlignment()->setWrapText(true); 

  $count = 4 ;

  foreach($result as $row)
  {
  $active_sheet->setCellValue('A' . $count, $row["inss"]);

  $active_sheet->setCellValue('B' . $count, $row["nombre_apellido"]);
	
	$active_sheet->setCellValue('C' . $count, $row["cedula"]);

	$active_sheet->setCellValue('D' . $count, $row["cargo"]);
	
	$active_sheet->setCellValue('E' . $count, $row["ubicacion"]);
	
	$active_sheet->setCellValue('F' . $count, $row["observacion"]);
	
	$active_sheet->setCellValue('G' . $count, $row["fecha_entrada"]);
	
	$active_sheet->setCellValue('H' . $count, $row["entrada"]);
	
	$active_sheet->setCellValue('I' . $count, $row["salida"]);
	
	$active_sheet->setCellValue('J' . $count, $row["fecha_salida"]);

	$active_sheet->setCellValue('K' . $count, $row["usuario"]);

    $count = $count + 1;}

  }elseif ($tipoReporte == 'VOLUNTARIO') {
    
  $query2 = "SELECT t1.fecha_entrada, t1.entrada, t1.salida, t1.fecha_salida, t1.inss, t1.nombre_apellido, t1.cedula, t2.cargo, t1.ubicacion,
t1.observacion, t1.usuario from asistencia as t1 
left JOIN nomina as t2 ON t1.cedula = t2.cedula 
  WHERE t1.fecha_entrada BETWEEN '$date1' AND '$date2' AND t1.ubicacion = 'VOLUNTARIADO'";

$statement = $connect->prepare($query2);

$statement->execute();

$result = $statement->fetchAll();

  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setTitle('Entrada & Salida');

  $active_sheet->setCellValue('A1', 'DIRECCION GENERAL DE LIMPIEZA PUBLICA');

  $active_sheet->setCellValue('A2', 'REGISTRO DE ENTRADA & SALIDA DEL VOLUNTARIOS');
  
  $active_sheet->setCellValue('A3', 'INSS');

  $active_sheet->setCellValue('B3', 'Nombre y Apellido');
  
  $active_sheet->setCellValue('C3', 'Cedula');

  $active_sheet->setCellValue('D3', 'Cargo');
  
  $active_sheet->setCellValue('E3', 'Ubicacion');
   
  $active_sheet->setCellValue('F3', 'Observacion');
	
	$active_sheet->setCellValue('G3', 'Fecha de Ingreso');
	 
	$active_sheet->setCellValue('H3', 'Entrada');
	 
  $active_sheet->setCellValue('I3', 'Salida');
	  
  $active_sheet->setCellValue('J3', 'Fecha de Salida');
	  
	$active_sheet->setCellValue('K3', 'Usuario');

  $file->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(30);

  $file->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(24);

  $file->getActiveSheet()->getStyle('A3:K3')->getFont()->setBold(true)->setSize(13);

  $file->getActiveSheet()->getStyle('A4:K999')->getFont()->setBold(false)->setName('Courier New')->setSize(11);

  
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
   $file->getActiveSheet()->getColumnDimension('H')->setWidth(13);
   $file->getActiveSheet()->getColumnDimension('I')->setWidth(11);
   $file->getActiveSheet()->getColumnDimension('J')->setWidth(11);
   $file->getActiveSheet()->getColumnDimension('K')->setWidth(13);


   $file->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
	   
   $file->getActiveSheet()->getStyle('A3:K3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CEFCF2');

    //Ajustar text
    $file->getActiveSheet()->getStyle('A3:K999')->getAlignment()->setWrapText(true); 

  $count = 4 ;

  foreach($result as $row)
  {
  $active_sheet->setCellValue('A' . $count, $row["inss"]);

  $active_sheet->setCellValue('B' . $count, $row["nombre_apellido"]);
	
	$active_sheet->setCellValue('C' . $count, $row["cedula"]);

	$active_sheet->setCellValue('D' . $count, $row["cargo"]);
	
  $active_sheet->setCellValue('E' . $count, "VOLUNTARIO");
	
	$active_sheet->setCellValue('F' . $count, $row["observacion"]);
	
	$active_sheet->setCellValue('G' . $count, $row["fecha_entrada"]);
	
	$active_sheet->setCellValue('H' . $count, $row["entrada"]);
	
	$active_sheet->setCellValue('I' . $count, $row["salida"]);
	
	$active_sheet->setCellValue('J' . $count, $row["fecha_salida"]);

	$active_sheet->setCellValue('K' . $count, $row["usuario"]);

    $count = $count + 1;}
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = 'Reporte_Asistencia_DGLP_' . $date1 . '_hasta_' . $date2 . '.' . strtolower($_POST["file_type"]);
  
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

