<?php
session_start();
require_once 'config.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hash_contrasena);
    $stmt->fetch();
    if (password_verify($contrasena, $hash_contrasena)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: bienvenida.php");
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conexion->close();
?>
