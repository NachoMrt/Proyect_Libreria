<h1>Clientes</h1>
<a href="frontController.php?controller=Cliente&action=crear">Agregar Cliente</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($clientes as $cliente): ?>
        <tr>
            <td><?= $cliente['id_cliente'] ?></td>
            <td><?= $cliente['nombre'] ?></td>
            <td><?= $cliente['email'] ?></td>
            <td><?= $cliente['telefono'] ?></td>
            <td>
                <a href="frontController.php?controller=Cliente&action=edit&id=<?= $cliente['id_cliente'] ?>">Editar</a> |
                <a href="frontController.php?controller=Cliente&action=eliminar&id=<?= $cliente['id_cliente'] ?>" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="frontController.php?controller=Autor&action=index">Ver Autores</a><br>
<a href="frontController.php?controller=Libro&action=index">Ver Libros</a>

