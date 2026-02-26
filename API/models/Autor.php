<?php

require_once 'config/database.php';

class Autor
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll() {
       
        $stmt = $this->db->query("SELECT * FROM autores");
        return $stmt->fetchAll();
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM autores WHERE id_autor = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear($nom, $fecha) {
        $stmt = $this->db->prepare("INSERT INTO autores (nombre, fecha_nacimiento) VALUES (?, ?)");
        return $stmt->execute([$nom, $fecha]);
    }


    public function update($id, $nom, $fecha) {
        $stmt = $this->db->prepare("UPDATE autores SET nombre = ?, fecha_nacimiento = ? WHERE id_autor = ?");
        return $stmt->execute([$nom, $fecha, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM autores WHERE id_autor = ?");
        return $stmt->execute([$id]);
    }
}