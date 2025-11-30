<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./index.php");
    exit;
}

$usuario = $_SESSION['username'];

$pageTitle = "Inicio";
$favicon = "/favicon.ico";

include "header.php";
?>

<main>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Bienvenido</span>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>