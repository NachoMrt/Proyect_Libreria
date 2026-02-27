<?php
require __DIR__ . '/vendor/autoload.php'; 

$cliente = new MongoDB\Client("mongodb+srv://percy_meruvia:mongoDB10.1@cluster0.asq3hgy.mongodb.net/");
$bd = $cliente->libreria_db;

// Base de datos para cada tabla
$coleccion_Libros = $bd->libros;
$coleccion_Autores = $bd->autores;
$coleccion_Clientes = $bd->clientes;
?>