<?php

require_once("baseDomain.php");

/**
 * @author Diego Miranda
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Reservaciones extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_reservacion;
    private $usuarios_PK_usuario;
    private $vuelos_PK_vuelo;
    private $fecha_reservacion;
    private $numero_fila;
    private $numero_asiento;
    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullReservaciones() {
        $instance = new self();
        return $instance;
    }

    public static function createReservaciones($PK_reservacion, $usuarios_PK_usuario, $vuelos_PK_vuelo, $fecha_reservacion, $numero_fila, $numero_asiento, $ultUsuario) {
        $instance = new self();
        $instance->PK_reservacion       = $PK_reservacion;
        $instance->usuarios_PK_usuario     = $usuarios_PK_usuario;
        $instance->vuelos_PK_vuelo       = $vuelos_PK_vuelo;
        $instance->fecha_reservacion   = $fecha_reservacion;
        $instance->numero_fila    = $numero_fila;
        $instance->numero_asiento     = $numero_asiento;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPK_reservacion() {
        return $this->PK_reservacion;
    }

    public function setPK_reservacion($PK_reservacion) {
        $this->PK_reservacion = $PK_reservacion;
    }

    /****************************************************************************/

    public function getUsuario_PK_usuario() {
        return $this->usuario_PK_usuario;
    }

    public function setUsuario_PK_usuario($usuario_PK_usuario) {
        $this->usuario_PK_usuario = $usuario_PK_usuario;
    }

    /****************************************************************************/

    public function getVuelos_PK_vuelo() {
        return $this->vuelos_PK_vuelo;
    }

    public function setVuelos_PK_vuelo($vuelos_PK_vuelo) {
        $this->vuelos_PK_vuelo = $vuelos_PK_vuelo;
    }

    /****************************************************************************/

    public function getFecha_reservacion() {
        return $this->fecha_reservacion;
    }

    public function setFecha_reservacion($fecha_reservacion) {
        $this->fecha_reservacion = $fecha_reservacion;
    }

    /****************************************************************************/

    public function getNumero_fila() {
        return $this->numero_fila;
    }

    public function setNumero_fila($numero_fila) {
        $this->numero_fila = $numero_fila;
    }

    /****************************************************************************/

    public function getNumero_asiento() {
        return $this->numero_asiento;
    }

    public function setNumero_asiento($numero_asiento) {
        $this->numero_asiento = $numero_asiento;
    }

    
    /****************************************************************************/

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}