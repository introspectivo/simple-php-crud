<?php require_once('includes/db.inc.php'); ?>
<?php require_once('partials/head.php'); ?>
<?php require_once('partials/navbar.php'); ?>

<?php
if (isset($_POST['borrados'])) {
    foreach ($_POST['borrados'] as $valor) {
        $stmt = $conn->prepare($borrar);
        $stmt->bind_param('i', $valor);
        $stmt->execute();
    }
}
?>

<main class="container">

    <form action="borrar" method="POST">

        <div class="container mt-2">
            <h3>Marque que registros desea borrar:</h3>
            <button type="submit" name="accion" id="btnBorrar" class="btn btn-primary mt-1">Borrar</button>
            <button type="reset" class="btn btn-danger mt-1">Desmarcar</button>
        </div>

        <div id="divError" style="display:none" class="container alert alert-danger mt-3 px-5" role="alert">
            ¡Debe de borrar al menos un registro!
        </div>

        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th class="col"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Edad</th>
                </tr>
            </thead>
            <tbody>

                <?php $results = $conn->query($select_all); ?>

                <?php while ($fila = mysqli_fetch_array($results)) : ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="borrados[]" value=<?php echo $fila['id']; ?> class="custom-control-input">
                        </td>
                        <th scope="row">
                            <?php echo $fila['id']; ?>
                        </th>
                        <td>
                            <?php echo $fila['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $fila['apellidos']; ?>
                        </td>
                        <td>
                            <?php echo $fila['ciudad']; ?>
                        </td>
                        <td>
                            <?php echo $fila['edad']; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </form>

</main>

<script src="./js/borrar.js"></script>
<?php require_once('partials/footer.php'); ?>
