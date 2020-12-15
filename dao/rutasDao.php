<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/rutas.php");

/**
 * 
 * @author Diego Miranda
 * 
 *
 */

//this attribute enable to see the SQL's executed in the data base


class RutasDao {

    
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
    //agrega a una ruta a la base de datos
    //***********************************************************

    public function add(Rutas $rutas) {
        try {
            $sql = sprintf("insert into mydb.rutas (PK_vuelo, trayecto, duracion, precio) 
                                          values (%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("PK_ruta"),
                    $this->labAdodb->Param("trayecto"),
                    $this->labAdodb->Param("duracion"),
                    $this->labAdodb->Param("precio"));
                    
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_ruta"]       = $rutas->getPK_ruta();
            $valores["trayecto"]     = $rutas->gettrayecto();
            $valores["duracion"]       = $rutas->getduracion();
            $valores["precio"]       = $rutas->getprecio();
        

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase RutasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un vuelo existe en la base de datos por ID
    //***********************************************************

    public function exist(Rutas $rutas) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.rutas where  PK_ruta = %s ",
                            $this->labAdodb->Param("PK_ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_ruta"] = $rutas->getPK_ruta();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RutasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una ruta en la base de datos
    //***********************************************************

    public function update(Rutas $rutas) {
        try {
            $sql = sprintf("update Rutas set trayecto = %s, 
                                                duracion = %s, 
                                                precio = %s, 
                                             

                            where PK_ruta = %s",
                    $this->labAdodb->Param("trayecto"),
                    $this->labAdodb->Param("duracion"),
                    $this->labAdodb->Param("precio"),
                    $this->labAdodb->Param("PK_ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["trayecto"]    = $rutas->gettrayecto();
            $valores["duracion"]      = $rutas->getduracion();
            $valores["precio"]  = $rutas->getprecio();
            $valores["PK_ruta"]      = $rutas->getPK_ruta();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RutasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una ruta en la base de datos
    //***********************************************************

    public function delete(Rutas $rutas) {

        
        try {
            $sql = sprintf("delete from Rutas where  PK_ruta = %s",
                            $this->labAdodb->Param("PK_ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["PK_ruta"] = $rutas->getPK_ruta();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RutasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un vuelo en la base de datos
    //***********************************************************

    public function searchById(Rutas $rutas) {
        $returnRutas = null;
        try {
            $sql = sprintf("select * from Rutas where  PK_ruta = %s",
                            $this->labAdodb->Param("PK_ruta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_ruta"] = $rutas->getPK_ruta();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnRutas = Rutas::createNullRutas();
                $returnRutas->setPK_ruta($resultSql->Fields("PK_ruta"));
                $returnRutas->settrayecto($resultSql->Fields("trayecto"));
                $returnRutas->setduracion($resultSql->Fields("duracion"));
                $returnRutas->setprecio($resultSql->Fields("precio"));
                
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase RutasDao), error:'.$e->getMessage());
        }
        return $returnRutas;
    }

    //***********************************************************
    //obtiene la información de las rutas en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.rutas");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RutasDao), error:'.$e->getMessage());
        }
    }

}
