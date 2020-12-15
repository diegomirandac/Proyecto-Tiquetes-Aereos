<?php

require_once("baseDomain.php");

/**
 * @author Diego Miranda
 *
 *
 */
class Rutas extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_ruta;
    private $trayecto;
    private $duracion;
    private $precio;
    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRutas() {
        $instance = new self();
        return $instance;
    }

    public static function createVuelos($PK_ruta, $trayecto, $duracion, $precio) {
        $instance = new self();
        $instance->PK_ruta       = $PK_ruta;
        $instance->trayecto     = $trayecto;
        $instance->duracion       = $duracion;
        $instance->precio   = $precio;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPK_ruta() {
        return $this->PK_ruta;
    }

    public function setPK_vuelo($PK_ruta) {
        $this->PK_ruta = $PK_ruta;
    }

    /****************************************************************************/

    public function getTrayecto() {
        return $this->trayecto;
    }

    public function setTrayecto($trayecto) {
        $this->trayecto = $trayecto;
    }

    /****************************************************************************/

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    /****************************************************************************/

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    /****************************************************************************/

    

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}