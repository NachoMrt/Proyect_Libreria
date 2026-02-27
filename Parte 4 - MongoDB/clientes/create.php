<?php
require '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $coleccion_Clientes->insertOne([
    'id_cliente' => (int) $_POST['id_cliente'],
    'nombre'     => $_POST['nombre'],
    'email'      => $_POST['email']
  ]);
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Añadir Cliente </title>
  <style>
    body { background-color: #fee8e8; width: 90%; max-width: 1200px; margin: 0 auto; }
    main { background-color: #ffe0e0; margin: 0 auto; padding: 20px; }
    form { background-color: #fff6f6; border: 1px solid #ddd; border-radius: 5px; padding: 15px; margin-bottom: 10px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); }
  </style>
</head>
<body>
  <main>
    <h2> Nuevo Cliente </h2>
    <form method="POST">
      ID Cliente: <input type="number" name="id_cliente" required><br><br>
      Nombre completo: <input type="text" name="nombre" required><br><br>
      Correo electrónico: <input type="email" name="email" required><br><br>
      <button type="submit"> Guardar </button>
    </form>
    <br>
    <a href="index.php"> <- Volver </a>
  </main>
</body>
</html>