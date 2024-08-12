<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Limpieza</title>
<script src="/DGLP/dashboard/charts/dash.min.js"></script>
<script src="/DGLP/dashboard/charts/animated.js"></script>
<script src="/DGLP/dashboard/charts/index.js"></script>
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
    </div>

<?php
// Tu código PHP aquí...
require 'data.php'
// ...
?>
<div  class="form-inline col-lg-12">
<div class="col-md-8" style="width: 35%; height: 35%;">
<canvas id="chartPersonal" width="400" height="400"></canvas>
</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Datos para el gráfico de cantidad de Personal por distritos
    var dataPersonal = <?php echo json_encode($datosPersonal); ?>; // Asegúrate de tener los datos necesarios aquí

    // Datos para el gráfico de Voluntarios por distritos
    var dataVoluntarios = <?php echo json_encode($datosVoluntarios); ?>; // Asegúrate de tener los datos necesarios aquí

      // Obtener el contexto del lienzo para el gráfico de cantidad de Personal
    console.log(Chart);
    var ctxPersonal = document.getElementById('chartPersonal').getContext('2d');
    var optionsPersonal = {
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
    var chartPersonal = new Chart(ctxPersonal, {
        type: 'doughnut',
        data: {
            labels: dataPersonal.labels,
            datasets: [{
                label: 'Cantidad de Personal por Ubicacion',
                data: dataPersonal.data,
                options: optionsPersonal
            }]
        },
    });

   // Obtener el contexto del lienzo para el gráfico de turnos

});
</script>

</body>
</html>
