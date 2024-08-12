<?php
session_start();

session_destroy();
header("Location:/DGLP/usuarios/login/index.html");
?>