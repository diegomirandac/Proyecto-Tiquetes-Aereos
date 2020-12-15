<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/vuelos.php");

/**
 * 
 * @author Diego Miranda
 * 
 *
 */

//this attribute enable to see the SQL's executed in the data base


class VuelosDao {

    
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
    //agrega a un vuelo a la base de datos
    //***********************************************************

    public function add(Vuelos $vuelos) {
        try {
            $sql = sprintf("insert into mydb.vuelos (PK_vuelo, ruta_PK_ruta, catalogoAvion_PK_catalogoavion, fecha_hora) 
                                          values (%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("PK_vuelo"),
                    $this->labAdodb->Param("ruta_PK_ruta"),
                    $this->labAdodb->Param("catalogoAvion_PK_catalogoavion"),
                    $this->labAdodb->Param("fecha_hora"));
                    
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_vuelo"]       = $vuelos->getPK_vuelo();
            $valores["ruta_PK_ruta"]     = $vuelos->getruta_PK_ruta();
            $valores["catalogoAvion_PK_catalogoavion"]       = $vuelos->getcatalogoAvion_PK_catalogoavion();
            $valores["fecha_hora"]       = $vuelos->getfecha_hora();
        

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase VuelosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un vuelo existe en la base de datos por ID
    //***********************************************************

    public function exist(Vuelos $vuelos) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.reservaciones where  PK_vuelo = %s ",
                            $this->labAdodb->Param("PK_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_vuelo"] = $vuelos->getPK_vuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase VuelosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un vuelo en la base de datos
    //***********************************************************

    public function update(Vuelos $vuelos) {
        try {
            $sql = sprintf("update Vuelos set ruta_PK_ruta = %s, 
                                                catalogoAvion_PK_catalogoavion = %s, 
                                                fecha_hora = %s, 
                                             

                            where PK_vuelo = %s",
                    $this->labAdodb->Param("ruta_PK_ruta"),
                    $this->labAdodb->Param("catalogoAvion_PK_catalogoavion"),
                    $this->labAdodb->Param("fecha_hora"),
                    $this->labAdodb->Param("PK_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["ruta_PK_ruta"]    = $vuelos->getruta_PK_ruta();
            $valores["catalogoAvion_PK_catalogoavion"]      = $vuelos->getcatalogoAvion_PK_catalogoavion();
            $valores["fecha_hora"]  = $vuelos->getfecha_hora();
            $valores["PK_vuelo"]      = $vuelos->getPK_vuelo();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase VuelosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina un vuelo en la base de datos
    //***********************************************************

    public function delete(Vuelos $vuelos) {

        
        try {
            $sql = sprintf("delete from Vuelos where  PK_vuelo = %s",
                            $this->labAdodb->Param("PK_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["PK_vuelo"] = $vuelos->getPK_vuelo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase VuelosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un vuelo en la base de datos
    //***********************************************************

    public function searchById(Vuelos $vuelos) {
        $returnVuelos = null;
        try {
            $sql = sprintf("select * from Vuelos where  PK_vuelo = %s",
                            $this->labAdodb->Param("PK_vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_vuelo"] = $vuelos->getPK_vuelo();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnVuelos = Vuelos::createNullVuelos();
                $returnVuelos->setPK_vuelo($resultSql->Fields("PK_vuelo"));
                $returnVuelos->setruta_PK_ruta($resultSql->Fields("ruta_PK_ruta"));
                $returnVuelos->setcatalogoAvion_PK_catalogoavion($resultSql->Fields("catalogoAvion_PK_catalogoavion"));
                $returnVuelos->setfecha_hora($resultSql->Fields("fecha_hora"));
                
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase VuelosDao), error:'.$e->getMessage());
        }
        return $returnVuelos;
    }

    //***********************************************************
    //obtiene la información de los vuelos en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.vuelos");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase VuelosDao), error:'.$e->getMessage());
        }
    }

}
