<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Gestión de Clientes</title>
</head>

<body>

  <!-- GET: Lista de Clientes -->
  <h1>Lista de Clientes</h1>
  <ul id="listaClientes"></ul>

  <script>
    fetch('http://localhost/Certificado/REST/public/index.php/clientes')
      .then(response => response.json())
      .then(data => {
        const lista = document.getElementById('listaClientes');
        data.forEach(cliente => {
          lista.innerHTML += `<li>${cliente.id_cliente} - ${cliente.nombre} - ${cliente.email} - ${cliente.telefono}</li>`;
        });
      });
  </script>

  <!-- POST: Crear Cliente -->
  <h2>Agregar Cliente</h2>
  <form id="formCrearCliente">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="telefono" placeholder="Teléfono">
    <button type="submit">Guardar</button>
  </form>

  <script>
    document.getElementById("formCrearCliente").addEventListener("submit", function(e) {
      e.preventDefault();

      fetch('http://localhost/Certificado/REST/public/index.php/clientes', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            nombre: this.nombre.value,
            email: this.email.value,
            telefono: this.telefono.value
          })
        })
        .then(response => response.json())
        .then(data => {
          alert("Cliente agregado correctamente");
          location.reload(); //recarga para que muestre la lista actualizada
        })
        .catch(error => console.error("Error:", error));
    });
  </script>

  <!-- PUT: Actualizar Cliente -->
  <h2>Actualizar Cliente</h2>
  <form id="formActualizarCliente">
    <input type="number" name="id_cliente" placeholder="ID Cliente" required>
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="telefono" placeholder="Teléfono">
    <button type="submit">Actualizar</button>
  </form>

  <script>
    document.getElementById("formActualizarCliente").addEventListener("submit", function(e) {
      e.preventDefault();
      const id = this.id_cliente.value;

      fetch(`http://localhost/Certificado/REST/public/index.php/clientes/${id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            nombre: this.nombre.value,
            email: this.email.value,
            telefono: this.telefono.value
          })
        })
        .then(response => response.json())
        .then(data => {
          alert("Cliente actualizado correctamente");
          location.reload();
        })
        .catch(error => console.error("Error:", error));
    });
  </script>

  <!-- DELETE: Eliminar Cliente -->
  <h2>Eliminar Cliente</h2>
  <input type="number" id="idEliminarCliente" placeholder="ID Cliente">
  <button onclick="eliminarCliente()">Eliminar</button>

  <script>
    function eliminarCliente() {
      const id = document.getElementById("idEliminarCliente").value;

      fetch(`http://localhost/Certificado/REST/public/index.php/clientes/${id}`, {
          method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
          alert("Cliente eliminado correctamente");
          location.reload();
        })
        .catch(error => console.error("Error:", error));
    }
  </script>

</body>

</html>