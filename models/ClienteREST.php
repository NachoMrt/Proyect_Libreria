<?php

require_once __DIR__ . '/../Core/database.php';

class Cliente
{
    public static function all()
    {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO clientes (nombre, email, telefono) VALUES (?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['email'], $data['telefono']]);
        return self::find($db->lastInsertId());
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE clientes SET nombre = ?, email = ?, telefono = ? WHERE id_cliente = ?");
        $stmt->execute([$data['nombre'], $data['email'], $data['telefono'], $id]);
        return self::find($id);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        return $stmt->execute([$id]);
    }
}