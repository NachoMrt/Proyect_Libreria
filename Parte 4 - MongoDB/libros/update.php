<?php
require '../conexion.php';

$id = $_GET['id'] ?? null;
if (!$id) { die("ID no válido."); }

$libro = $coleccion_Libros->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $coleccion_Libros->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'id_libro' => (int)$_POST['id_libro'],
            'titulo'   => $_POST['titulo'],
            'genero'   => $_POST['genero'],
            'precio'   => (float)$_POST['precio'],
            'id_autor' => (int)$_POST['id_autor']
        ]]
    );
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Editar Libro </title>
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
    <h2> Editar Libro </h2>
    <form method="POST">
      ID libro: <input type="number" name="id_libro" value="<?= $libro['id_libro'] ?>" required><br><br>
      Título: <input type="text" name="titulo" value="<?= $libro['titulo'] ?>" required><br><br>
      Género: <input type="text" name="genero" value="<?= $libro['genero'] ?>" required><br><br>
      Precio: <input type="number" step="0.01" name="precio" value="<?= $libro['precio'] ?>" required><br><br>
      ID Autor: <input type="number" name="id_autor" value="<?= $libro['id_autor'] ?>" required><br><br>
      <button type="submit"> Actualizar </button>
    </form>
    <br>
    <a href="index.php"> Volver </a>
  </main>
</body>
</html>