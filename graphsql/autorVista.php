<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libreria - Autores</title>
    <link rel="stylesheet" href="CSS/css.css">
</head>
<body>
    <header>
        <h1>API-REST-GrahpQL </h1>
        <a href="clienteVista.php" class="btn-clientes">Ir a Clientes</a>
    </header>

    <main>
        <div class="main-container">
            <div class="container-formularios">
                
                <div class="form-box">
                    <h2>Agregar nuevo Autores</h2>
                    <form id_autor="formularioPost">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" placeholder="Nombre autor required">
                        <button type="submit">Crear Autor click </button>
                    </form>
                </div>

                <div class="form-box">
                    <h2>Editar cliente<h2>
                    <form id="formUpdate">
                        <label>ID cliente</label>
                        <input type="number" name="id_cliente_edit" placeholder = "Nuevo id">
                        <label>Nombre:</label>
                        <input type="text" name="nombre_edit" placeholder="Nuevo nombre">
                        <label>Email:</label>
                        <input type="email" name="email_edit" placeholder="Nuevo email">
                        <label>Fecha de nacimiento:</label>
                        <input type="text" name="telefono_edit" placeholder="Nuevo telefono">
                        <button type="submit">Actualizar Datos</button>
                    </form>
                </div>

                <div class="delete-box">
                    <h2>Eliminar Cliente</h2>
                    <input type="number" id="id_pacienteDelete" placeholder="ID del paciente" style="max-width: 200px;">
                    <button class="btn-delete-action" onclick="eliminar cliente()">Eliminar Permanentemente</button>
                </div>
            </div>

            <div class="list-container">
                <h2>Lista de Clientes Registrados</h2>
                <div id="containerPaciente"></div>
            </div>
        </div>
    </main>

    <script src="JS/js.js"></script>
</body>
</html>