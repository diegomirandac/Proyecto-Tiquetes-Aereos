/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    consultarTipoCambio();

});


function consultarTipoCambio() {
    $.ajax({
        url: '../backend/controller/tipoCambio.php',
        type: 'POST',
        data: {
            action: "consultarTipoCambio"
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al enviar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var json  = JSON.parse(data.trim());
            alert(json.compra);
            alert(json.venta);
            
            var tabla   = document.createElement("table");
            var tblBody = JSON.parse(data.trim("tbody"));
 
 
            for (var i = 0; i < 2; i++) {
   
            var hilera = document.createElement("tr");
 
            for (var j = 0; j < 2; j++) {
      
             var celda = document.createElement("td");
            var textoCelda = document.createTextNode("Tipo de cambio compra "+i+", venta "+j);
            celda.appendChild(json.compra);
            hilera.appendChild(json.venta);
        }
 
   
            tblBody.appendChild(hilera);
        }
 
 
        tabla.appendChild(tblBody);
 
        body.appendChild(tabla);
  
        tabla.setAttribute("border", "2");
            
        }

    });
    
    
    

    
    
    
    
    
}


