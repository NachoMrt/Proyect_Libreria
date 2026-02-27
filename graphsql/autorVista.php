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
        <a href="medicoVista.php" class="btn-pacientes">Ir a Clientes</a>
    </header>

    <main>
        <div class="main-container">
            <div class="container-formularios">
                
                <div class="form-box">
                    <h2>Agregar nuevo Autores</h2>
                    <form id="formularioPost">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" placeholder="Nombre paciente" required>
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="email" required>
                        <label>Fecha de nacimiento:</label>
                        <input type="text" name="fecha_nacimiento" placeholder="YYYY-MM-DD">
                        <label>Teléfono:</label>
                        <input type="text" name="telefono" placeholder="Telefono">
                        <button type="submit">Crear Paciente</button>
                    </form>
                </div>

                <div class="form-box">
                    <h2>Editar paciente</h2>
                    <form id="formUpdate">
                        <label>ID paciente:</label>
                        <input type="number" name="id_paciente_edit" placeholder="ID a editar" required>
                        <label>Nombre:</label>
                        <input type="text" name="nombre_edit" placeholder="Nuevo nombre">
                        <label>Email:</label>
                        <input type="email" name="email_edit" placeholder="Nuevo email">
                        <label>Fecha de nacimiento:</label>
                        <input type="text" name="fecha_nacimiento_edit" placeholder="YYYY-MM-DD">
                        <label>Teléfono:</label>
                        <input type="text" name="telefono_edit" placeholder="Nuevo telefono">
                        <button type="submit">Actualizar Datos</button>
                    </form>
                </div>

                <div class="delete-box">
                    <h2>Eliminar Paciente</h2>
                    <input type="number" id="id_pacienteDelete" placeholder="ID del paciente" style="max-width: 200px;">
                    <button class="btn-delete-action" onclick="eliminarPaciente()">Eliminar Permanentemente</button>
                </div>
            </div>

            <div class="list-container">
                <h2>Lista de Pacientes Registrados</h2>
                <div id="containerPaciente"></div>
            </div>
        </div>
    </main>

    <script src="JS/js.js"></script>
</body>
</html>