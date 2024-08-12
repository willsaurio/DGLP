<!doctype html>
<html>
<head>
<title> Menu Seguridad
</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/DGLP/menu/menu.css">
<link rel="stylesheet" href="/DGLP/css/bootstrap.css">
<script src="/DGLP/menu/estilo.js" crossorigin="anonymous"></script>

<style>
body {
  font-family: "Lato", sans-serif;
  background-image: url("/DGLP/css/icons/DGLP2.PNG");
  height: 100vh; /* Cambiado a 100vh para ocupar el 100% de la altura de la pantalla */
  width: 100%; /* Agregado para ocupar el 100% del ancho de la pantalla */
  margin: 0; /* Elimina el margen predeterminado del cuerpo para un mejor ajuste */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  overflow: hidden; /* Asegura que no haya desbordamiento de contenido */
}


/* Fixed sidenav, full height */

</style>
</head>

<body>
<div class="main">
<table table-layout=fixed;  max-width="100%" cellspacing="0" cellpadding="0" border="0">
    <?php
    require 'menunav.php';
    ?>
</table>
</div>
</body>
</html>