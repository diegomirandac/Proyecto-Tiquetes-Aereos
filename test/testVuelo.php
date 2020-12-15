<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/vuelosBo.php");
require_once ("../domain/vuelos.php");

$obj_vuelo = new Vuelos();
$obj_vuelo->setPK_vuelo(1392);
$obj_vuelo->setRuta_PK_ruta("12");
$obj_vuelo->setCatalogoAvion_PK_catalogoavion("");
$obj_vuelo->setFecha_hora('2020-12-15');
$obj_vuelo->setLastUser("chgari");

$bo_vuelo = new VuelosBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_vuelo->add($obj_vuelo);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_vuelo->update($obj_vuelo);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_vuelo->delete($obj_vuelo);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $vueloConsultada = $bo_vuelo->searchById($obj_vuelo);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($vueloConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_vuelo->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
