<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f3e1f2; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h1>Listado de Libros</h1>
    <a href="frontController.php?controller=libros&action=create">Agregar Libro</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Género</th>
            <th>Precio</th>
            <th>Autor</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($libros as $libro): ?>
            <tr>
                <td><?= $libro['id_libro'] ?></td>
                <td><?= $libro['titulo'] ?></td>
                <td><?= $libro['genero'] ?></td>
                <td>$<?= number_format($libro['precio'], 2) ?></td>
                <td><?= $libro['nombre_autor'] ?></td>
                <td>
                    <a href="frontController.php?controller=libros&action=edit&id=<?= $libro['id_libro'] ?>">Editar</a> |
                    <a href="frontController.php?controller=libros&action=delete&id=<?= $libro['id_libro'] ?>" onclick="return confirm('¿Eliminar este libro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>