<?php
session_start(); // Asegúrate de llamar a session_start() al inicio del archivo PHP

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['documento'])) {
    // El usuario ha iniciado sesión, destruir la sesión
    session_destroy();
    // Redirigir a la página de inicio de sesión o a la página principal
    header("Location:../../index.php"); // Cambia "inicio_sesion.php" al nombre de tu página de inicio de sesión o a la página principal
    exit();
}
?>
