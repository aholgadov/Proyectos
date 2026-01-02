
<?php
$host = 'localhost';
$user = 'aleix';
$pass = 'Ainhoa@050617';
$db   = 'DB_CMDB';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>