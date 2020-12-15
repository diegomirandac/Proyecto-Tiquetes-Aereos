<?php

require_once("baseDomain.php");

/**
 * @author Diego Miranda
 *
 *
 */
class Vuelos extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_vuelo;
    private $ruta_PK_ruta;
    private $catalogoAvion_PK_catalogoavion;
    private $fecha_hora;
    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullVuelos() {
        $instance = new self();
        return $instance;
    }

    public static function createVuelos($PK_vuelo, $ruta_PK_ruta, $catalogoAvion_PK_catalogoavion, $fecha_hora) {
        $instance = new self();
        $instance->PK_vuelo       = $PK_vuelo;
        $instance->ruta_PK_ruta     = $ruta_PK_ruta;
        $instance->catalogoAvion_PK_catalogoavion       = $catalogoAvion_PK_catalogoavion;
        $instance->fecha_hora   = $fecha_hora;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPK_vuelo() {
        return $this->PK_vuelo;
    }

    public function setPK_vuelo($PK_vuelo) {
        $this->PK_vuelo = $PK_vuelo;
    }

    /****************************************************************************/

    public function getRuta_PK_ruta() {
        return $this->ruta_PK_ruta;
    }

    public function setRuta_PK_ruta($ruta_PK_ruta) {
        $this->ruta_PK_ruta = $ruta_PK_ruta;
    }

    /****************************************************************************/

    public function getCatalogoAvion_PK_catalogoavion() {
        return $this->catalogoAvion_PK_catalogoavion;
    }

    public function setCatalogoAvion_PK_catalogoavion($catalogoAvion_PK_catalogoavion) {
        $this->catalogoAvion_PK_catalogoavion = $catalogoAvion_PK_catalogoavion;
    }

    /****************************************************************************/

    public function getFecha_hora() {
        return $this->fecha_hora;
    }

    public function setFecha_hora($fecha_hora) {
        $this->fecha_hora = $fecha_hora;
    }

    /****************************************************************************/

    

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}