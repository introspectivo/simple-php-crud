<?php require_once('includes/db.inc.php'); ?>
<?php require_once('partials/head.php'); ?>
<?php require_once('partials/navbar.php'); ?>

<main class="container mt-5">

    <h3>Marque el criterio para ordenar los datos:</h3>
    <form action="ordenar" method="POST">

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="id">ID</label>
            <input class="form-check-input" type="radio" name="criterio" value="id" id="id" />
        </div>

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="nombre">Nombre</label>
            <input class="form-check-input" type="radio" name="criterio" value="nombre" id="nombre" />
        </div>

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="apellidos">Apellidos</label>
            <input class="form-check-input" type="radio" name="criterio" value="apellidos" id="apellidos" />
        </div>

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="ciudad">Ciudad</label>
            <input class="form-check-input" type="radio" name="criterio" value="ciudad" id="ciudad" />
        </div>

        <div class="form-check form-check-inline">
            <label class="form-check-label" for="edad">Edad</label>
            <input class="form-check-input" type="radio" name="criterio" value="edad" id="edad" />
        </div>

        <button type="submit" name="accion" class="btn btn-primary">Ordenar</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>

    </form>

    <?php if (isset($_POST['accion'])) : ?>

        <?php if (isset($_POST['criterio'])) : ?>

            <?php $results = $conn->query("SELECT * FROM contacto ORDER BY {$_POST['criterio']}"); ?>

            <table class="table table-dark table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Edad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($results)) : ?>
                        <tr>
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

        <?php else : ?>

            <div class="container alert alert-danger mt-3 px-5" role="alert">
                Introduzca un criterio de ordenado
            </div>

        <?php endif; ?>

    <?php endif; ?>


</main>


<?php require_once('partials/footer.php'); ?>
