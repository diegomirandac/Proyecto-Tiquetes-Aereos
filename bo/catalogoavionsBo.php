<?php


require_once("../domain/catalogoavions.php");
require_once("../dao/catalogoavionsDao.php");

/**
 *
 *
 */
class CatalogoavionsBo {

    private $catalogoavionsDao;

    public function __construct() {
        $this->catalogoavionsDao = new CatalogoavionsDao();
    }

    public function getCatalogoavionsDao() {
        return $this->catalogoavionsDao;
    }

    public function setCatalogoavionsDao(CatalogoavionsDao $catalogoavionsDao) {
        $this->catalogoavionsDao = $catalogoavionsDao;
    }

    //***********************************************************
    //agrega a un avion a la base de datos
    //***********************************************************

    public function add(Catalogoavions $catalogoavions) {
        try {
            if (!$this->catalogoavionsDao->exist($catalogoavions)) {
                $this->catalogoavionsDao->add($catalogoavions);
            } else {
                throw new Exception("El catalogoavions ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a un avion a la base de datos
    //***********************************************************

    public function update(Catalogoavions $catalogoavions) {
        try {
            $this->catalogoavionsDao->update($catalogoavions);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un avion a la base de datos
    //***********************************************************

    public function delete(Catalogoavions $catalogoavions) {
        try {
            $this->catalogoavionsDao->delete($catalogoavions);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un avion a la base de datos
    //***********************************************************

    public function searchById(Catalogoavions $catalogoavions) {
        try {
            return $this->catalogoavionsDao->searchById($catalogoavions);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas los aviones de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->catalogoavionsDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class CatalogoavionsBo
?>