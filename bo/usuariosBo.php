<?php


require_once("../domain/usuarios.php");
require_once("../dao/usuariosDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class UsuariosBo {

    private $usuariosDao;

    public function __construct() {
        $this->usuariosDao = new UsuariosDao();
    }

    public function getUsuariosDao() {
        return $this->personasDao;
    }

    public function setUsuariosDao(UsuariosDao $usuariosDao) {
        $this->personasDao = $usuariosDao;
    }

    //***********************************************************
    //agrega a un usuario a la base de datos
    //***********************************************************

    public function add(Usuarios $usuarios) {
        try {
            if (!$this->usuariosDao->exist($usuarios)) {
                $this->usuariosDao->add($usuarios);
            } else {
                throw new Exception("El usuarios ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a un usuario a la base de datos
    //***********************************************************

    public function update(Usuarios $usuarios) {
        try {
            $this->usuariosDao->update($usuarios);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a un usuario a la base de datos
    //***********************************************************

    public function delete(Usuarios $usuarios) {
        try {
            $this->usuariosDao->delete($personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a un usuario a la base de datos
    //***********************************************************

    public function searchById(Usuarios $usuarios) {
        try {
            return $this->usuariosDao->searchById($usuarios);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas los usuarios de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->usuariosDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class UsuariosBo
?>