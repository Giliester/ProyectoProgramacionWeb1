<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./index.php");
    exit;
}

$usuario = $_SESSION['username'];

$pageTitle = "Inicio";
$favicon = "./favicons/C19.ico";

include "header.php";

include "./Logica/conexion.php";
?>

<main>
    <div class="container">

        <div class="card">
            <div class="card-content">
                <span class="card-title">Agregar usuario</span>

                <form action="./Logica/create.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12 m4">
                            <input type="text" id="nombre" name="nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>

                        <div class="input-field col s12 m4">
                            <input type="text" id="telefono" name="telefono">
                            <label for="telefono">Teléfono</label>
                        </div>

                        <div class="input-field col s12 m4">
                            <input type="email" id="email" name="email">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col s12 right-align">
                            <button type="submit" class="btn blue darken-1">
                                Agregar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Lista de usuarios</span>

                <table class="highlight responsive-table" id="tabla-usr">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Editar</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM usr ORDER BY id ASC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0):
                            while ($row = $result->fetch_assoc()):
                        ?>
                        <tr data-id="<?= $row['id'] ?>">
                            <td><?= $row['id'] ?></td>
                            <td class="col-nombre"><?= htmlspecialchars($row['nombre']) ?></td>
                            <td class="col-telefono"><?= htmlspecialchars($row['telefono']) ?></td>
                            <td class="col-email"><?= htmlspecialchars($row['email']) ?></td>
                            <td>
                                <button type="button" class="btn-small amber darken-2 btn-editar">Editar</button>
                                <button type="button" class="btn-small red darken-2 btn-borrar" data-id="<?= $row['id'] ?>">Borrar</button>
                            </td>
                        </tr>
                        <?php
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="5" class="center-align">No hay usuarios registrados.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="col s12 center-align">
                <a href="./logout.php" class="btn red darken-1">Salir</a>
            </div>
        </div>

    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const table = document.querySelector("#tabla-usr");

    table.addEventListener("click", (e) => {

        const row = e.target.closest("tr");
        if (!row) return;

        const id = row.dataset.id;

        if (e.target.classList.contains("btn-borrar")) {
            window.location.href = "./Logica/delete.php?id=" + id;
            return;
        }

        if (e.target.classList.contains("btn-editar") && !row.classList.contains("editando")) {

            row.classList.add("editando");

            const colNombre = row.querySelector(".col-nombre");
            const colTelefono = row.querySelector(".col-telefono");
            const colEmail = row.querySelector(".col-email");

            const n = colNombre.textContent.trim();
            const t = colTelefono.textContent.trim();
            const m = colEmail.textContent.trim();

            colNombre.innerHTML  = `<input type='text'   name='nombre'   value='${n}' class='input-editar'>`;
            colTelefono.innerHTML= `<input type='text'   name='telefono' value='${t}' class='input-editar'>`;
            colEmail.innerHTML   = `<input type='email'  name='email'    value='${m}' class='input-editar'>`;

            e.target.textContent = "Guardar";
            e.target.classList.remove("amber", "darken-2", "btn-editar");
            e.target.classList.add("green", "darken-2", "btn-guardar");

            const btnBorrar = row.querySelector(".btn-borrar");
            btnBorrar.textContent = "Cancelar";
            btnBorrar.classList.remove("btn-borrar", "red", "darken-2");
            btnBorrar.classList.add("btn-cancelar", "grey", "darken-2");

            return;
        }

        if (e.target.classList.contains("btn-guardar")) {

            const nombre = row.querySelector('input[name="nombre"]').value;
            const telefono = row.querySelector('input[name="telefono"]').value;
            const email = row.querySelector('input[name="email"]').value;

            const form = document.createElement("form");
            form.method = "POST";
            form.action = "./Logica/update.php";

            form.innerHTML = `
                <input type="hidden" name="id" value="${id}">
                <input type="hidden" name="nombre" value="${nombre}">
                <input type="hidden" name="telefono" value="${telefono}">
                <input type="hidden" name="email" value="${email}">
            `;

            document.body.appendChild(form);
            form.submit();
            return;
        }

        if (e.target.classList.contains("btn-cancelar")) {
            window.location.reload();
        }

    });
});
</script>

<?php include "footer.php"; ?>
