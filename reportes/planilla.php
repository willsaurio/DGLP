<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$connect = new PDO("mysql:host=localhost;dbname=los_cocos", "root", "12345678");

//$date1 = date("Y-m-d", strtotime($_POST['date1']));
//$date2 = date("Y-m-d", strtotime($_POST['date2']));
//$tipoReporte = $_POST['tipo_reporte'];

if(isset($_POST["export"]))
{



$query2 = "SELECT * from nomina";

$statement = $connect->prepare($query2);

$statement->execute();

$result = $statement->fetchAll();

  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setTitle('Planilla');

  $active_sheet->setCellValue('A1', 'DIRECCION GENERAL DE LIMPIEZA PUBLICA');

  $active_sheet->setCellValue('A2', 'DGLP PLANILLA');

  $active_sheet->setCellValue('A3', '#');

  $active_sheet->setCellValue('B3', 'INSS');

  $active_sheet->setCellValue('C3', 'Nombre y Apellido');
  
  $active_sheet->setCellValue('D3', 'Cedula');

  $active_sheet->setCellValue('E3', 'Cargo');
  
  $active_sheet->setCellValue('F3', 'Ubicacion');
   
  $active_sheet->setCellValue('G3', 'Jornada');
	
	$active_sheet->setCellValue('H3', 'Fecha de Ingreso');
	 
	$active_sheet->setCellValue('I3', 'Estado');
	 

  $file->getActiveSheet()->getStyle('A1')->getFont()->setBold(true)->setSize(30);

  $file->getActiveSheet()->getStyle('A2')->getFont()->setBold(true)->setSize(24);

  $file->getActiveSheet()->getStyle('A3:I3')->getFont()->setBold(true)->setSize(13);

  $file->getActiveSheet()->getStyle('A4:I999')->getFont()->setBold(false)->setName('Courier New')->setSize(11);

  
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
   $file->getActiveSheet()->getColumnDimension('I')->setWidth(13);

   $file->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
	   
   $file->getActiveSheet()->getStyle('A3:I3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CEFCF2');

    //Ajustar text
    $file->getActiveSheet()->getStyle('A3:I999')->getAlignment()->setWrapText(true); 

  $count = 4 ;

  $count = 4; // Inicializar el contador

  foreach($result as $row) {
      $active_sheet->setCellValue('A' . $count, $count-3); // Agregar el número de enumeración
  
      $active_sheet->setCellValue('B' . $count, $row["inss"]);
      $active_sheet->setCellValue('C' . $count, $row["nombre_apellido"]);
      $active_sheet->setCellValue('D' . $count, $row["cedula"]);
      $active_sheet->setCellValue('E' . $count, $row["cargo"]);
      $active_sheet->setCellValue('F' . $count, $row["ubicacion"]);
      $active_sheet->setCellValue('G' . $count, $row["jornada_laboral"]);
      $active_sheet->setCellValue('H' . $count, $row["fecha_ingreso"]);
      $active_sheet->setCellValue('I' . $count, $row["estado"]);
  
      $count = $count + 1;
  }
  



  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $date1 = date("M/Y");

  $file_name = 'Reporte_Asistencia_DGLP' . $date1 . '.' . strtolower($_POST["file_type"]);

  
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

