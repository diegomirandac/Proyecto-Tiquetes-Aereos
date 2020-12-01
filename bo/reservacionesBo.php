<?php


require_once("../domain/reservaciones.php");
require_once("../dao/reservacionesDao.php");

/**
 * 
 * @author Diego Miranda
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class ReservacionesBo {

    private $reservacionesDao;

    public function __construct() {
        $this->reservacionesDao = new ReservacionesDao();
    }

    public function getReservacionesDao() {
        return $this->reservacionesDao;
    }

    public function setReservacionesDao(ReservacionesDao $reservacionesDao) {
        $this->reservacionesDao = $reservacionesDao;
    }

    //***********************************************************
    //agrega a una reservacion a la base de datos
    //***********************************************************

    public function add(Reservaciones $reservaciones) {
        try {
            if (!$this->reservacionesDao->exist($reservaciones)) {
                $this->reservacionesDao->add($reservaciones);
            } else {
                throw new Exception("El Reservaciones ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una reservacion a la base de datos
    //***********************************************************

    public function update(Reservaciones $reservaciones) {
        try {
            $this->reservacionesDao->update($reservaciones);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una reservacion a la base de datos
    //***********************************************************

    public function delete(Reservaciones $reservaciones) {
        try {
            $this->reservacionesDao->delete($reservaciones);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una reservacion a la base de datos
    //***********************************************************

    public function searchById(Reservaciones $reservaciones) {
        try {
            return $this->reservacionesDao->searchById($reservaciones);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las reservaciones de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->reservacionesDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class ReservacionesBo
?>