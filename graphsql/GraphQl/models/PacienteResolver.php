<?php

require_once __DIR__ ."/../config/database.php";
// id_paciente, nombre, email, fecha_nacimiento, telefono
function getPacientes() {
    global $pdo;
    $stmt = $pdo->query("SELECT id_paciente,nombre, email,fecha_nacimiento,telefono  FROM pacientes");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPacienteById($id_paciente) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM pacientes WHERE id_paciente = ?");
    $stmt->execute([$id_paciente]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function agregarPaciente($nombre, $email,$fecha_nacimienta,$telefono) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO pacientes (nombre, email,fecha_nacimiento,telefono) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nombre, $email, $fecha_nacimienta, $telefono]);
    $id = $pdo->lastInsertId();
    return ['id_paciente' => $id, 'nombre' => $nombre, 'email' => $email,'fecha_nacimiento'=> $fecha_nacimienta,'telefono'=> $telefono];
}

function actualizarPaciente($id, $nombre, $email,$fecha_nacimienta,$telefono) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE pacientes SET nombre=?, email=?, fecha_nacimiento=?,telefono =? WHERE id_paciente=?");
    $stmt->execute([$nombre, $email,$fecha_nacimienta,$telefono, $id]);
    return ['id_paciente' => $id, 'nombre' => $nombre, 'email' => $email,'fecha_nacimiento'=> $fecha_nacimienta,'telefono'=> $telefono];
}

function eliminarPaciente($id_paciente) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM pacientes WHERE id_paciente=?");
    $stmt->execute([$id_paciente]);
    return true;
}

?>