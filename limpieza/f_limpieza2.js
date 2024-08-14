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


function mostrarKM(totalViajes) {
    var rutaId = $('#ruta').val(); // Obtén el valor seleccionado en el select
    var cantidadViajes = $('#cantidad_viajes').val(); // Obtén el valor del campo cantidad_viajes

    // Verifica que se haya seleccionado una ruta y que cantidad_viajes tenga un valor mayor que 0
    if (!rutaId || !cantidadViajes || cantidadViajes <= 0) {
        $('#kmV1').val(''); // Limpia el campo si no se ha seleccionado una ruta o si cantidad_viajes es 0 o vacío
        return;
    }

    $.ajax({
        url: 'obtener_km_recorridos.php', // Cambia esto por la ruta correcta
        type: 'POST',
        data: { ruta: rutaId },
        dataType: 'json',
        success: function(response) {
            // Suponiendo que response contiene kmV1 y kmV2
            console.log(response);
            var kmV1 = response.kmV1;
            var kmV2 = response.kmV2;

            // Lógica para determinar qué valor mostrar
            var valorMostrar = totalViajes > 1 ? kmV2 : kmV1;

            // Actualiza el valor del input
            $('#kmV1').val(valorMostrar);
        },
        error: function() {
            $('#kmV1').val('Error al obtener datos'); // Mensaje de error en caso de fallo en la solicitud
        }
    });
}

