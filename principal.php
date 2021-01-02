<!--
¿Con prepare statement hace falta escape_string()?
Hacer CRUD con PDO y POO junto con Ajax
Ver por que el footer no aparece al error conexion bd form en index.php

Hacer que el objeto mysqli sea global a todos los scripts, una vez se han metido los parametros del formulario
no meterlos a mano
Prueba git
-->
<?php require_once('includes/db.inc.php'); ?>
<?php require_once('partials/head.php'); ?>
<?php require_once('partials/navbar.php'); ?>

<main class="container">

    <table class="table table-dark table-hover mt-5">
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

            <?php $results = $conn->query($select_all); ?>

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

</main>

<?php require_once('partials/footer.php'); ?>
