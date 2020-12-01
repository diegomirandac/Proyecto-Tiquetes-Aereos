<?php

require_once("adodb5/adodb.inc.php");
require_once("../domain/reservaciones.php");

/**
 * 
 * @author Diego Miranda
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base


class ReservacionesDao {

    
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

    public function add(Reservaciones $reservaciones) {
        try {
            $sql = sprintf("insert into mydb.usuarios (PK_reservacion, usuario_PK_usuario, vuelos_PK_vuelo, fecha_reservacion, numero_fila, numero_asiento) 
                                          values (%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("PK_reservacion"),
                    $this->labAdodb->Param("usuario_PK_usuario"),
                    $this->labAdodb->Param("vuelos_PK_vuelo"),
                    $this->labAdodb->Param("fecha_reservacion"),
                    $this->labAdodb->Param("numero_fila"),
                    $this->labAdodb->Param("numero_asiento"));
                    
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_reservacion"]       = $reservaciones->getPK_reservacion();
            $valores["usuario_PK_usuario"]     = $reservaciones->getusuario_PK_usuario();
            $valores["vuelos_PK_vuelo"]       = $reservaciones->getvuelos_PK_vuelo();
            $valores["fecha_reservacion"]       = $reservaciones->getfecha_reservacion();
            $valores["numero_fila"]   = $reservaciones->getnumero_fila();
            $valores["numero_asiento"]            = $reservaciones->getnumero_asiento();
        

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase ReservacionesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una reservacion existe en la base de datos por ID
    //***********************************************************

    public function exist(Reservaciones $reservaciones) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.reservaciones where  PK_reservacion = %s ",
                            $this->labAdodb->Param("PK_reservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_reservacion"] = $reservaciones->getPK_reservacion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ReservacionesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica un usuario en la base de datos
    //***********************************************************

    public function update(Reservaciones $reservaciones) {
        try {
            $sql = sprintf("update Reservaciones set usuario_PK_usuario = %s, 
                                                vuelos_PK_vuelo = %s, 
                                                fecha_reservacion = %s, 
                                                numero_fila = %s, 
                                                numero_asiento = %s

                            where PK_reservacion = %s",
                    $this->labAdodb->Param("usuario_PK_usuario"),
                    $this->labAdodb->Param("vuelos_PK_vuelo"),
                    $this->labAdodb->Param("fecha_reservacion"),
                    $this->labAdodb->Param("numero_fila"),
                    $this->labAdodb->Param("numero_asiento"),
                    $this->labAdodb->Param("PK_reservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["usuario_PK_usuario"]    = $usuarios->getusuario_PK_usuario();
            $valores["vuelos_PK_vuelo"]      = $usuarios->getvuelos_PK_vuelo();
            $valores["fecha_reservacion"]  = $usuarios->getfecha_reservacion();
            $valores["numero_fila"]   = $usuarios->getnumero_fila();
            $valores["numero_asiento"]    = $usuarios->getnumero_asiento();
            $valores["PK_reservacion"]      = $usuarios->getPK_reservacion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase UsuariosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una reservacion en la base de datos
    //***********************************************************

    public function delete(Reservaciones $reservaciones) {

        
        try {
            $sql = sprintf("delete from Reservaciones where  PK_reservacion = %s",
                            $this->labAdodb->Param("PK_reservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["PK_reservacion"] = $reservaciones->getPK_reservacion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ReservacionesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una reservaciones en la base de datos
    //***********************************************************

    public function searchById(Usuarios $reservaciones) {
        $returnReservaciones = null;
        try {
            $sql = sprintf("select * from Reservaciones where  PK_reservacion = %s",
                            $this->labAdodb->Param("PK_reservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_reservacion"] = $reservaciones->getPK_reservacion();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnReservaciones = Reservaciones::createNullReservaciones();
                $returnReservaciones->setPK_reservacion($resultSql->Fields("PK_reservacion"));
                $returnReservaciones->setusuario_PK_usuario($resultSql->Fields("usuario_PK_usuario"));
                $returnReservaciones->setvuelos_PK_vuelo($resultSql->Fields("vuelos_PK_vuelo"));
                $returnReservaciones->setfecha_registro($resultSql->Fields("fecha_reservacion"));
                $returnReservaciones->setfecha_actualizacion($resultSql->Fields("numero_fila"));
                $returnReservaciones->settipo_usuario($resultSql->Fields("numero_asiento"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase ReservacionesDao), error:'.$e->getMessage());
        }
        return $returnReservaciones;
    }

    //***********************************************************
    //obtiene la información de las reservaciones en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.reservaciones");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservacionesDao), error:'.$e->getMessage());
        }
    }

}
