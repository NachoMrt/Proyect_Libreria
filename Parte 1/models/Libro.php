<?php

require_once 'config/database.php';

class Libro
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM libros");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id_libro = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear($titulo,$genero, $id_autor, $precio)
    {
        $stmt = $this->db->prepare("INSERT INTO libros (titulo,genero, id_autor, precio) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo,$genero, $id_autor, $precio]);
    }

    public function update($id, $titulo,$genero, $id_autor, $precio)
    {
        $stmt = $this->db->prepare("UPDATE libros SET titulo = ?, genero = ?, id_autor = ?, precio = ? WHERE id_libro = ?");
        $stmt->execute([$titulo,$genero, $id_autor, $precio, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id_libro = ?");
        $stmt->execute([$id]);
    }
}
