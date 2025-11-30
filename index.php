<?php
$pageTitle = "Login";
$favicon = "./favicons/C4.ico";
include "header.php";
?>

<main>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Iniciar sesión</span>

                <form action="./Logica/ValidarLogin.php" method="POST">
                    <div class="input-field">
                        <input type="text" name="nombre_usuario" id="nombre_usuario" required>
                        <label for="nombre_usuario">Nombre de usuario</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="password" id="password" required>
                        <label for="password">Contraseña</label>
                    </div>

                    <button type="submit" class="btn blue darken-1">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php"; ?>