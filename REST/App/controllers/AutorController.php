<?php

require_once './models/Autor.php';

class AutorController
{
    public function index()
    {
        $autores = (new Autor())->getAll();
        require './views/autores.php';
    }

    public function crear()
    {
        if ($_POST) {
            (new Autor())->crear(
                $_POST['nombre'],
                $_POST['fecha_nacimiento']
            );

            header("Location: ./frontController.php?&accion=index&controller=Autor");
            exit();
        }

        require './views/autores/crear.php';
    }

    public function editar()
    {
        $autorModel = new Autor();

        if ($_POST) {
            $autorModel->update(
                $_GET['id'],
                $_POST['nombre'],
                $_POST['fecha_nacimiento']
            );

            header("Location: ./frontController.php?&accion=index&controller=Autor");
            exit();
        }

        $autor = $autorModel->getById($_GET['id']);
        require './views/autores/editar.php';
    }

    public function eliminar()
    {
        (new Autor())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Autor");
        exit();
    }
}