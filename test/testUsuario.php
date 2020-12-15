<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/usuariosBo.php");
require_once ("../domain/usuarios.php");

$obj_usuario = new Usuarios();
$obj_usuario->setPK_usuario(2);
$obj_usuario->setpersonas_PK_cedula("121212");
$obj_usuario->setContraseña("1234@");
$obj_usuario->setFecha_registro('2020-12-15');
$obj_usuario->setFecha_actualizacion('2020-12-15');
$obj_usuario->setTipo_usuario("Prueba");
$obj_usuario->setLastUser("chgari");

$bo_usuario = new UsuariosBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_usuario->add($obj_usuario);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_usuario->update($obj_usuario);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_usuario->delete($obj_usuario);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $usuarioConsultada = $bo_usuario->searchById($obj_usuario);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($usuarioConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_usuario->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
