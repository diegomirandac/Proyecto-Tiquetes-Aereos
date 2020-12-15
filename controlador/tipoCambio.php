<?php

//***************************************************************************************
// Funciones para la consulta de indicadores del BCCR
//***************************************************************************************

define('Compra', 317);
define('Venta', 318);

class parametros {

    public $Indicador;
    public $FechaInicio;
    public $FechaFinal;
    public $Nombre;
    public $SubNiveles;
    public $CorreoElectronico;
    public $Token;

    public function __construct($tcIndicador, $tcFechaInicio, $tcFechaFinal, $tcNombre, $tnSubNiveles, $CorreoElectronico, $Token) {
        $this->Indicador = $tcIndicador;
        $this->FechaInicio = $tcFechaInicio;
        $this->FechaFinal = $tcFechaFinal;
        $this->Nombre = $tcNombre;
        $this->SubNiveles = $tnSubNiveles;
        $this->CorreoElectronico = $CorreoElectronico;
        $this->Token = $Token;
    }

}

function obtenerIndicadorBCCR($param) {
    libxml_disable_entity_loader(false);
    $cambio = 0;
    $textIndicador = "Compra";
    if ($param === 318) {
        $textIndicador = "Venta";
    }
    //**********************************************
    //se consulta el tipo de cambio en el BCCR
    //**********************************************
    try {

        
        $soapClientOptions = [
            'cache_wsdl'     => WSDL_CACHE_NONE,
            'trace'          => 1,
            'stream_context' => stream_context_create(
                [
                    'ssl' => [
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                        'allow_self_signed' => true
                    ]
                ]
            )
        ];
        
        //Obtener usuario bccr 
        //https://www.bccr.fi.cr/seccion-indicadores-economicos/servicio-web
        
        $cliente = new SoapClient("https://gee.bccr.fi.cr/Indicadores/Suscripciones/WS/wsindicadoreseconomicos.asmx?wsdl",$soapClientOptions);
        
        $todaydate = date('d/m/Y');
        $respuesta = $cliente->ObtenerIndicadoresEconomicosXML(new parametros($param, $todaydate, $todaydate, $textIndicador, "N", "nuevacuentaparasteam@hotmail.com", "N0AERLSAAT"));

        $array = "";
        foreach ($respuesta as $key => $value) {
            if ($key === "ObtenerIndicadoresEconomicosXMLResult") {

                $array = explode(" ", $value);
                $pos = strpos($array[14], '.');
                $enteros = substr($array[14], $pos - 3, 3);
                $decimales = substr($array[14], $pos + 1, 2);
                $cambio = floatval($enteros . "." . $decimales);
            }
        }
    } catch (Exception $e) {
        echo($e->getMessage());
        $cambio = 0;
        $cambio = 500;
    }
    return $cambio;
}

//************************************************************
//  Controller 
//************************************************************

if ((filter_input(INPUT_POST, 'action') !== null) or ( filter_input(INPUT_GET, 'action') !== null)) {

    if ((filter_input(INPUT_POST, 'action') != null)) {
        $action = filter_input(INPUT_POST, 'action');
    } else {
        $action = filter_input(INPUT_GET, 'action');
    }


    try {

        //***********************************************************
        //Consultar 
        //***********************************************************

        if ($action == "consultarTipoCambio") {
            $tipoCambioCompra = obtenerIndicadorBCCR(Compra);
            $tipoCambioVenta = obtenerIndicadorBCCR(Venta);
            
            echo('
                    {
                        "compra":'.$tipoCambioCompra.',
                        "venta" :'.$tipoCambioVenta.'
                    }
                  ');
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>