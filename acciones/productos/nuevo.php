<?php

require_once "request/nuevoRequest.php";
require_once "responses/nuevoResponse.php";
require_once "../../modelo/producto.php";
require_once "../../configuracion/database.php";

header('Content-Type: application/json');
$json = file_get_contents('php://input',true);
$req = json_decode($json);

$p = new producto();
$p->Marca = $req->Marca;
$p->Descripcion = $req->Descripcion;
$p->Codigo = $req->Codigo;

$p->Agregar();

$resp= new nuevoResponse;
$resp->IsOk= true;

echo json_encode($resp);
