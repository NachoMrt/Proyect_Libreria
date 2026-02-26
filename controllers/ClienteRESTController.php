<?php

require_once './models/ClienteREST.php';

class ClienteController
{
    public function index()
    {
        $clientes = (new Cliente())->getAll();
        echo json_encode($clientes);
    }

    public function show($id)
    {
        $cliente = (new Cliente())->getById($id);
        if (!$cliente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrado']);
        } else {
            echo json_encode($cliente);
        }
    }

    public function store($data)
    {
        if (!isset($data['nombre']) || !isset($data['email']) || !isset($data['telefono'])) {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos']);
            return;
        }

        (new Cliente())->crear($data['nombre'], $data['email'], $data['telefono']);
        http_response_code(201);
        echo json_encode(['mensaje' => 'Cliente creado']);
    }

    public function update($id, $data)
    {
        $clienteExistente = (new Cliente())->getById($id);
        if (!$clienteExistente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrado']);
            return;
        }

        (new Cliente())->update($id, $data['nombre'], $data['email'], $data['telefono']);
        echo json_encode(['mensaje' => 'Cliente actualizado']);
    }

    public function delete($id)
    {
        $clienteExistente = (new Cliente())->getById($id);
        if (!$clienteExistente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrado']);
            return;
        }

        (new Cliente())->delete($id);
        echo json_encode(['mensaje' => 'Cliente eliminado']);
    }
}