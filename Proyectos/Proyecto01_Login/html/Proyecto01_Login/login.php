<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'db.php';

$mail = $_POST['mail'] ?? '';
$password = $_POST['password'] ?? '';

if (!$mail || !$password) {
    die("Por favor, completa todos los campos.");
}

$mail = mysqli_real_escape_string($conn, $mail);
$query = "SELECT * FROM usuarios WHERE mail = '$mail' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // Si la contraseña está cifrada con password_hash
    if (password_verify($password, $user['password'])) {
        $_SESSION['usuario'] = $user['nombre'];
        // Redirección limpia
        header("Location: main.php");
        exit;
    } else {
        echo "❌ Contraseña incorrecta.";
    }
} else {
    echo "❌ Usuario no encontrado.";
}

mysqli_close($conn);


