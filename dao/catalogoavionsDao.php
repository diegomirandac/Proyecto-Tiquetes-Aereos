<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/catalogoavions.php");

/**
 * 
 * 
 */

//this attribute enable to see the SQL's executed in the data base


class CatalogoavionsDao {

    
    private $labAdodb;//objeto de conexion con la base de datos    
    
    public function __construct() {
        //se crea el objeto con la conexión de la base de datos
        //según los datos del servidor de mysql
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        //los cados de conexión   host,       user,   pass,   basedatos
        $this->labAdodb->Connect("localhost", "root", "letsrock@", "mydb");   
        
        //si se desea hacer debug del SQL que se genera en la base de datos
        //dependiendo del error es necesario ver si es un error directamente
        //en la base de datos
        $this->labAdodb->debug=false;
    }

    //***********************************************************
    //agrega a un catalogoavions a la base de datos
    //***********************************************************

    public function add(Catalogoavions $catalogoavions) {
        try {
            $sql = sprintf("insert into mydb.usuarios (PK_catalogoavion, año, modelo, marca, cantidad_filas, asientos_por_filas, catalogoAvioncol) 
                                          values (%s,%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("PK_catalogoavion"),
                    $this->labAdodb->Param("año"),
                    $this->labAdodb->Param("modelo"),
                    $this->labAdodb->Param("marca"),
                    $this->labAdodb->Param("cantidad_filas"),
                    $this->labAdodb->Param("asientos_por_filas"),
                    $this->labAdodb->Param("catalogoAvioncol"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_catalogoavion"]       = $catalogoavions->getPK_catalogoavion();
            $valores["año"]     = $catalogoavions->getaño();
            $valores["modelo"]       = $catalogoavions->getmodelo();
            $valores["marca"]       = $catalogoavions->getmarca();
            $valores["cantidad_filas"]   = $catalogoavions->getcantidad_filas();
            $valores["asientos_por_filas"]        = $catalogoavions->getasientos_por_filas();
            $valores["catalogoAvioncol"]        = $catalogoavions->getcatalogoAvioncol();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase CatalogoavionsDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un catalogoavions existe en la base de datos por ID
    //***********************************************************

    public function exist(Catalogoavions $catalogoavions) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.catalogoavions where  PK_catalogoavion = %s ",
                            $this->labAdodb->Param("PK_catalogoavion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_catalogoavion"] = $catalogoavion->getPK_catalogoavion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase CatalogoavionsDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un catalogoavions en la base de datos
    //***********************************************************

    public function update(Catalogoavions $catalogoavions) {
        try {
            $sql = sprintf("update Catalogoavions set año = %s, 
                                                modelo = %s, 
                                                marca = %s, 
                                                cantidad_filas = %s, 
                                                asientos_por_filas = %s,
                                                catalogoAvioncol = %s
                            where PK_catalogoavion = %s",
                    $this->labAdodb->Param("año"),
                    $this->labAdodb->Param("modelo"),
                    $this->labAdodb->Param("marca"),
                    $this->labAdodb->Param("cantidad_filas"),
                    $this->labAdodb->Param("asientos_por_filas"),
                    $this->labAdodb->Param("catalogoAvioncol"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["año"]    = $catalogoavions->getaño();
            $valores["modelo"]      = $catalogoavions->getmodelo();
            $valores["marca"]  = $catalogoavions->getmarca();
            $valores["cantidad_filas"]   = $catalogoavions->getcantidad_filas();
            $valores["asientos_por_filas"]    = $catalogoavions->getasientos_por_filas();
            $valores["catalogoAvioncol"]    = $catalogoavions->getcatalogoAvioncol();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase CatalogoavionsDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina un catalogoavions en la base de datos
    //***********************************************************

    public function delete(Catalogoavions $catalogoavions) {

        
        try {
            $sql = sprintf("delete from Catalogoavions where  PK_catalogoavion = %s",
                            $this->labAdodb->Param("PK_catalogoavion"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["PK_catalogoavion"] = $catalogoavions->getPK_catalogoavion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase CatalogoavionsDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un catalogoavions en la base de datos
    //***********************************************************

    public function searchById(Catalogoavions $catalogoavions) {
        $returnCatalogoavions = null;
        try {
            $sql = sprintf("select * from Catalogoavions where  PK_catalogoavion = %s",
                            $this->labAdodb->Param("PK_catalogoavion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_catalogoavion"] = $catalogoavions->getPK_catalogoavion();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnCatalogoavions = Catalogoavions::createNullCatalogoavions();
                $returnCatalogoavions->setPK_catalogoavion($resultSql->Fields("PK_catalogoavion"));
                $returnCatalogoavions->setaño($resultSql->Fields("año"));
                $returnCatalogoavions->setmodelo($resultSql->Fields("modelo"));
                $returnCatalogoavions->setmarca($resultSql->Fields("marca"));
                $returnCatalogoavions->setcantidad_filas($resultSql->Fields("cantidad_filas"));
                $returnCatalogoavions->setasientos_por_filas($resultSql->Fields("asientos_por_filas"));
                $returnCatalogoavions->setcatalogoAvioncol($resultSql->Fields("catalogoAvioncol"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase CatalogoavionsDao), error:'.$e->getMessage());
        }
        return $returnCatalogoavions;
    }

    //***********************************************************
    //obtiene la información de los catalogoavions en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.catalogoavions");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase CatalogoavionsDao), error:'.$e->getMessage());
        }
    }

}
