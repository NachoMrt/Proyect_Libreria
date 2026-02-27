
const URL_API = "http://localhost/certificado/ejercicios%20resueltos/Gaphql_hospital%20equipo%20A/Equipo%20D%20GraphQl/Equipo%20D%20GraphQl/index.php";

// 1. OBTENER PACIENTES
async function obtenerPacientes() {
    const query = `query {paciente {id_paciente nombre email fecha_nacimiento telefono}}`;
    try {
        const res = await fetch(URL_API, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query })
        });
        const response = await res.json();
        const pacientes = response.data.paciente;
        const container = document.getElementById('containerPaciente');
        container.innerHTML = ""; // Limpiar antes de cargar

        pacientes.forEach(paciente => {
            const card = document.createElement("div");
            card.className = "card_cita";
            card.innerHTML = `
                <h3>ID: ${paciente.id_paciente} - ${paciente.nombre}</h3>
                <p><b>Email:</b> ${paciente.email}</p>
                <p><b>Nacimiento:</b> ${paciente.fecha_nacimiento}</p>
                <p><b>Teléfono:</b> ${paciente.telefono}</p>
            `;
            container.appendChild(card);
        });
    } catch (error) {
        console.error("Error cargando pacientes:", error);
    }
}

// 2. CREAR PACIENTE
document.getElementById("formularioPost").addEventListener("submit", async function (e) {
    e.preventDefault();
    const query = `mutation { agregarPaciente(nombre: "${this.nombre.value}", email: "${this.email.value}", fecha_nacimiento: "${this.fecha_nacimiento.value}", telefono: "${this.telefono.value}") {id_paciente}}`;

    const res = await fetch(URL_API, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    if (data.data) {
        alert("Paciente creado correctamente");
        location.reload();
    }
});

// 3. ACTUALIZAR PACIENTE
document.getElementById("formUpdate").addEventListener("submit", async function (e) {
    e.preventDefault();
    const id = parseInt(this.id_paciente_edit.value);
    const query = `mutation {actualizarPaciente(id_paciente: ${id}, nombre: "${this.nombre_edit.value}", email: "${this.email_edit.value}", fecha_nacimiento: "${this.fecha_nacimiento_edit.value}", telefono: "${this.telefono_edit.value}") {id_paciente}}`;

    const res = await fetch(URL_API, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    if (data.data) {
        alert("Paciente actualizado");
        location.reload();
    }
});

// 4. ELIMINAR PACIENTE
async function eliminarPaciente() {
    const id = parseInt(document.getElementById("id_pacienteDelete").value);
    if(!id) return alert("Ingresa un ID");
    
    const query = `mutation {eliminarPaciente(id_paciente: ${id})}`;
    const res = await fetch(URL_API, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query })
    });
    const data = await res.json();
    if(data.data) {
        alert("Paciente eliminado");
        location.reload();
    }
}

// Carga inicial
obtenerPacientes();