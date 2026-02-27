<?php
require '../conexion.php';

$id = $_GET['id'] ?? null;
if (!$id) { die("ID no válido."); }

$autor = $coleccion_Autores->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $coleccion_Autores->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'id_autor' => (int)$_POST['id_autor'],
            'nombre'   => $_POST['nombre']
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
  <title> Editar Autor </title>
  <style>
    body { background-color: #fee8e8; width: 90%; max-width: 1200px; margin: 0 auto; }
    main { background-color: #ffe0e0; margin: 0 auto; padding: 20px; }
    form { background-color: #fff6f6; border: 1px solid #ddd; border-radius: 5px; padding: 15px; margin-bottom: 10px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); }
  </style>
</head>
<body>
  <main>
    <h2> Editar Autor </h2>
    <form method="POST">
      ID Autor: <input type="number" name="id_autor" value="<?= $autor['id_autor'] ?>" required><br><br>
      Nombre: <input type="text" name="nombre" value="<?= $autor['nombre'] ?>" required><br><br>
      <button type="submit"> Actualizar </button>
    </form>
    <br>
    <a href="index.php"> Volver </a>
  </main>
</body>
</html>