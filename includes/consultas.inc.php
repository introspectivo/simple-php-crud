<?php

$crear_bd = 'CREATE DATABASE IF NOT EXISTS agenda;';

$crear_tabla = 'CREATE TABLE IF NOT EXISTS contacto ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(128) NOT NULL, `apellidos` VARCHAR(128) NOT NULL , `ciudad` VARCHAR(128) NOT NULL , `edad` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';

$insertar = 'INSERT INTO contacto (nombre, apellidos, ciudad, edad) VALUES (?, ?, ?, ?)';

$select_all = 'SELECT * FROM contacto';

$borrar = 'DELETE FROM contacto WHERE id = ?';
