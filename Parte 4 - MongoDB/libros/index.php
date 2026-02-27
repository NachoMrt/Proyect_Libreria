<?php
require '../conexion.php';
$cursor_libros = $coleccion_Libros->find();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title> CRUD Libros - MongoDB </title>
  <style>
    body { background-color: #e8f4fe; width: 90%; max-width: 1200px; margin: 0 auto; font-family: sans-serif; }
    main { background-color: #e0f0ff; padding: 20px; }
    .card_libro { background-color: #f6faff; border: 1px solid #ddd; border-radius: 5px; padding: 15px; margin-bottom: 10px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
  </style>
</head>
<body>
  <main>
    <h2> Búsqueda por ID de Libro </h2>
    <form method="POST">
      ID del libro: <input type="number" name="id_libro" required>
      <button type="submit"> Buscar </button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $id_buscar = (int)$_POST['id_libro'];
      $busqueda = $coleccion_Libros->find(['id_libro' => $id_buscar]);

      echo "<h3> Resultado de búsqueda </h3>";
      foreach ($busqueda as $l) {
          echo "Libro encontrado: <b>" . $l['titulo'] . "</b> - " . $l['genero'] . " (" . $l['precio'] . "€)<br>";
      }
    }
    ?>
    <br>
    <h2> Listado de Biblioteca </h2>
    <a href="create.php"> + Añadir nuevo libro </a> | <a href="../index.php"> Inicio </a>
    <br><br>

    <?php foreach ($cursor_libros as $libro): ?>
      <div class="card_libro">
        <p><b>ID Libro: <?= $libro['id_libro'] ?></b></p>
        <p>Título: <b><?= $libro['titulo'] ?></b></p>
        <p>Género: <?= $libro['genero'] ?> | Precio: <?= $libro['precio'] ?>€</p>
        <p>
          <a href="update.php?id=<?= $libro['_id'] ?>"> Editar </a> |
          <a href="delete.php?id=<?= $libro['_id'] ?>" onclick="return confirm('¿Eliminar libro?')"> Eliminar </a>
        </p>
      </div>
    <?php endforeach; ?>
  </main>
</body>
</html>