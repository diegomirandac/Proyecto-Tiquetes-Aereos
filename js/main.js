function Pasajero(nombre, apellido, dni, asiento)
{
    this.nombre = nombre;
    this.apellido = apellido;
    this.dni = dni;
    this.asiento = asiento;
}

function Bus (nroAsientos) {   
   this.arreglo = new Array (nroAsientos); 
   for (var i = 0; i  < nroAsientos; i++)
      this.arreglo[i] = new Pasajero(undefined, undefined, undefined, undefined);

   this.numAsiento = undefined;
   // inputs
   this.asiento = document.getElementById("asiento");
   this.nombre = document.getElementById("nombre");
   this.apellido = document.getElementById("apellido");
   this.dni = document.getElementById("dni");
   // celda actual
   this.celda = undefined;
   
   this.seleccionar = function(event)
   {
       this.celda = event.target;
       this.numAsiento = (event.target.textContent);
       this.asiento.value = this.numAsiento;
       this.mostrar(parseInt (this.numAsiento) - 1);
       this.nombre.focus();
   }
   
   this.reservar =  function ()    {
       if(this.asiento.value != "" && this.nombre.value != "" && this.apellido.value != "" && this.dni.value != "")
       {
           this.arreglo[this.numAsiento - 1] = new Pasajero(this.nombre.value, this.apellido.value, this.dni.value, this.numAsiento);
           this.limpiarTodo(true);
           this.celda.style.backgroundColor = "#ff5757";           
       }
       else
       {
           alert("Faltan datos");
           nombre.focus();
       }
   }

   this.mostrar = function(num)
   {
       if(this.arreglo[num].nombre != undefined)
       {
           this.nombre.value = this.arreglo[num].nombre;
           this.apellido.value = this.arreglo[num].apellido;
           this.dni.value = this.arreglo[num].dni;
       }
       else
       {
           this.limpiarTodo(false);
       }
   }
   
   this.limpiarTodo = function(todo)
   {
       this.nombre.value = "";
       this.apellido.value = "";
       this.dni.value = "";
       if(todo)
       {
           this.asiento.value = "";
       }
   }

}

var celdas = document.getElementsByTagName("td");
var bus = new Bus (32) ;

for(var i = 0; i < celdas.length; i++)
{
    celdas[i].onclick = function (event) {
        bus.seleccionar(event);
    }
}

btnReservar.onclick  = function () {
   bus.reservar();
}