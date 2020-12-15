<?php

require_once("baseDomain.php");

/**
 * 
 *
 */
class Catalogoavions extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_catalogoavion;
    private $año;
    private $modelo;
    private $marca;
    private $cantidad_filas;
    private $asientos_por_filas;
    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullCatalogoavions() {
        $instance = new self();
        return $instance;
    }

    public static function createCatalogoavions($PK_catalogoavion, $año, $modelo, $marca, $cantidad_filas, $asientos_por_filas, $catalogoAvioncol) {
        $instance = new self();
        $instance->PK_catalogoavion       = $PK_catalogoavion;
        $instance->año     = $año;
        $instance->modelo       = $modelo;
        $instance->marca   = $marca;
        $instance->cantidad_filas    = $cantidad_filas;
        $instance->asientos_por_filas     = $asientos_por_filas;
        $instance->catalogoAvioncol     = $catalogoAvioncol;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPK_catalogoavion() {
        return $this->PK_catalogoavion;
    }

    public function setPK_catalogoavion($PK_catalogoavion) {
        $this->PK_catalogoaviono = $PK_catalogoavion;
    }

    /****************************************************************************/

    public function getAño() {
        return $this->año;
    }

    public function setAño($año) {
        $this->año = $año;
    }

    /****************************************************************************/

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    /****************************************************************************/

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    /****************************************************************************/

    public function getCantidad_filas() {
        return $this->cantidad_filas;
    }

    public function setCantidad_filas($cantidad_filas) {
        $this->cantidad_filas = $cantidad_filas;
    }

    /****************************************************************************/

    public function getAsientos_por_filas() {
        return $this->asientos_por_filas;
    }

    public function setAsientos_por_filas($asientos_por_filas) {
        $this->asientos_por_filas = $asientos_por_filas;
    }

    
    /****************************************************************************/

    public function getCatalogoAvioncol() {
        return $this->catalogoAvioncol;
    }

    public function setCatalogoAvioncol($catalogoAvioncol) {
        $this->catalogoAvioncol = $catalogoAvioncol;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}