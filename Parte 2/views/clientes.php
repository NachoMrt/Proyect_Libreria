<h1>Clientes</h1>
<a href="index.php?controller=clientes&action=create">Agregar Cliente</a>
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
                <a href="index.php?controller=clientes&action=edit&id=<?= $cliente['id_cliente'] ?>">Editar</a> |
                <a href="index.php?controller=clientes&action=delete&id=<?= $cliente['id_cliente'] ?>" onclick="return confirm('¿Eliminar este cliente?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>