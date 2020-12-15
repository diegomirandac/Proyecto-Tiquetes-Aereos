<?php

require_once("../bo/usuariosBo.php");
require_once("../domain/usuarios.php");


/**
 * This class contain all services methods of the table Usuarios
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Usuarios Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myUsuariosBo = new UsuariosBo();
        $myUsuarios = Usuarios::createNullUsuarios();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_usuarios" or $action === "update_usuarios") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_usuario') !== null) && (filter_input(INPUT_POST, 'personas_PK_cedula') !== null) && (filter_input(INPUT_POST, 'contraseña') !== null) && (filter_input(INPUT_POST, 'fecha_registro') !== null) && (filter_input(INPUT_POST, 'fecha_actualizacion') !== null) && (filter_input(INPUT_POST, 'tipo_usuario') !== null)) {
                $myUsuarios->setPK_usuario(filter_input(INPUT_POST, 'PK_usuario'));
                $myUsuarios->setPK_FK_cedula(filter_input(INPUT_POST, 'personas_PK_cedula'));
                $myUsuarios->setcontraseña(filter_input(INPUT_POST, 'contraseña'));
                $myUsuarios->setfecha_registro(filter_input(INPUT_POST, 'fecha_registro'));
                $myUsuarios->setfecha_actualizacion(filter_input(INPUT_POST, 'fecha_actualizacion'));
                $myUsuarios->settipo_usuario(filter_input(INPUT_POST, 'tipo_usuario'));
                $myUsuarios->setLastUser('112540148');
                if ($action == "add_usuarios") {
                    $myUsuariosBo->add($myUsuarios);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_usuarios") {
                    $myUsuariosBo->update($myUsuarios);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_usuarios") {//accion de consultar todos los registros
            $resultDB   = $myUsuariosBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_usuarios") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_usuario') != null) {
                $myUsuarios->setPK_usuario(filter_input(INPUT_POST, 'PK_usuario'));
                $myUsuarios = $myUsuariosBo->searchById($myUsuarios);
                if ($myUsuarios != null) {
                    echo json_encode(($myUsuarios));
                } else {
                    echo('E~NO Existe un usuario con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_usuarios") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_usuario') != null) {
                $myUsuarios->setPK_usuario(filter_input(INPUT_POST, 'PK_usuario'));
                $myUsuariosBo->delete($myUsuarios);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
