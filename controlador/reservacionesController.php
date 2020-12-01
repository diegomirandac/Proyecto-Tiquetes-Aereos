<?php

require_once("../bo/reservacionesBo.php");
require_once("../domain/reservaciones.php");


/**
 * This class contain all services methods of the table Reservaciones
 * @author Diego Miranda
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Reservaciones Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myReservacionesBo = new ReservacionesBo();
        $myReservaciones = Reservaciones::createNullReservaciones();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_reservaciones" or $action === "update_reservaciones") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_reservacion') !== null) && (filter_input(INPUT_POST, 'usuario_PK_usuario') !== null) && (filter_input(INPUT_POST, 'vuelos_PK_vuelo') !== null) && (filter_input(INPUT_POST, 'fecha_reservacion') !== null) && (filter_input(INPUT_POST, 'numero_fila') !== null) && (filter_input(INPUT_POST, 'numero_asiento') !== null)) {
                $myReservaciones->setPK_reservacion(filter_input(INPUT_POST, 'PK_reservacion'));
                $myReservaciones->setusuario_PK_usuario(filter_input(INPUT_POST, 'usuario_PK_usuario'));
                $myReservaciones->setvuelos_PK_vuelo(filter_input(INPUT_POST, 'vuelos_PK_vuelo'));
                $myReservaciones->setfecha_reservacion(filter_input(INPUT_POST, 'fecha_reservacion'));
                $myReservaciones->setnumero_fila(filter_input(INPUT_POST, 'numero_fila'));
                $myReservaciones->setnumero_asiento(filter_input(INPUT_POST, 'numero_asiento'));
                if ($action == "add_reservaciones") {
                    $myReservacionesBo->add($myReservaciones);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_reservaciones") {
                    $myReservacionesBo->update($myReservaciones);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_reservaciones") {//accion de consultar todos los registros
            $resultDB   = $myReservacionesBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_reservaciones") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_reservacion') != null) {
                $myReservaciones->setPK_reservacion(filter_input(INPUT_POST, 'PK_reservacion'));
                $myReservaciones = $myReservacionesBo->searchById($myReservaciones);
                if ($myReservaciones != null) {
                    echo json_encode(($myReservaciones));
                } else {
                    echo('E~NO Existe una Reservacion con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_reservaciones") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_reservacion') != null) {
                $myReservaciones->setPK_usuario(filter_input(INPUT_POST, 'PK_reservacion'));
                $myReservacionesBo->delete($myReservaciones);
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
