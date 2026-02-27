<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../models/MedicoResolver.php";
require_once __DIR__ . "/../models/DepartamentoResolver.php";
require_once __DIR__."/../models/PacienteResolver.php";

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Schema;

// Types

$medicoType = new ObjectType([
    'name' => 'Medico',
    'fields' => [
        'id_medico' => Type::int(),
        'nombre' => Type::string(),
        'especialidad' => Type::string(),
        'id_departamento' => Type::int()
    ]
]);

$departamentoType = new ObjectType([
    'name' => 'Departamento',
    'fields' => [
        'id_departamento' => Type::int(),
        'nombre' => Type::string(),
        'ubicacion' => Type::string()
    ]
]);

$pacienteType = new ObjectType([
    //Había una errata aquí 'name' => 'Pacienete',  y en 'fecha_nacimiento' => Type::string(),  'telefonoType' => Type::string(),
    'name' => 'Paciente',
    'fields' => [
        'id_paciente' => Type::int(),
        'nombre' => Type::string(),
        'email' => Type::string(),
        'fecha_nacimiento' => Type::string(),
        'telefono' => Type::string(),
    ]
]);


// queries and mutations

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'medico' => [
            'type' => Type::listOf($medicoType),
            'resolve' => function () {
                return getMedicos();
            }
        ],
        'medicoById' => [
            'type' => $medicoType,
            'args' => [
                'id_medico' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => getMedicoById($args['id_medico'])
        ],
        'departamento' => [
            'type' => Type::listOf($departamentoType),
            'resolve' => function () {
                return getDepartamento();
            }
        ],
        'departamentoById' => [
            'type' => $departamentoType,
            'args' => [
                'id_departamento' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => getDepartamentoById($args['id_departamento'])
        ],
        'paciente' => [
            'type' => Type::listOf($pacienteType),
            'resolve' => function () {
                return getPacientes();
            }
        ],
        'pacienteById' => [
            'type' => $pacienteType,
            'args' => [
                'id_paciente' => ['type' => Type::int()]
            ],
            'resolve' => fn($root, $args) => getPacienteById($args['id_paciente'])
        ]
    ]
]);

$mutationType = new ObjectType([
    'name' => 'Mutation',
    'fields' => [
        'agregarMedico' => [
            'type' => $medicoType,
            'args' => [
                'nombre' => Type::nonNull(Type::string()),
                'especialidad' => Type::nonNull(Type::string()),
                'id_departamento' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => agregarMedico($args['nombre'], $args['especialidad'], $args['id_departamento'])
        ],
        'actualizarMedico' => [
            'type' => $medicoType,
            'args' => [
                'id_medico' => Type::nonNull(Type::int()),
                'nombre' => Type::nonNull(Type::string()),
                'especialidad' => Type::nonNull(Type::string()),
                'id_departamento' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => actualizarMedico($args['id_medico'], $args['nombre'], $args['especialidad'], $args['id_departamento'])
        ],
        'eliminarMedico' => [
            'type' => Type::boolean(),
            'args' => [
                'id_medico' => Type::nonNull(Type::int())
            ],
            'resolve' => fn($root, $args) => eliminarMedico($args['id_medico'])
        ],
        'agregarDepartamento' => [
            'type' => $departamentoType,
            'args' => [
                'nombre' => Type::nonNull(Type::string()),
                'ubicacion' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => agregarDepartamento($args['nombre'], $args['ubicacion'])
        ],
        'actualizarDepartamento' => [
            'type' => $departamentoType,
            'args' => [
                'id_departamento' => Type::nonNull(Type::int()),
                'nombre' => Type::nonNull(Type::string()),
                'ubicacion' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => actualizarDepartamento($args['id_departamento'], $args['nombre'], $args['ubicacion'])
        ],
        'eliminarDepartamento' => [
            'type' => Type::boolean(),
            'args' => ['id_departamento' => Type::nonNull(Type::int())],
            'resolve' => function ($root, $args) {
                global $pdo;
                try {
                    return eliminarDepartamento($args['id_departamento']);
                } catch (\PDOException $e) {
                    throw new \Exception("No se puede eliminar el departamento: hay medicos asignados.");
                }
            }
        ],
        'agregarPaciente' => [
            'type' => $pacienteType,
            'args' => [
                'nombre' => Type::nonNull(Type::string()),
                'email' => Type::nonNull(Type::string()),
                'fecha_nacimiento' => Type::nonNull(Type::string()),
                'telefono' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => agregarPaciente($args['nombre'], $args['email'],$args['fecha_nacimiento'],$args['telefono'])
        ],
        'actualizarPaciente' => [
            'type' => $pacienteType,
            'args' => [
                'id_paciente' => Type::nonNull(Type::int()),
                'nombre' => Type::nonNull(Type::string()),
                'email' => Type::nonNull(Type::string()),
                'fecha_nacimiento' => Type::nonNull(Type::string()),
                'telefono' => Type::nonNull(Type::string())
            ],
            'resolve' => fn($root, $args) => actualizarPaciente($args['id_paciente'], $args['nombre'], $args['email'],$args['fecha_nacimiento'],$args['telefono'])
        ],
        'eliminarPaciente' => [
            'type' => Type::boolean(),
            'args' => ['id_paciente' => Type::nonNull(Type::int())],
            'resolve' => function ($root, $args) {
                global $pdo;
                try {
                    return eliminarPaciente($args['id_paciente']);
                } catch (\PDOException $e) {
                    throw new \Exception("No se puede eliminar el departamento: hay medicos asignados.");
                }
            }
        ]
    ]
]);


$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutationType
]);





?>