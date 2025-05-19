<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo "Hola, " . $_SESSION['usuario'];
    echo "<br><a href='logout.php'>Cerrar sesión</a>";
} else {
    echo "No está autenticado. Por favor <a href='login.html'>inicie sesión</a>";
}
?>
