<?php
require '../conexion.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $coleccion_Autores->insertOne([
    'id_autor' => (int) $_POST['id_autor'],
    'nombre' => $_POST['nombre']
  ]);
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body { background-color: #fee8e8; width: 90%; max-width: 1200px; margin: 0 auto; }
    main { background-color: #ffe0e0; padding: 20px; }
    form { background-color: #fff6f6; border: 1px solid #ddd; border-radius: 5px; padding: 15px; }
  </style>
</head>
<body>
  <main>
    <h2> Nuevo Autor </h2>
    <form method="POST">
      ID Autor: <input type="number" name="id_autor" required><br><br>
      Nombre: <input type="text" name="nombre" required><br><br>
      <button type="submit"> Guardar </button>
    </form>
    <a href="index.php"> <- Volver </a>
  </main>
</body>
</html>