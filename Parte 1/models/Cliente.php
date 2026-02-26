<?php

require_once 'config/database.php';

class Cliente
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll() {
       
        $stmt = $this->db->query("SELECT * FROM clientes");
        return $stmt->fetchAll();
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear($nom, $email, $telefono) {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, email,telefono) VALUES (?, ?,?)");
        return $stmt->execute([$nom, $email, $telefono]);
    }


    public function update($id, $nom, $email,$telefono) {
        $stmt = $this->db->prepare("UPDATE clientes SET nombre = ?, email = ?, telefono = ? WHERE id_cliente = ?");
        return $stmt->execute([$nom, $email, $telefono]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        return $stmt->execute([$id]);
    }
}