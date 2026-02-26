<?php

require_once './models/Cliente.php';

class ClienteController
{
    public function index()
    {
        $clientes = (new Cliente())->getAll();
        require './views/clientes/listar.php';
    }

    public function crear()
    {
        if ($_POST) {
            (new Cliente())->crear(
                $_POST['nombre'],
                $_POST['email'],
                $_POST['telefono']
            );

            header("Location: ./frontController.php?&accion=index&controller=Cliente");
            exit();
        }

        require './views/clientes/crear.php';
    }

    public function editar()
    {
        $clienteModel = new Cliente();

        if ($_POST) {
            $clienteModel->update(
                $_GET['id'],
                $_POST['nombre'],
                $_POST['email'],
                $_POST['telefono']
            );

            header("Location: ./frontController.php?&accion=index&controller=Cliente");
            exit();
        }

        $cliente = $clienteModel->getById($_GET['id']);
        require './views/clientes/editar.php';
    }

    public function eliminar()
    {
        (new Cliente())->delete($_GET['id']);

        header("Location: ./frontController.php?&accion=index&controller=Cliente");
        exit();
    }
}