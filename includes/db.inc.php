<?php require_once('consultas.inc.php'); ?>

<?php
session_start();

if (!isset($_SESSION['conexion'])) {
    header('Location: .');
} else {

    $host = $_SESSION['host'];
    $port = $_SESSION['port'];
    $user = $_SESSION['user'];
    $pwd = $_SESSION['pwd'];

    $conn = new mysqli("$host:$port", $user, $pwd) or die('Error conexión BBDD');

    $conn->select_db("agenda") or die('No se ha podido seleccionar la BD');
    $conn->set_charset("utf8mb4");

    $conn->query($crear_tabla) or die('Error al crear la tabla');
}
