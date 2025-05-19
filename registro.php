<?php
require_once 'config.php';

$usuario = $_POST['usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

$stmt = $conexion->prepare("INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $contrasena);

if ($stmt->execute()) {
    echo "Registro exitoso. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
