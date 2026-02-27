<?php

require_once __DIR__ . '/../Controllers/ClienteRESTController.php';

class Router {
    private $controller;

    public function __construct() {
        $this->controller = new ClienteController();
    }

    /**
     * $method → GET, POST, PUT, DELETE
     * $uri → ruta limpia (clientes o clientes/1)
     * $data → datos del body de POST/PUT (array PHP)
     */
    public function route($method, $uri, $data = null) {
        $parts = explode('/', trim($uri, '/'));

        // La primera parte debe ser 'clientes'
        if ($parts[0] != 'clientes') {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Ruta no encontrada']);
            return;
        }

        $id = $parts[1] ?? null;

        switch ($method) {
            case 'GET':
                if ($id) {
                    $this->controller->show($id);
                } else {
                    $this->controller->index();
                }
                break;

            case 'POST':
                $this->controller->store($data);
                break;

            case 'PUT':
                if (!$id) {
                    http_response_code(400);
                    echo json_encode(['mensaje' => 'ID requerido']);
                    return;
                }
                $this->controller->update($id, $data);
                break;

            case 'DELETE':
                if (!$id) {
                    http_response_code(400);
                    echo json_encode(['mensaje' => 'ID requerido']);
                    return;
                }
                $this->controller->delete($id);
                break;

            default:
                http_response_code(405);
                echo json_encode(['mensaje' => 'Método no permitido']);
        }
    }
}