<?php
require('fpdf/fpdf.php');
require('limpieza/data.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Viajes', 0, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }

    function AddMyTable($resultado)
    {
        $this->SetFont('Arial', '', 10);
        $this->Cell(10, 10, 'FECHA', 1);
        $this->Cell(30, 10, 'TURNO', 1);
        $this->Cell(40, 10, 'DISTRITO', 1);
        $this->Cell(30, 10, 'VIAJES', 1);
        $this->Cell(40, 10, 'TONELADAS', 1);
        $this->Ln();

        while ($fila = $resultado->fetch_assoc()) {
            $this->Cell(10, 10, date('Y-m-d', strtotime($fila['fecha'])), 1);
            $this->Cell(30, 10, $fila['turno'] . "-" . $fila['cantidad_turno'], 1);
            $this->Cell(40, 10, $fila['distrito'], 1);
            $this->Cell(30, 10, $fila['viajes'], 1);
            $this->Cell(40, 10, number_format($fila['tonelada'], 2), 1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();

// Agregar la tabla al PDF
$pdf->AddMyTable($resultado);

// Agregar gráficos (canvas)
$pdf->Ln(); // Espacio entre la tabla y los gráficos

// Agregar las imágenes de los gráficos al PDF
$pdf->Image('graficos/grafico_viajes.png', 10, $pdf->GetY(), 90, 60);
$pdf->Image('graficos/grafico_toneladas.png', 110, $pdf->GetY(), 90, 60);
$pdf->Image('graficos/grafico_turnos.png', 210, $pdf->GetY(), 90, 60);

// Guardar o mostrar el PDF
$pdf->Output();
?>
