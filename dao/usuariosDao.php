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


class UsuariosDao {

    
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
    //agrega a un usuario a la base de datos
    //***********************************************************

    public function add(Usuarios $usuarios) {
        try {
            $sql = sprintf("insert into mydb.usuarios (PK_usuario, personas_PK_cedula, contraseña, fecha_registro, fecha_actualizacion, tipo_usuario, LASTUSER, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("PK_usuario"),
                    $this->labAdodb->Param("personas_PK_cedula"),
                    $this->labAdodb->Param("contraseña"),
                    $this->labAdodb->Param("fecha_registro"),
                    $this->labAdodb->Param("fecha_actualizacion"),
                    $this->labAdodb->Param("tipo_usuario"),
                    $this->labAdodb->Param("LASTUSER"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_usuario"]       = $usuarios->getPK_usuario();
            $valores["personas_PK_cedula"]     = $usuarios->getpersonas_PK_cedula();
            $valores["contraseña"]       = $usuarios->getcontraseña();
            $valores["fecha_registro"]       = $usuarios->getfecha_registro();
            $valores["fecha_actualizacion"]   = $usuarios->getfecha_actualizacion();
            $valores["tipo_usuario"]            = $usuarios->gettipo_usuario();
            $valores["LASTUSER"]        = $usuarios->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase UsuariosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si un usuario existe en la base de datos por ID
    //***********************************************************

    public function exist(Usuarios $usuarios) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.usuarios where  PK_usuario = %s ",
                            $this->labAdodb->Param("PK_usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_usuario"] = $usuarios->getPK_usuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase UsuariosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un usuario en la base de datos
    //***********************************************************

    public function update(Usuarios $usuarios) {
        try {
            $sql = sprintf("update Usuarios set personas_PK_cedula = %s, 
                                                contraseña = %s, 
                                                fecha_registro = %s, 
                                                fecha_actualizacion = %s, 
                                                tipo_usuario = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where PK_usuario = %s",
                    $this->labAdodb->Param("personas_PK_cedula"),
                    $this->labAdodb->Param("contraseña"),
                    $this->labAdodb->Param("fecha_registro"),
                    $this->labAdodb->Param("fecha_actualizacion"),
                    $this->labAdodb->Param("tipo_usuario"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("PK_usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["personas_PK_cedula"]    = $usuarios->getpersonas_PK_cedula();
            $valores["contraseña"]      = $usuarios->getcontraseña();
            $valores["fecha_registro"]  = $usuarios->getfecha_registro();
            $valores["fecha_actualizacion"]   = $usuarios->getfecha_actualizacion();
            $valores["tipo_usuario"]    = $usuarios->gettipo_usuario();
            $valores["LASTUSER"]        = $usuarios->getLastUser();
            $valores["PK_usuario"]      = $usuarios->getPK_usuario();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuariosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina un usuario en la base de datos
    //***********************************************************

    public function delete(Usuarios $usuarios) {

        
        try {
            $sql = sprintf("delete from Usuarios where  PK_usuario = %s",
                            $this->labAdodb->Param("PK_usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["PK_cedula"] = $usuarios->getPK_usuario();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a un usuario en la base de datos
    //***********************************************************

    public function searchById(Usuarios $usuarios) {
        $returnUsuarios = null;
        try {
            $sql = sprintf("select * from Usuarios where  PK_usuario = %s",
                            $this->labAdodb->Param("PK_usuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_usuario"] = $usuarios->getPK_usuario();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnUsuarios = Usuarios::createNullUsuarios();
                $returnUsuarios->setPK_usuario($resultSql->Fields("PK_usuario"));
                $returnUsuarios->setpersonas_PK_cedula($resultSql->Fields("personas_PK_cedula"));
                $returnUsuarios->setcontraseña($resultSql->Fields("contraseña"));
                $returnUsuarios->setfecha_registro($resultSql->Fields("fecha_registro"));
                $returnUsuarios->setfecha_actualizacion($resultSql->Fields("fecha_actualizacion"));
                $returnUsuarios->settipo_usuario($resultSql->Fields("tipo_usuario"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase UsuariosDao), error:'.$e->getMessage());
        }
        return $returnUsuarios;
    }

    //***********************************************************
    //obtiene la información de los usuarios en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.usuarios");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase UsuariosDao), error:'.$e->getMessage());
        }
    }

}
