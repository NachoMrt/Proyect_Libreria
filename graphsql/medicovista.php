
<!DOCTYPE html>
<html>
<body>

<a href='../Equipo_D_GraphQl/graphQL/index.php'> VOLVER a INICIO </a><br/>
<!-- <h1>  </h1>

<form id="formuLogin" method="POST">
  <input type="email" name="emailLg" placeholder="Email"><br/><br/>
  <input type="password" name="passwordLg" placeholder="Password"><br><br/>
  <button type="submit"> Logearte </button>
</form>
<script>
const formLg = document.getElementById("formuLogin");
formLg.addEventListener("submit", function(e){
  e.preventDefault();
	
  fetch('/../certificado/PHP/Equipo_D_GraphQl/graphQL', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
	  email: this.emailLg.value,
	  password: this.passwordLg.value
    })
  })
  .then(res => res.json())
  .then(data => localStorage.setItem('token', data.token))
  .then(() => { formLg.reset(); })
});
</script> -->
<br/>

<!-- GET lista de medicos registrados-->
<h1> Lista de medicos </h1>
<ul id="lista"></ul>
<script>
const query = "query {medico {id_medico nombre especialidad id_departamento}"
fetch('/../certificado/PHP/Equipo_D_GraphQl/graphQL/index.php', {
		method: 'POST',
		headers: { 
						'Content-Type' : 'aplication/json'
		},
    body: JSON.stringify({query})
			
	})
	.then(response => response.json())
	.then(data => {
		const lista = document.getMedicotById('lista');
		data.forEach(medico => {
			lista.innerHTML += `<li>${medico.nombre}</li>`;
		});
	});
</script>


<!-- POST ingresa medico al sistema-->
<!-- <h2> Agregar Medico </h2>
<form id="formulario" method="POST">
  <input type="text" name="nombre" placeholder="Nombre"><br/><br/>
  <input type="text" name="especialidad" placeholder="especialidad"><br/><br/>
  <input type="int" name="id_departamento" placeholder="id_departamento"><br/><br/>
  <button type="submit"> Guardar </button>
</form>
<script>
const form = document.getMedicoById("formulario");
form.addEventListener("submit", function(e){
  e.preventDefault();

  fetch('/../certificado/PHP/Equipo_D_GraphQl/graphQL', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre: this.nombre.value,
	  email: this.email.value,
	  password: this.password.value
    })
  })
  .then(() => { form.reset(); })
});
</script> -->


<!-- UPDATE actualizar datos del medico-->
<!-- <h2> Actualizar Medico </h2>
<form id="formUpdate">
<input type="text" name="nombre" placeholder="Nombre"><br/><br/>
  <input type="text" name="especialidad" placeholder="especialidad"><br/><br/>
  <input type="int" name="id_departamento" placeholder="id_departamento"><br/><br/>
  <button type="submit"> Actualizar </button>
</form>
<script>
const formUd = document.getMedicoById("formUpdate");
formUd.addEventListener("submit", function(e){
  e.preventDefault();

  const id = this.id.value;
  
  fetch(`'/../certificado/PHP/Equipo_D_GraphQl/graphQL'`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
		id: this.id.value,
		nombre: this.nombre.value,
		especialidad: this.especialidad.value,
		id_departamento: this.id_departamento.value,
    })
  })
  .then(response => response.json())
  .then(data => {
		console.log("Datos MEdico actualizado:", data);
		alert("Datos Medico actualizado correctamente");
  })
  .then(() => { formUd.reset(); })
  .catch(error => console.error("Error:", error));
});
document.getMedicoById("formUpdate").reset();
</script> -->
<!-- 
 
// DELETE borrar medico del sistema-->
<!-- <h2> Eliminar Medico </h2>
<input type="number" id="idEliminar" placeholder="ID medico">
<button onclick="eliminarMedico()"> Eliminar </button>
<script>
function eliminarMedico() {

  const id = document.getMedicoById("idEliminar").value;

  fetch(`'/../certificado/PHP/Equipo_D_GraphQl/graphQL'`, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    console.log("Medico eliminado:", data);
    alert("Datos Medico eliminado correctamente");
  })
  .catch(error => console.error("Error:", error));
}
</script>
<br/><br/>  -->

</body>
</html>
