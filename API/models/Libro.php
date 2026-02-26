<?php

require_once 'config/database.php';

class Libro
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // Devuelve todos los libros con el nombre del autor
    public function getAll()
    {
        $stmt = $this->db->query("
            SELECT libros.*, autores.nombre AS autor_nombre 
            FROM libros
            LEFT JOIN autores ON libros.id_autor = autores.id_autor
        ");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("
            SELECT libros.*, autores.nombre AS autor_nombre
            FROM libros
            LEFT JOIN autores ON libros.id_autor = autores.id_autor
            WHERE id_libro = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear($titulo, $genero, $id_autor, $precio)
    {
        $stmt = $this->db->prepare("
            INSERT INTO libros (titulo, genero, id_autor, precio) 
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$titulo, $genero, $id_autor, $precio]);
    }

    public function update($id, $titulo, $genero, $id_autor, $precio)
    {
        $stmt = $this->db->prepare("
            UPDATE libros 
            SET titulo = ?, genero = ?, id_autor = ?, precio = ? 
            WHERE id_libro = ?
        ");
        return $stmt->execute([$titulo, $genero, $id_autor, $precio, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id_libro = ?");
        return $stmt->execute([$id]);
    }
}