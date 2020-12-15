<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/rutasBo.php");
require_once ("../domain/rutas.php");

$obj_ruta = new Rutas();
$obj_ruta->setPK_ruta("12");
$obj_ruta->setTrayecto("Alajuela/Golfito");
$obj_ruta->setDuracion(40);
$obj_ruta->setPrecio();
$obj_ruta->setLastUser("chgari");

$bo_ruta = new RutasBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_ruta->add($obj_ruta);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_ruta->update($obj_ruta);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_ruta->delete($obj_ruta);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $rutaConsultada = $bo_ruta->searchById($obj_ruta);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($rutaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_ruta->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
