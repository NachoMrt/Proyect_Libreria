<?php
require '../conexion.php';
$id = $_GET['id'] ?? null;
if (!$id) { die("ID no válido."); }

$cliente = $coleccion_Clientes->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $coleccion_Clientes->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'id_cliente' => (int)$_POST['id_cliente'],
            'nombre' => $_POST['nombre'],
            'email' => $_POST['email']
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
  <title> Editar Cliente </title>
  <style>
    body { background-color: #fee8e8; width: 90%; max-width: 1200px; margin: 0 auto; }
    main { background-color: #ffe0e0; padding: 20px; }
    form { background-color: #fff6f6; border: 1px solid #ddd; padding: 15px; }
  </style>
</head>
<body>
  <main>
    <h2> Editar Cliente </h2>
    <form method="POST">
      ID Cliente: <input type="number" name="id_cliente" value="<?= $cliente['id_cliente'] ?>" required><br><br>
      Nombre: <input type="text" name="nombre" value="<?= $cliente['nombre'] ?>" required><br><br>
      Email: <input type="email" name="email" value="<?= $cliente['email'] ?>" required><br><br>
      <button type="submit"> Actualizar </button>
    </form>
    <a href="index.php"> Volver </a>
  </main>
</body>
</html>