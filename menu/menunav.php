<!doctype html>
<html>

<head>
  <title> Menu Seguridad
  </title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/DGLP/menu/menu.css">
  <script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: "Lato", sans-serif;
      height: 90vh;
      min-width: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: top;
      position: relative;
    }

    /* Fixed sidenav, full height */
    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #827777;
      overflow-x: hidden;
      padding-top: 20px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 16px;
      color: #C0BEBE;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover,
    .dropdown-btn:hover {
      color: #f1f1f1;
    }

    /* Main content */
    .main {
      margin-left: 200px;
      /* Same as the width of the sidenav */
      font-size: 15px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;

    }

    .main2 {

      margin-left: 200px;
      /* Same as the width of the sidenav */
      font-size: 15px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active {
      background-color: red;
      color: white;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
      display: none;
      background-color: #262626;
      padding-left: 8px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
      float: right;
      padding-right: 8px;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>
</head>

<body>

  <div class="sidenav">
    <a style="color:white;" href="#about"><i class="fa-solid fa-house"></i>

      <b>

        <?php
        session_start();
        $usuario = ($_SESSION['usuario']);

        if (!isset($usuario)) {
          header("location: /DGLP/usuarios/login/index.html");
          exit();
        }

        $conexion = mysqli_connect("localhost", "root", "123456789", "los_cocos");

        if (!$conexion) {
          die("Error de conexión: " . mysqli_connect_error());
        }

        $consulta = "SELECT usuario, rol FROM usuarios WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
          $fila = mysqli_fetch_assoc($resultado);
          $rol = $fila['rol'];
          $_SESSION['rol'] = $rol;

          // Puedes acceder a $correo y $idrol en cualquier página después de iniciar sesión
          echo "$usuario";
          mysqli_free_result($resultado);
          mysqli_close($conexion);
        } else {
          header("location: /DGLP/usuarios/login/index.html");
          exit();
        }

        ?>
      </b></a>
    <!--<a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>-->

    <?php
    if ($rol == 2) {
      echo '<button class="dropdown-btn"><i class="fa-solid fa-user"></i>Asistencia
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/asistencia/entrada.php">Entrada</a></li>';
      echo '<a href="/DGLP/asistencia/salida.php">Salida</a></li>';
      echo '</div>';

      echo '<button class="dropdown-btn"><i class="fa-solid fa-handshake-angle"></i>Voluntarios
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/asistencia/entrada_voluntario.php">Entrada</a></li>';
      echo '<a href="/DGLP/asistencia/salida_voluntario.php">Salida</a></li>';
      echo '</div>';
    } elseif ($rol == 3) {
      echo '<button class="dropdown-btn"><i class="fa-solid fa-truck-field"></i>Recolección Domiciliar
    <i class="fa fa-caret-down"></i>
      </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/limpieza/limpieza2.php">Roles de Ruta</a>';
      echo '<a href="/DGLP/limpieza/detalle_limpieza.php">Registro Diario</a>';
      echo '</div>';
    } else {

      echo '<button class="dropdown-btn"><i class="fa-solid fa-gauge"></i> Dashboard
    <i class="fa fa-caret-down"></i>
      </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/dashboard/limpieza/dashboard.php">Recoleccion Domiciliar</a>';
      echo '<a href="/DGLP/dashboard/asistencia/dashboard.php">Asistencia</a>';
      echo '</div>';

      echo '<button class="dropdown-btn"><i class="fa-solid fa-people-group"></i> Administracion
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/personal/asistencia/asistencia.php">Asistencia</a>';
      echo '<a href="/DGLP/personal/nomina/nomina.php">Nomina</a>';
      echo '<a href="/DGLP/personal/nomina/NuevoTrabajador.php">Trabajador Nuevo</a>';
      echo '</div>';

      echo '<button class="dropdown-btn"><i class="fa-solid fa-truck-field"></i>Recolección Domiciliar
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/limpieza/limpieza2.php">Roles de Ruta</a>';
      echo '<a href="/DGLP/limpieza/detalle_limpieza.php">Registro Diario</a>';
      echo '</div>';

      echo '<button class="dropdown-btn"><i class="fa-solid fa-gear"></i>Transferencia
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/transferencia/transferencia2.php">Roles de Equipo</a>';
      echo '<a href="/DGLP/transferencia/detalle_transferencia.php">Registro Diario</a>';
      echo '</div>';

      echo '<button class="dropdown-btn"><i class="fa-solid fa-truck-front"></i></i> Control de Equipos
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/equipos/estado_equipos.php">Estado de flota</a></li>';
      echo '<a href="">Control de Combustible</a></li>';
      echo '</div>';

      echo '<button class="dropdown-btn"><i class="fa-solid fa-desktop"></i> Catalogo
  <i class="fa fa-caret-down"></i>
    </button>';
      echo '<div class="dropdown-container">';
      echo '<a href="/DGLP/catalogo/centros.php">Centros de Atencion</a></li>';
      echo '<a href="">Agregar equipos</a></li>';
      echo '<a href="/DGLP/registro_usuario/registro_usuario.php">Registrar Usuario</a>';
      echo '</div>';
    }
    ?>
    <a href="/DGLP/menu/Salir.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Salir</a>
  </div>

  <div class="main">
    <table table-layout=fixed; width="100%" style="float:right;" cellspacing="0" cellpadding="0" border="0">

      <?php
      include("pagina7.php")
      ?>
    </table>
  </div>


  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>

</body>

</html>