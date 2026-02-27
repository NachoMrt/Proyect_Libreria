<h1>Autores</h1>
<a href="frontController.php?controller=Autor&action=create">Agregar Autor</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fecha de Nacimiento</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($autores as $autor): ?>
        <tr>
            <td><?= $autor['id_autor'] ?></td>
            <td><?= $autor['nombre'] ?></td>
            <td><?= $autor['fecha_nacimiento'] ?></td>
            <td>
                <a href="frontController.php?controller=Autor&action=edit&id=<?= $autor['id_autor'] ?>">Editar</a> |
                <a href="frontController.php?controller=Autor&action=eliminar&id=<?= $autor['id_autor'] ?>" onclick="return confirm('¿Eliminar este autor?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="frontController.php?controller=Cliente&action=index">Ver Clientes</a><br>
<a href="frontController.php?controller=Libro&action=index">Ver Libros</a>