<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/catalogoavionsBo.php");
require_once ("../domain/catalogoavions.php");

$obj_catalogoavion = new Catalogoavions();
$obj_catalogoavion->setPK_catalogoavion();
$obj_catalogoavion->setAño('2020-12-15');
$obj_catalogoavion->setModelo("");
$obj_catalogoavion->setMarca("");
$obj_catalogoavion->setCantidad_filas();
$obj_catalogoavion->setAsientos_por_filas();
$obj_catalogoavion->setLastUser("Diego Miranda");

$bo_catalogoavion = new CatalogoavionsBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_usuario->add($obj_catalogoavion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_usuario->update($obj_catalogoavion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_usuario->delete($obj_catalogoavion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $usuarioConsultada = $bo_usuario->searchById($obj_catalogoavion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($catalogoavionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_catalogoavion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
