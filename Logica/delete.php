<?php
include('conexion.php');

$id = intval($_GET['id']);

$sql = "DELETE FROM usr WHERE id=$id";
$conn->query($sql);

$check = $conn->query("SELECT COUNT(*) AS total FROM usr");
$row = $check->fetch_assoc();

if ($row['total'] == 0) {
    $conn->query("ALTER TABLE usr AUTO_INCREMENT = 1");
}

header('Location: ../inicio.php');
exit();
?>