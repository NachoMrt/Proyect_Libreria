<?php
require '../conexion.php';
$cursor = $coleccion_Autores->find();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title> Listado de Autores </title>
  <style>
    body {
      background-color: #fee8e8;
      width: 90%;
      max-width: 1200px;
      margin: 0 auto;
    }

    main {
      background-color: #ffe0e0;
      padding: 20px;
    }

    .card_autor {
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
    <a href="../index.php"> Volver a Inicio </a>
    <h2> Autores </h2>
    <a href="create.php"> Añadir Autor </a> 
    <br><br>
    <?php foreach ($cursor as $autor): ?>
      <div class="card_autor">
        <p><b>ID Autor:
            <?= $autor['id_autor'] ?? '' ?>
          </b></p>
        <p>Nombre:
          <?= $autor['nombre'] ?? '' ?>
        </p>
        <p>
          <a href="update.php?id=<?= $autor['_id'] ?>"> Editar </a> |
          <a href="delete.php?id=<?= $autor['_id'] ?>"> Eliminar </a>
        </p>
      </div>
    <?php endforeach; ?>
  </main>
</body>

</html>