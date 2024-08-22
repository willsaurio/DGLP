<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    input[type=text],
    [type=password],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
      font-weight: bold;
    }

    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      width: 30%;
      font-size: 15px;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      margin-left: 7%;
      width: 10%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 60%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
  <script src="googleapisjs.js"></script>
  <script src="ajaxjs.js"></script>
  <link rel="stylesheet" href="bootstrapcss.css" />
  <script src="bootstrapjs.js"></script>
  <script src="cloudflarejs.js"></script>
  <link rel="stylesheet" href="cloudflare.css" />
  <script src="/DGLP/limpieza/funciones_limpieza.js"></script>
</head>

<?php
require "../limpieza/llamados.php"
?>

<body>

  <div class="main">
    <table table-layout=fixed; width="100%" style="margin:auto;" cellspacing="0" cellpadding="0" border="0">
      <?php
      require '../menu/menunav.php';
      ?>
    </table>
  </div>

  <div class="main2">
    <form id="myForm" onsubmit="return validateForm()" method="POST" action="insert_user.php">
      <div class="row">
        <div class="col-25">
          <label for="fname">Nombre</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="nombre" placeholder="Ingrese Nombre.." autocomplete="off" required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="fname">inss del Usuario</label>
        </div>
        <div class="col-75">
          <select id="frame" class="frame" name="inss" required>
            <option value="">Seleccione:</option>
            <?php
            while ($row = mysqli_fetch_assoc($query6)) {
              echo "<option value=\"{$row['inss']}\">{$row['inss']}</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Contraseña</label>
        </div>
        <div class="col-75">
          <input type="password" id="password" name="contraseña" placeholder="Ingrese Contraseña.." required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname"> Confrmar Contraseña</label>
        </div>
        <div class="col-75">
          <input type="password" id="confirmPassword" name="confirmar" placeholder="Confirme Contraseña.." required>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="roles">Roles</label>
        </div>
        <div class="col-75">
          <select name="roles">
            <option value="">Seleccione:</option>
            <?php
            while ($row = mysqli_fetch_assoc($query14)) {
              echo "<option value=\"{$row['id']}\">{$row['rol']}</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-75">
          <input type="submit" value="Registrar">
        </div>
      </div>
    </form>
  </div>

</body>

</html>

<script>
  function validateForm() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
      alert("Las contraseñas no coinciden");
      return false;
    }

    // Si las contraseñas coinciden, puedes continuar con el envío del formulario
    return true;
  }
</script>