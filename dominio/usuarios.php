<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Usuarios extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_usuario;
    private $personas_PK_cedula;
    private $contraseña;
    private $fecha_registro;
    private $fecha_actualizacion;
    private $tipo_usuario;
    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullUsuarios() {
        $instance = new self();
        return $instance;
    }

    public static function createUsuarios($PK_usuario, $personas_PK_cedula, $contraseña, $fecha_registro, $fecha_actualizacion, $tipo_usuario, $ultUsuario, $ultModificacion, $lastUser, $lastModification) {
        $instance = new self();
        $instance->PK_usuario       = $PK_usuario;
        $instance->personas_PK_cedula     = $personas_PK_cedula;
        $instance->contraseña       = $contraseña;
        $instance->fecha_registro   = $fecha_registro;
        $instance->fecha_actualizacion    = $fecha_actualizacion;
        $instance->tipo_usuario     = $tipo_usuario;
        $instance->setLastUser($ultUsuario);
        $instance->setLastModification($ultModificacion);
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPK_usuario() {
        return $this->PK_usuario;
    }

    public function setPK_usuario($PK_usuario) {
        $this->PK_usuario = $PK_usuario;
    }

    /****************************************************************************/

    public function getpersonas_PK_cedula() {
        return $this->personas_PK_cedula;
    }

    public function setpersonas_PK_cedula($personas_PK_cedula) {
        $this->personas_PK_cedula = $personas_PK_cedula;
    }

    /****************************************************************************/

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    /****************************************************************************/

    public function getFecha_registro() {
        return $this->fecha_registro;
    }

    public function setFecha_registro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    /****************************************************************************/

    public function getFecha_actualizacion() {
        return $this->fecha_actualizacion;
    }

    public function setFecha_actualizacion($fecha_actualizacion) {
        $this->fecha_actualizacion = $fecha_actualizacion;
    }

    /****************************************************************************/

    public function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    public function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
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