<?php


require_once("../domain/vuelos.php");
require_once("../dao/vuelosDao.php");

/**
 * 
 *
 */
class VuelosBo {

    private $vuelosDao;

    public function __construct() {
        $this->vuelosDao = new VuelosDao();
    }

    public function getVuelosDao() {
        return $this->vuelosDao;
    }

    public function setVuelosDao(VuelosDao $vuelosDao) {
        $this->vuelosDao = $vuelosDao;
    }

    //***********************************************************
    //agrega a un vuelo a la base de datos
    //***********************************************************

    public function add(Vuelos $vuelos) {
        try {
            if (!$this->vuelosDao->exist($vuelos)) {
                $this->vuelosDao->add($vuelos);
            } else {
                throw new Exception("El vuelos ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica  un vuelo en la base de datos
    //***********************************************************

    public function update(Vuelos $vuelos) {
        try {
            $this->vuelosDao->update($vuelos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un vuelo de la base de datos
    //***********************************************************

    public function delete(Vuelos $vuelos) {
        try {
            $this->vuelosDao->delete($vuelos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un vuelo a la base de datos
    //***********************************************************

    public function searchById(Vuelos $vuelos) {
        try {
            return $this->vuelosDao->searchById($vuelos);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todos los vuelos de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->vuelosDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class VuelosBo
?>