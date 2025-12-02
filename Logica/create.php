<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre   = $conn->real_escape_string($_POST['nombre']);
    $email    = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);

    $sql = "INSERT INTO usr (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../inicio.php'); 
        exit();
    } else {
        echo "Error al insertar: " . $conn->error;
    }
}
?>