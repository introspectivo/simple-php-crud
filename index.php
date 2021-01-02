<?php require_once('includes/consultas.inc.php'); ?>
<?php
session_start();
// if (isset($_SESSION['conexion'])) {
//     header('Location: principal.php');
// }
preFormato($_SESSION);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>


    <?php if (!isset($_POST['accion'])) : ?>

        <div class="container mt-5">
            <h1>Conexión Panel MySQL</h1>

            <form action="." method="POST">
                <div class="mb-3">
                    <label for="host" class="form-label">Host: </label>
                    <input type="text" name="host" class="form-control" id="text" placeholder="localhost">
                </div>
                <div class="mb-3">
                    <label for="port" class="form-label">Puerto: </label>
                    <input type="number" name="port" class="form-control" id="port" placeholder="3306">
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario: </label>
                    <input type="text" name="user" class="form-control" id="user">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Contraseña: </label>
                    <input type="password" name="pwd" class="form-control" id="pwd">
                </div>

                <button type="submit" name="accion" class="btn btn-primary">Conectar</button>
                <button type="reset" class="btn btn-danger">Borrar</button>
            </form>
        </div>

    <?php else : ?>

        <?php $conn = @new mysqli("{$_POST['host']}:{$_POST['port']}", $_POST['user'], $_POST['pwd']); ?>

        <?php if (!$conn->connect_error) : ?>

            <?php
            $_SESSION['conexion'] = 1;
            foreach ($_POST as $clave => $valor) {
                $_SESSION[$clave] = $valor;
            }
            ?>

            <div class="container alert alert-success mt-5" role="alert">
                Conexión establecida <?php echo $conn->host_info; ?>
                <a href="principal" class="alert-link">Ir al panel de administración</a>
            </div>

        <?php else : ?>

            <div class="container alert alert-danger mt-5 px-5" role="alert">
                Error al establecer la conexión: <?php echo $conn->connect_error; ?>
                <a href="." class="alert-link">Volverlo a intentar</a>
            </div>

        <?php endif; ?>

        <?php $conn->close(); ?>

    <?php endif; ?>



    <?php require_once('partials/footer.php'); ?>


    <?php
    function preFormato($var)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
    ?>
