<?php

require_once './models/Libro.php';
require_once './models/Autor.php';

class LibroController
{
    public function index()
    {
        // Trae todos los libros con el nombre del autor
        $libros = (new Libro())->getAll();
        require './views/libros/listar.php';
    }

    public function crear()
    {
        // Traemos todos los autores para el select
        $autores = (new Autor())->getAll();

        if ($_POST) {
            (new Libro())->crear(
                $_POST['titulo'],
                $_POST['genero'],
                $_POST['id_autor'], // FK
                $_POST['precio']
            );

            header("Location: ./frontController.php?&accion=index&controller=Libro");
            exit();
        }

        require './views/libros/crear.php';
    }

    public function editar()
    {
        $libroModel = new Libro();
        $autores = (new Autor())->getAll(); // Para el select de autores

        if ($_POST) {
            $libroModel->update(
                $_GET['id'],
                $_POST['titulo'],
                $_POST['genero'],
                $_POST['id_autor'],
                $_POST['precio']
            );

            header("Location: ./frontController.php?&accion=index&controller=Libro");
            exit();
        }

        // Traemos el libro por id junto con el nombre del autor
        $libro = $libroModel->getById($_GET['id']);
        require './views/libros/editar.php';
    }

    public function eliminar()
    {
        (new Libro())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Libro");
        exit();
    }
}