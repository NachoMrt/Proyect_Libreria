<?php
// INSTALAR libreria:  composer require webonyx/graphql-php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controllers/shema.php';

use GraphQL\GraphQL;
use GraphQL\Error\DebugFlag;

header('Content-Type: application/json');

try {
    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];

    $result = GraphQL::executeQuery($schema, $query);
    $output = $result->toArray(DebugFlag::INCLUDE_DEBUG_MESSAGE | DebugFlag::INCLUDE_TRACE);

} catch (Exception $e) {
    $output = ['error' => ['message' => $e->getMessage()]];
}

echo json_encode($output);
exit;
?>


<!-- Base de datos Hospital
            1 tabla Pacientes 
                id_paciente, nombre, email, fecha_nacimienta, telefono

            2 tabla Medicos
                id_medico, nombre, especialidad, id_departamento

            3 tabla Departamentos
                id_departamento, nombre, ubicacion
 -->


<!-- EDNPOINT
http://localhost/Certificado/Equipo D GraphQl/index.php 

 leer todos Medicos
    method: 'POST',
    headers: {
            'Content-Type': 'application/json',
        },
    body: 
    {
        "query": "{   medico {id_medico      nombre        especialidad       id_departamento    }}"
    } 
-->

