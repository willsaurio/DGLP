<!doctype html>

<?php
require 'llamados.php'
?>

<html>

<head>
  <title>Transferencia
  </title>

  <link rel="stylesheet" href="/DGLP/css/bootstrap.css">
  <script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>

  <link href="s2/select2.min.css" rel="stylesheet" />
  <script src="s2/jquery.min.js"></script>
  <script src="s2/select2.min.js"></script>
  <script src="select2_transferencia.js"></script>

  <style>
    body {
      font-family: Arial;



    }

    .form-style {
      background-color: #f9f9f9;
      /* Fondo típico de un formulario */
      border: 1px solid #ccc;
      /* Borde gris claro */
      padding: 20px;
      /* Espacio interno */
      border-radius: 5px;
      /* Bordes redondeados */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      /* Sombra para darle profundidad */
      max-width: 100%;
      /* Ancho máximo */
      margin: 20px auto;
      /* Centrado en la página */
    }

    .select2-container .select2-selection--single {
      height: 40px;
      /* Ajusta esta altura según tus necesidades */

    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 40px;
      /* Asegúrate de que el texto esté centrado verticalmente */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 38px;
      /* Ajusta el tamaño de la flecha para que se alinee */
    }

    input,
    select {
      height: 40px !important;
    }
  </style>

</head>


<body>

  <div class="main">
    <table table-layout=fixed; width="100%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">
      <?php
      require '../menu/menunav.php';
      ?>
    </table>
  </div>

  <?php
  date_default_timezone_set('America/Managua');
  $registro = date("Y-m-d H:i:s");
  $fecha = date("Y-m-d");
  ?>


  <div class="main col-md-10">

    <Form action="insertar_trans.php" method="POST" enctype="multipart/form-data">
      <div class="form-style">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Fecha</label>

              <input type="datetime" class="form-control" name="fecha" value="<?= $fecha ?>" readonly />
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Turno</label>
              <br>
              <select class="mi-select-turnos form-control" name="turno">

              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Ruta</label>

              <select id="centro" class="form-control mi-select-centro" name="centro">
                <option value="">Centro de Atencion:</option>

              </select>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="">Equipo</label>

              <select id="equipos" name="equipos" class="mi-select-equipos form-control">
                <option value="">Selecciona un equipo:</option>

              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="descripcion">Descripción:</label>

              <input type="text" class="form-control" id="descripcion" name="descripcion" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nombres y Apellidos</label>

              <select id="frame" name="nombres" class=" form-control mi-select-nomina">

              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="INSS">INSS:</label>
              <br>
              <input type="number" class="form-control" id="inss" name="inss" readonly>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="Cargo">Cargo:</label>
              <br>
              <input type="text" class="form-control" id="cargo" name="cargo" readonly>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <button type="submit" class="btn btn-info" style="width:200px; height:40px;">Registrar</button>
              <input type="hidden" name="usuario" value="<?= $usuario ?>">
              <input type="hidden" name="registro" value="<?= $registro ?>">
            </div>
          </div>
        </div>
      </div>
    </Form>
  </div>

</body>

</html>