<?php

require_once("../bo/personasBo.php");
require_once("../domain/personas.php");


/**
 * This class contain all services methods of the table Personas
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Personas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myPersonasBo = new PersonasBo();
        $myPersonas = Personas::createNullPersonas();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_personas" or $action === "update_personas") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_cedula') !== null) && (filter_input(INPUT_POST, 'nombre') !== null) && (filter_input(INPUT_POST, 'apellido1') !== null) && (filter_input(INPUT_POST, 'apellido2') !== null) && (filter_input(INPUT_POST, 'fecNacimiento') !== null) && (filter_input(INPUT_POST, 'sexo') !== null) && (filter_input(INPUT_POST, 'observaciones') !== null) && (filter_input(INPUT_POST, 'telefono') !== null)) {
                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPersonas->setnombre(filter_input(INPUT_POST, 'nombre'));
                $myPersonas->setapellido1(filter_input(INPUT_POST, 'apellido1'));
                $myPersonas->setapellido2(filter_input(INPUT_POST, 'apellido2'));
                $myPersonas->setfecNacimiento(filter_input(INPUT_POST, 'fecNacimiento'));
                $myPersonas->setsexo(filter_input(INPUT_POST, 'sexo'));
                $myPersonas->setobservaciones(filter_input(INPUT_POST, 'observaciones'));
                $myPersonas->settelefono(filter_input(INPUT_POST, 'telefono'));
                $myPersonas->setLastUser('112540148');
                if ($action == "add_personas") {
                    $myPersonasBo->add($myPersonas);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_personas") {
                    $myPersonasBo->update($myPersonas);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_personas") {//accion de consultar todos los registros
            $resultDB   = $myPersonasBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_personas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPersonas = $myPersonasBo->searchById($myPersonas);
                if ($myPersonas != null) {
                    echo json_encode(($myPersonas));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_personas") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
                $myPersonas->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPersonasBo->delete($myPersonas);
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
