<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Limpieza</title>
<script src="/DGLP/dashboard/charts/dash.min.js"></script>
<script src="/DGLP/dashboard/charts/pdf.bundle.js"></script>
<link rel="stylesheet" href="/DGLP/css/bootstrap.css">
<link rel="stylesheet" href="/DGLP/dashboard/charts/dash.css">
</head>

   <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .th, .td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .canvas-container {
            display: flex;
            flex-wrap: wrap;
        }

        .chart-container {
            width: 45%;
            height: 55%;
        }

        .chart-canvas {
            width: 100%;
            height: 100%;
            margin: 3%;
        }
    </style>

<body>


<div class="main">
<table table-layout=fixed; width="100%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">	
<?php
require '../../menu/menunav.php'; 
?>
</table>
</div>

<?php
require '../../limpieza/llamados.php';
?>

<div class="main2">

<div class="col-md-6" style="margin: 20px;">
<form action="" method="POST">
<div class="form-inline">
<div class="form-group">
    <label for="">Rago de Fecha</label>
    <input type="date" class="form-control" name="date1">
    <label for="">Hasta</label>
    <input type="date" class="form-control" name="date2">
    <Select class="form-control" name="turno">
<option value="">TURNO:</option>
<?php
while ($datos= mysqli_fetch_array($query3))
{
?>
<option value="<?php echo $datos['turno']?>"> <?php echo $datos['turno']?></option>
<?php
}
?>
</select>
    <button type="submit" class="btn btn-primary">Buscar</button>

</div>
</div>
</form>
<button class="btn btn-info" onclick="descargarPDF()">Descargar PDF</button>
    </div>

<?php
// Tu código PHP aquí...
require 'data.php'
// ...
?>
 <div class="canvas-container">
<div class="chart-container">
<canvas id="chartViajes" class="chart-canvas"></canvas>
</div>
<div class="chart-container">
<canvas id="chartToneladas" class="chart-canvas"></canvas>
</div>
<div class="chart-container">
<canvas id="chartTurnos" class="chart-canvas"></canvas>
</div>
</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Datos para el gráfico de cantidad de viajes por distritos
    var dataViajes = <?php echo json_encode($datosViajes); ?>; // Asegúrate de tener los datos necesarios aquí

    // Datos para el gráfico de toneladas por distritos
    var dataToneladas = <?php echo json_encode($datosToneladas); ?>; // Asegúrate de tener los datos necesarios aquí

    var dataTurnos = <?php echo json_encode($datosTurnos); ?>;
    // Obtener el contexto del lienzo para el gráfico de cantidad de viajes
    console.log(Chart);
    var ctxViajes = document.getElementById('chartViajes').getContext('2d');
    var optionsViajes = {
        responsive: true,
        maintainAspectRatio: false, // Esto permite controlar el tamaño del gráfico independientemente del contenedor
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    };
    var chartViajes = new Chart(ctxViajes, {
        type: 'bar',
        data: {
            labels: dataViajes.labels,
            datasets: [{
                label: 'Cantidad de Viajes por Distrito',
                data: dataViajes.data,
                options: optionsViajes
            }]
        },
    });

    // Obtener el contexto del lienzo para el gráfico de toneladas
    var ctxToneladas = document.getElementById('chartToneladas').getContext('2d');
    var chartToneladas = new Chart(ctxToneladas, {
        type: 'radar',
        data: {
            labels: dataToneladas.labels,
            datasets: [{
                label: 'Toneladas por Distrito',
                data: dataToneladas.data,
            }]
        },
    });


 // Obtener el contexto del lienzo para el gráfico de turnos
 var ctxTurnos = document.getElementById('chartTurnos').getContext('2d');
    var chartTurnos = new Chart(ctxTurnos, {
        type: 'line',
        data: {
            labels: dataTurnos.labels,
            datasets: [{
                label: 'Turnos Realizados',
                data: dataTurnos.data,
             }]
        },
    });
});


function descargarPDF() {
            var canvasContainer = document.querySelector('.canvas-container');

            var startDate = document.getElementsByName('date1')[0].value;  // Adjust the index if necessary
    var endDate = document.getElementsByName('date2')[0].value;    // Adjust the index if necessary

    var formattedStartDate = startDate.split('-').join('');
    var formattedEndDate = endDate.split('-').join('');

    // Generate a filename with "dashboard_DGLP" and the date range
    var filename = 'dashboard_DGLP_' + formattedStartDate + '_to_' + formattedEndDate + '.pdf';
            
            var pdfOptions = {
                margin: 10,
                filename: filename,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: {
                    unit: 'mm',
                    format: [400.4, 400.9],
                    orientation: 'landscape'
                },
                onclone: function (clon) {
                    var chartContainer1 = clon.querySelector('#chartViajes').parentNode;
                    var chartContainer2 = clon.querySelector('#chartToneladas').parentNode;
                    var chartContainer3 = clon.querySelector('#chartTurnos').parentNode;

                    // Adjust the width and height of the cloned containers
                    chartContainer1.style.width = '100%';
                    chartContainer1.style.height = '100%';
                    chartContainer2.style.width = '100%';
                    chartContainer2.style.height = '100%';
                    chartContainer3.style.width = '100%';
                    chartContainer3.style.height = '100%';

                    return new Promise(function (resolve) {
                        html2pdf(clon, pdfOptions).outputPdf().then(function (pdf) {
                            resolve(pdf);
                        });
                    });
                }
            };

            html2pdf().from(canvasContainer).set(pdfOptions).save();
        }
        </script>

</body>
</html>
