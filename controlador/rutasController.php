<?php

require_once("../bo/rutasBo.php");
require_once("../domain/rutas.php");


/**
 * This class contain all services methods of the table Rutas
 * 
 *
 */
//************************************************************
// Rutas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myRutasBo = new RutasBo();
        $myRutas = Rutas::createNullRutas();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_rutas" or $action === "update_rutas") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_ruta') !== null) && (filter_input(INPUT_POST, 'trayecto') !== null) && (filter_input(INPUT_POST, 'duracion') !== null) && (filter_input(INPUT_POST, 'precio') !== null)) {
                $myRutas->setPK_ruta(filter_input(INPUT_POST, 'PK_ruta'));
                $myRutas->settrayecto(filter_input(INPUT_POST, 'trayecto'));
                $myRutas->setduracion(filter_input(INPUT_POST, 'duracion'));
                $myRutas->setprecio(filter_input(INPUT_POST, 'precio'));
                if ($action == "add_rutas") {
                    $myRutasBo->add($myRutas);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_rutas") {
                    $myRutasBo->update($myRutas);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_rutas") {//accion de consultar todos los registros
            $resultDB   = $myRutasBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_rutas") {//accion de mostrar vuelo por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_ruta') != null) {
                $myRutas->setPK_ruta(filter_input(INPUT_POST, 'PK_ruta'));
                $myRutas = $myRutasBo->searchById($myRutas);
                if ($myRutas != null) {
                    echo json_encode(($myVuelos));
                } else {
                    echo('E~NO Existe una ruta con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_rutas") {//accion de eliminar vuelo por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_rutas') != null) {
                $myRutas->setPK_ruta(filter_input(INPUT_POST, 'PK_ruta'));
                $myRutasBo->delete($myRutas);
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
