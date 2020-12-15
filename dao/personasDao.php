<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/personas.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base


class PersonasDao {

    
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
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Personas $personas) {
        try {
            $sql = sprintf("insert into mydb.personas (PK_cedula, nombre, apellido1, apellido2, fecNacimiento, sexo, observaciones, telefono, LASTUSER, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("PK_cedula"),
                    $this->labAdodb->Param("nombre"),
                    $this->labAdodb->Param("apellido1"),
                    $this->labAdodb->Param("apellido2"),
                    $this->labAdodb->Param("fecNacimiento"),
                    $this->labAdodb->Param("sexo"),
                    $this->labAdodb->Param("observaciones"),
                    $this->labAdodb->Param("telefono"),
                    $this->labAdodb->Param("LASTUSER"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_cedula"]       = $personas->getPK_cedula();
            $valores["nombre"]          = $personas->getnombre();
            $valores["apellido1"]       = $personas->getapellido1();
            $valores["apellido2"]       = $personas->getapellido2();
            $valores["fecNacimiento"]   = $personas->getfecNacimiento();
            $valores["sexo"]            = $personas->getsexo();
            $valores["observaciones"]   = $personas->getobservaciones();
            $valores["telefono"]        = $personas->gettelefono();
            $valores["LASTUSER"]        = $personas->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Personas $personas) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.personas where  PK_cedula = %s ",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_cedula"] = $personas->getPK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Personas $personas) {
        try {
            $sql = sprintf("update Personas set nombre = %s, 
                                                apellido1 = %s, 
                                                apellido2 = %s, 
                                                fecNacimiento = %s, 
                                                sexo = %s, 
                                                observaciones = %s,
                                                telefono = %s
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where PK_cedula = %s",
                    $this->labAdodb->Param("nombre"),
                    $this->labAdodb->Param("apellido1"),
                    $this->labAdodb->Param("apellido2"),
                    $this->labAdodb->Param("fecNacimiento"),
                    $this->labAdodb->Param("sexo"),
                    $this->labAdodb->Param("observaciones"),
                    $this->labAdodb->Param("telefono"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["nombre"]          = $personas->getnombre();
            $valores["apellido1"]       = $personas->getapellido1();
            $valores["apellido2"]       = $personas->getapellido2();
            $valores["fecNacimiento"]   = $personas->getfecNacimiento();
            $valores["sexo"]            = $personas->getsexo();
            $valores["observaciones"]   = $personas->getobservaciones();
            $valores["telefono"]   = $personas->gettelefono();
            $valores["LASTUSER"]        = $personas->getLastUser();
            $valores["PK_cedula"]       = $personas->getPK_cedula();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Personas $personas) {

        
        try {
            $sql = sprintf("delete from Personas where  PK_cedula = %s",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["PK_cedula"] = $personas->getPK_cedula();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Personas $personas) {
        $returnPersonas = null;
        try {
            $sql = sprintf("select * from Personas where  PK_cedula = %s",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_cedula"] = $personas->getPK_cedula();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersonas = Personas::createNullPersonas();
                $returnPersonas->setPK_cedula($resultSql->Fields("PK_cedula"));
                $returnPersonas->setnombre($resultSql->Fields("nombre"));
                $returnPersonas->setapellido1($resultSql->Fields("apellido1"));
                $returnPersonas->setapellido2($resultSql->Fields("apellido2"));
                $returnPersonas->setfecNacimiento($resultSql->Fields("fecNacimiento"));
                $returnPersonas->setsexo($resultSql->Fields("sexo"));
                $returnPersonas->setobservaciones($resultSql->Fields("observaciones"));
                $returnPersonas->settelefono($resultSql->Fields("telefono"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonasDao), error:'.$e->getMessage());
        }
        return $returnPersonas;
    }

    //***********************************************************
    //obtiene la información de las personas en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.personas");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

}
