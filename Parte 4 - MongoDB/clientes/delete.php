<?php

require '../conexion.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $coleccion_Clientes->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
header("Location: index.php");
exit;

/*
EXPLICACIÓN:
    $coleccion->deleteOne([...]) → elimina un solo documento que cumpla la condición.
    ['_id' => new MongoDB\BSON\ObjectId($id)] → busca el documento por su _id.
    MongoDB usa ObjectId, así que la cadena $id se convierte en un ObjectId válido.
*/



