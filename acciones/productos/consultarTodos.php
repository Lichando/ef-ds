<?php

require_once "responses/consultarTodosResponse.php";
require_once "../../modelo/producto.php";
require_once "../../configuracion/database.php";
header('Content-Type: application/json');

$resp = new  consultarTodosResponse();
$resp->listProductos[]=producto::BuscarTodas();



foreach( $resp->listProductos as $c => $resp->cantidadProductos) {
    $resp->cantidadProductos=+1;
}

echo json_encode($resp);
