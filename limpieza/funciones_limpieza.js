// mostra los calculos de los viajes
 function contarViajes() {
    var totalViajes = 0;
    var totalKg = 0;

   
    // Iterar sobre los inputs de viaje y contar los no vacíos y no cero
    for (var i = 1; i <= 4; i++) {
      var valorViaje = document.getElementById('viaje' + i).value.trim();
      // Convertir el valor a un número y sumarlo
      totalKg += parseFloat(valorViaje) || 0; // Si no es un número válido, se suma 0
  
      // Verificar si el valor no está vacío y no es cero
      if (valorViaje !== '' && parseFloat(valorViaje) !== 0) {
        totalViajes++;
        // Mostrar el resultado en el input cantidad_viajes
    document.getElementById('cantidad_viajes').value = totalViajes;
  

      }
    }
      
    // Mostrar el resultado en el input total_kg
    document.getElementsByName('total_kg')[0].value = totalKg.toFixed(2);
  
    // Convertir el total a toneladas (1 kg = 0.001 toneladas)
    var totalToneladas = totalKg * 0.001;
  
    // Mostrar el resultado en el input toneladas
    document.getElementsByName('toneladas')[0].value = totalToneladas.toFixed(2); // Redondear a 2 decimales
    mostrarKM(totalViajes);

    return totalViajes;

  }
 
  //fin viajes
  
 //muestra los datos del equipo
  function mostrarDescripcion() {
      var equipoSeleccionado = document.getElementById("equipos").value;
  
      // Realizar una petición AJAX para obtener la descripción del equipo
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if (xhr.readyState == 4 && xhr.status == 200) {
              document.getElementById("descripcion").value = xhr.responseText;
          }
      };
  
      xhr.open("GET", "descripcion.php?equipo=" + equipoSeleccionado, true);
      xhr.send();
  }
 //fin equipos datos
  
 //muestra los datos del empleado
 function mostrarDetalles(inputId, nombreId) {
    var empleadoSeleccionado = document.getElementById(inputId).value;

    // Realizar una petición AJAX para obtener detalles del empleado
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var detalles = JSON.parse(xhr.responseText);
            document.getElementById(nombreId).value = detalles.nombre_apellido;
            
        }
    };

    xhr.open("GET", "info_trabajador.php?inss=" + empleadoSeleccionado, true);
    xhr.send();
}
 //fin datos empleados
  
  // muestra info del empleado a traves del inss
 
  $(document).ready(function(){
   $('.frame').multiselect({
    nonSelectedText: 'inss',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'100%',
    maxHeight: 200,
   });
   
   $('.framework_form').on('submit', function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    var url = "llamado_inss.php";  // Especifica tu URL aquí
    var method = "POST";  // Especifica tu método HTTP aquí (por ejemplo, POST)
    
    $.ajax({
     url: url,
     method: method,
     data: form_data,
     success: function(data) {
      $('.frame option:selected').each(function(){
       $(this).prop('selected', false);
      });
      $('.frame').multiselect('refresh');
      alert(data);
     }
    });
   });
  });


  //FIN INSS

  //llamado de fiscales
 function mostrarDetalles2(inputId, nombreId) {
    var empleadoSeleccionado = document.getElementById(inputId).value;

    // Realizar una petición AJAX para obtener detalles del empleado
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var detalles = JSON.parse(xhr.responseText);
            document.getElementById(nombreId).value = detalles.nombre_apellido;
     
        }
    };

    xhr.open("GET", "info_fiscal.php?inss=" + empleadoSeleccionado, true);
    xhr.send();
}
//fin fiscal

//llamado Jefe de Seccion
function mostrarDetalles3(inputId, nombreId) {
    var empleadoSeleccionado = document.getElementById(inputId).value;

    // Realizar una petición AJAX para obtener detalles del empleado
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var detalles = JSON.parse(xhr.responseText);
            document.getElementById(nombreId).value = detalles.nombre_apellido;
  
        }
    };

    xhr.open("GET", "info_js.php?inss=" + empleadoSeleccionado, true);
    xhr.send();
}
//fin jefe de seccion
  
  // muestra ruta
 
  $(document).ready(function(){
   $('#ruta').multiselect({
    nonSelectedText: 'ruta',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'100%',
    maxHeight: 200,
   });
   
   $('#framework_form').on( function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
     url:"",
     method:"",
     data:form_data,
     success:function(data)
     {
      $('#ruta option:selected').each(function(){
       $(this).prop('selected', false);
      });
      $('#ruta').multiselect('refresh');
      alert(data);
     }
    });
   });
   
  });
 
  
 // muestra equipos
  $(document).ready(function(){
   $('#equipos').multiselect({
    nonSelectedText: 'equipos',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'100%',
    maxHeight: 200,
   });
   
   $('#framework_form').on( function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
     url:"",
     method:"",
     data:form_data,
     success:function(data)
     {
      $('#equipos option:selected').each(function(){
       $(this).prop('selected', false);
      });
      $('#equipos').multiselect('refresh');
      alert(data);
     }
    });
   });
   
   
  });
 
  
 //muestra distrito
  $(document).ready(function(){
   $('.distrito').multiselect({
    nonSelectedText: 'distrito',
    enableFiltering: true,
    enableCaseInsensitiveFiltering: true,
    buttonWidth:'100%',
    maxHeight: 200,
   });
   
   $('.framework_form').on( function(event){
    event.preventDefault();
    var form_data = $(this).serialize();
    $.ajax({
     url:"",
     method:"",
     data:form_data,
     success:function(data)
     {
      $('.distrito option:selected').each(function(){
       $(this).prop('selected', false);
      });
      $('.distrito').multiselect('refresh');
      alert(data);
     }
    });
   });
   
   
  });

     // Función para calcular el total de horas trabajadas
     function calcularTotalHoras() {
        // Obtener las fechas de entrada y salida
        var horaEntrada = document.getElementById('horaEntrada').value;
        var horaSalida = document.getElementById('horaSalida').value;
    
        // Convertir las fechas a objetos de fecha
        var fechaEntrada = new Date('2023-01-01T' + horaEntrada);
        var fechaSalida = new Date('2023-01-01T' + horaSalida);
    
        // Calcular la diferencia en milisegundos
        var diferenciaMilisegundos =  fechaEntrada - fechaSalida;
    
        // Calcular las horas y minutos
        var horas = Math.floor(diferenciaMilisegundos / (1000 * 60 * 60));
        var minutos = Math.floor((diferenciaMilisegundos % (1000 * 60 * 60)) / (1000 * 60));
    
        // Formatear el resultado en HH:mm
        var horasFormateadas = ('0' + horas).slice(-2);
        var minutosFormateados = ('0' + minutos).slice(-2);
    
        // Mostrar el total de horas trabajadas en el campo correspondiente
        document.getElementById('totalHorasTrabajadas').value = horasFormateadas + ':' + minutosFormateados;
    }
    
    // Agregar eventos de cambio para los campos de entrada de fecha
    document.getElementById('horaEntrada').addEventListener('change', calcularTotalHoras);
    document.getElementById('horaSalida').addEventListener('change', calcularTotalHoras);


   // Calculo de kilometraje
  // Evento de cambio en el select de ruta
document.getElementById('ruta').addEventListener('change', function () {
    // Llamar a contarViajes antes de mostrar los kilómetros

    

   // let totalViajes=contarViajes();
   console.log( contarViajes());
    contarViajes().then(function (result) {
        alert(result);
        // Llamar a mostrarKM con el valor actualizado de totalViajes
        mostrarKM(result);
    });
});




// Calculo de kilometraje
function mostrarKM(totalViajes2) {
  
    // Obtener la ruta seleccionada
    var rutaSeleccionada = document.getElementById("ruta").value;
    var totalViajes2 = document.getElementById("cantidad_viajes").value;


    console.log(totalViajes2);
    console.log(rutaSeleccionada);

    if (totalViajes2>0 && (rutaSeleccionada!=null || rutaSeleccionada!=undefined) ){

        
        
            // Realizar una petición AJAX para obtener los kilómetros recorridos
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                    console.log(response);
                        // Determinar si mostrar kmV1 o kmV2 según el valor de totalViajes
                        var kmRequerido = (totalViajes2 == 1) ? response.kmV1 : response.kmV2;
        
                        // Mostrar el valor correspondiente en el campo "kmV1"
                        document.getElementById("kmV1").value = kmRequerido;
                    } else {
                        console.error("Error en la solicitud AJAX");
                    }
                }
            };
        
            xhr.open("GET", "obtener_km_recorridos.php?ruta=" + rutaSeleccionada + "&cantidad_viajes=" + totalViajes2, true);
            xhr.send();




    }

}
  
    
    
    
    
    
 
  