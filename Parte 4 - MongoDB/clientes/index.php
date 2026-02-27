<?php
require '../conexion.php';
$cursor_clientes = $coleccion_Clientes->find();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> Gestión de Clientes </title>
  <style>
    body { background-color: #fee8e8; width: 90%; max-width: 1200px; margin: 0 auto; }
    main { background-color: #ffe0e0; margin: 0 auto; padding: 20px; }
    .card_pedido { background-color: #fff6f6; border: 1px solid #ddd; border-radius: 5px; padding: 15px; margin-bottom: 10px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); }
  </style>
</head>
<body>
  <main>
    <a href="../index.php"> Volver a Inicio </a>
    <h2> Búsqueda de Cliente </h2>
    <form method="POST">
      ID del cliente: <input type="number" name="id_cliente" required><br><br>
      <button type="submit"> Buscar </button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $id_busqueda = (int)$_POST['id_cliente'];
      $busqueda = $coleccion_Clientes->find(['id_cliente' => $id_busqueda]);
      
      echo "<h3> Resultado </h3>";
      foreach ($busqueda as $c) {
          echo "Encontrado: <b>" . $c['nombre'] . "</b> (" . $c['email'] . ")<br>";
      }
    }
    ?>
    <br>
    <h2> Listado de Clientes </h2>
    <a href="create.php"> Añadir cliente </a> 
    <br><br>

    <?php foreach ($cursor_clientes as $cliente): ?>
      <div class="card_pedido">
        <p><b>ID Cliente: <?= $cliente['id_cliente'] ?? '' ?></b></p>
        <p>Nombre: <?= $cliente['nombre'] ?? '' ?></p>
        <p>Email: <?= $cliente['email'] ?? '' ?></p>
        <p>
          <a href="update.php?id=<?= $cliente['_id'] ?>"> Editar </a> |
          <a href="delete.php?id=<?= $cliente['_id'] ?>"> Eliminar </a>
        </p>
      </div>
    <?php endforeach; ?>
  </main>
</body>
</html>