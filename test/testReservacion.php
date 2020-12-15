<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/reservacionesBo.php");
require_once ("../domain/reservaciones.php");

$obj_reservacion = new Reservaciones();
$obj_reservacion->setPK_reservacion(1506);
$obj_reservacion->setUsuarios_PK_usuario("2");
$obj_reservacion->setVuelos_PK_vuelo("1392");
$obj_reservacion->setFecha_reservacion('2020-12-15');
$obj_reservacion->setNumero_fila("");
$obj_reservacion->setNumero_asiento("");


$bo_reservacion = new ReservacionesBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_reservacion->add($obj_reservacion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_reservacion->update($obj_reservacion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_reservacion->delete($obj_reservacion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $reservacionConsultada = $bo_reservacion->searchById($obj_reservacion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($reservacionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_reservacion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
