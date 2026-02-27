<?php

require_once __DIR__.'/../models/ClienteREST.php';

class ClienteController
{
    public function index()
    {
        $clientes = (new Cliente())->All();
        echo json_encode($clientes);
    }

    public function show($id)
    {
        $cliente = (new Cliente())->find($id);
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

        (new Cliente())->create($data);
        http_response_code(201);
        echo json_encode(['mensaje' => 'Cliente creado']);
    }

    public function update($id, $data)
    {
        $cliente = Cliente::update($id, $data);
        if (!$cliente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrado']);
        } else {
            echo json_encode($cliente);
        }
    }

    public function delete($id)
    {
        $clienteExistente = (new Cliente())->find($id);
        if (!$clienteExistente) {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Cliente no encontrado']);
            return;
        }

        (new Cliente())->delete($id);
        echo json_encode(['mensaje' => 'Cliente eliminado']);
    }
}