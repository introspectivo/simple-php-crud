<?php require_once('includes/db.inc.php'); ?>
<?php require_once('partials/head.php'); ?>
<?php require_once('partials/navbar.php'); ?>


<?php if (!isset($_POST['accion'])) : ?>

    <main class="container mt-5">
        <form action="insertar" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" name="nombre" class="form-control" id="form">
                <div class="form-text">El ID se asigna automáticamente.</div>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos: </label>
                <input type="text" name="apellidos" class="form-control" id="apellidos">
            </div>
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad:</label>
                <input type="text" name="ciudad" class="form-control" id="ciudad">
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad: </label>
                <input type="number" name="edad" class="form-control" id="edad">
            </div>

            <button type="submit" name="accion" class="btn btn-primary">Añadir</button>
            <button type="reset" class="btn btn-danger">Borrar</button>

        </form>
    </main>

<?php else : ?>

    <?php

    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $ciudad = $conn->real_escape_string($_POST['ciudad']);
    $edad = $conn->real_escape_string($_POST['edad']);

    $stmt = $conn->prepare($insertar);
    $stmt->bind_param('sssi', $nombre, $apellidos, $ciudad, $edad);
    $error = ($stmt->execute()) ? false : true;

    $_POST = [];
    ?>

    <?php if ($error) : ?>

        <div class="container alert alert-danger mt-5 px-5" role="alert">
            Error inesperado en la inserción del registro.
            <a href="insertar" class="alert-link">Volver a añadir más</a>
        </div>

    <?php else : ?>
        <div class="container alert alert-success mt-5" role="alert">
            Registro insertado correctamente.
            <a href="insertar" class="alert-link">Volver a añadir más</a>
        </div>
    <?php endif; ?>



<?php endif; ?>



<?php require_once('partials/footer.php'); ?>
