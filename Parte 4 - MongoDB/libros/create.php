<?php
require '../conexion.php'; // Sube un nivel para acceder a la conexión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $coleccion_Libros->insertOne([
        'id_libro' => (int) $_POST['id_libro'],
        'titulo' => $_POST['titulo'],
        'genero' => $_POST['genero'],
        'precio' => (float) $_POST['precio'],
        'id_autor' => (int) $_POST['id_autor']
    ]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Añadir Libro </title>
    <style>
        body {
            background-color: #fee8e8;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        main {
            background-color: #ffe0e0;
            margin: 0 auto;
            padding: 20px;
        }

        form {
            background-color: #fff6f6;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <main>
        <h2> Nuevo Libro </h2>
        <form method="POST">
            ID libro: <input type="number" name="id_libro" required><br><br>
            Título: <input type="text" name="titulo" required><br><br>
            Género: <input type="text" name="genero" required><br><br>
            Precio: <input type="number" step="0.01" name="precio" required><br><br>
            ID Autor: <input type="number" name="id_autor" required><br><br>
            <button type="submit"> Guardar </button>
        </form>
        <br>
        <a href="index.php"> <- Volver </a>
    </main>
</body>

</html>