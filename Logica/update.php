<?php
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = intval($_POST['id']);
    $nombre   = $conn->real_escape_string($_POST['nombre']);
    $email    = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);

    $sql = "UPDATE usr 
            SET nombre='$nombre', email='$email', telefono='$telefono'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../inicio.php');
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>