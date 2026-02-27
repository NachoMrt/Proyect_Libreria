<?php

require_once __DIR__ ."/../config/database.php";

function getMedicos() {
    global $pdo;
    $stmt = $pdo->query("SELECT id_medico,nombre, especialidad,id_departamento FROM medicos");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMedicoById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM medicos WHERE id_medico = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function agregarMedico($nombre, $especialidad,$id_departamento) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO medicos (nombre, especialidad,id_departamento) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $especialidad, $id_departamento]);
    $id = $pdo->lastInsertId();
    return ['id_medico' => $id, 'nombre' => $nombre, 'especialidad' => $especialidad,'id_departamento'=> $id_departamento];
}

function actualizarMedico($id, $nombre, $especialidad, $id_departamento) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE medicos SET nombre=?, especialidad=?, id_departamento=? WHERE id_medico=?");
    $stmt->execute([$nombre, $especialidad, $id_departamento, $id]);
    return ['id_medico' => $id, 'nombre' => $nombre, 'especialidad' => $especialidad,'id_departamento'=> $id_departamento];
}

function eliminarMedico($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM medicos WHERE id_medico=?");
    $stmt->execute([$id]);
    return true;
}

?>