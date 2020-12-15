<?php

require_once("../bo/vuelosBo.php");
require_once("../domain/vuelos.php");


/**
 * This class contain all services methods of the table Vuelos
 * 
 *
 */
//************************************************************
// Vuelos Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myVuelosBo = new VuelosBo();
        $myVuelos = Vuelos::createNullVuelos();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_vuelos" or $action === "update_vuelos") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_vuelo') !== null) && (filter_input(INPUT_POST, 'ruta_PK_ruta') !== null) && (filter_input(INPUT_POST, 'catalogoAvion_PK_catalogoavion') !== null) && (filter_input(INPUT_POST, 'fecha_hora') !== null)) {
                $myVuelos->setPK_vuelo(filter_input(INPUT_POST, 'PK_vuelo'));
                $myVuelos->setruta_PK_ruta(filter_input(INPUT_POST, 'ruta_PK_ruta'));
                $myVuelos->setcatalogoAvion_PK_catalogoavion(filter_input(INPUT_POST, 'catalogoAvion_PK_catalogoavion'));
                $myVuelos->setfecha_hora(filter_input(INPUT_POST, 'fecha_hora'));
                if ($action == "add_vuelos") {
                    $myVuelosBo->add($myVuelos);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_vuelos") {
                    $myVuelosBo->update($myVuelos);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_vuelos") {//accion de consultar todos los registros
            $resultDB   = $myVuelosBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_vuelos") {//accion de mostrar vuelo por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_vuelo') != null) {
                $myVuelos->setPK_vuelo(filter_input(INPUT_POST, 'PK_vuelo'));
                $myVuelos = $myVuelosBo->searchById($myVuelos);
                if ($myVuelos != null) {
                    echo json_encode(($myVuelos));
                } else {
                    echo('E~NO Existe un vuelo con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_vuelos") {//accion de eliminar vuelo por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_vuelo') != null) {
                $myVuelos->setPK_vuelo(filter_input(INPUT_POST, 'PK_vuelo'));
                $myVuelosBo->delete($myVuelos);
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
