<?php

require_once("../bo/catalogoavionsBo.php");
require_once("../domain/catalogoavions.php");


/**
 * This class contain all services methods of the table Catalogoavions
 * 
 *
 */
//************************************************************
// Catalogoavions Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myCatalogoavionsBo = new CatalogoavionsBo();
        $myCatalogoavions = Catalogoavions::createNullCatalogoavions();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_catalogoavions" or $action === "update_catalogoavions") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_catalogoavion') !== null) && (filter_input(INPUT_POST, 'año') !== null) && (filter_input(INPUT_POST, 'modelo') !== null) && (filter_input(INPUT_POST, 'marca') !== null) && (filter_input(INPUT_POST, 'cantidad_filas') !== null) && (filter_input(INPUT_POST, 'asientos_por_filas') !== null) && (filter_input(INPUT_POST, 'catalogoAvioncol') !== null)) {
                $myCatalogoavions->setPK_catalogoavion(filter_input(INPUT_POST, 'PK_catalogoavion'));
                $myCatalogoavions->setaño(filter_input(INPUT_POST, 'año'));
                $myCatalogoavions->setmodelo(filter_input(INPUT_POST, 'modelo'));
                $myCatalogoavions->setmarca(filter_input(INPUT_POST, 'marca'));
                $myCatalogoavions->setcantidad_filas(filter_input(INPUT_POST, 'cantidad_filas'));
                $myCatalogoavions->setasientos_por_filas(filter_input(INPUT_POST, 'asientos_por_filas'));
                $myCatalogoavions->setcatalogoAvioncol(filter_input(INPUT_POST, 'catalogoAvioncol'));
                $myCatalogoavions->setLastUser('112540148');
                if ($action == "add_catalogoavions") {
                    $myCatalogoavionsBo->add($myCatalogoavions);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_catalogoavions") {
                    $myCatalogoavionsBo->update($myCatalogoavions);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_catalogoavions") {//accion de consultar todos los registros
            $resultDB   = $myCatalogoavionsBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_catalogoavions") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_catalogoavion') != null) {
                $myCatalogoavions->setPK_catalogoavion(filter_input(INPUT_POST, 'PK_catalogoavion'));
                $myCatalogoavions = $myCatalogoavionsBo->searchById($myCatalogoavions);
                if ($myCatalogoavions != null) {
                    echo json_encode(($myCatalogoavions));
                } else {
                    echo('E~NO Existe un catalogoavion con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_catalogoavions") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_catalogoavion') != null) {
                $myCatalogoavions->setPK_catalogoavion(filter_input(INPUT_POST, 'PK_catalogoavion'));
                $myCatalogoavionsBo->delete($myCatalogoavions);
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
