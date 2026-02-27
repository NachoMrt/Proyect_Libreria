<?php

require_once __DIR__ . "/../config/database.php";

function getDepartamento()
{
    global $pdo;
    $stmt = $pdo->query("SELECT id_departamento, nombre, ubicacion  FROM departamentos");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDepartamentoById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM departamentos WHERE id_departamento = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function agregarDepartamento($nombre, $ubicacion)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO departamentos (nombre, ubicacion) VALUES (?, ?)");
    $stmt->execute([$nombre, $ubicacion]);
    $id = $pdo->lastInsertId();
    return ['id_departamento' => $id, 'nombre' => $nombre, 'ubicacion' => $ubicacion];
}

function actualizarDepartamento($id, $nombre, $ubicacion)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE departamentos SET nombre=?, ubicacion=? WHERE id_departamento=?");
    $stmt->execute([$nombre, $ubicacion, $id]);
    return ['id_departamento' => $id, 'nombre' => $nombre, 'ubicacion' => $ubicacion];
}

function eliminarDepartamento($id)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM departamentos WHERE id_departamento=?");
    $stmt->execute([$id]);
    return true;
}

?>