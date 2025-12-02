<?php
$host = 'localhost';
$user = 'pAdmin';
$pass = 'C-12345';
$db = 'pweb1';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexion con error: " . $conn->connect_error);
}
?>