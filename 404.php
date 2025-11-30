<?php
http_response_code(404);
$pageTitle = "Página no encontrada";
$favicon = "./favicons/C9.ico";
include "header.php";
?>
<div class="container">
    <div class="card red lighten-4">
        <div class="card-content">
            <span class="card-title red-text text-darken-4">404 – Página no encontrada</span>
            <p>La página que estás buscando no existe o fue movida.</p>
        </div>
        <div class="card-action">
            <a href="/" class="btn blue">Volver al inicio</a>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>