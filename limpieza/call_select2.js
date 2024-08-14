$(document).ready(function() {
    $('.mi-select-nomina').select2({
        ajax: {
            url: 'llamados2.php?query=nomina',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona una opción',
        allowClear: true
    });

    $('.mi-select-nomina').on('select2:select', function (e) {
        var data = e.params.data;
        $('#nombre').val(data.nombre_apellido); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-nomina').on('select2:clear', function () {
        $('#nombre').val(''); // Limpia el campo si se limpia la selección
    });

    $('.mi-select-operario1').select2({
        ajax: {
            url: 'llamados2.php?query=nomina',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona una opción',
        allowClear: true
    });

    $('.mi-select-operario1').on('select2:select', function (e) {
        var data = e.params.data;
        $('#nombre2').val(data.nombre_apellido); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-operario1').on('select2:clear', function () {
        $('#nombre2').val(''); // Limpia el campo si se limpia la selección
    });

    $('.mi-select-operario2').select2({
        ajax: {
            url: 'llamados2.php?query=nomina',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona una opción',
        allowClear: true
    });

    $('.mi-select-operario2').on('select2:select', function (e) {
        var data = e.params.data;
        $('#nombre3').val(data.nombre_apellido); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-operario2').on('select2:clear', function () {
        $('#nombre3').val(''); // Limpia el campo si se limpia la selección
    });

    $('.mi-select-operario3').select2({
        ajax: {
            url: 'llamados2.php?query=nomina',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona una opción',
        allowClear: true
    });

    $('.mi-select-operario3').on('select2:select', function (e) {
        var data = e.params.data;
        $('#nombre4').val(data.nombre_apellido); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-operario3').on('select2:clear', function () {
        $('#nombre4').val(''); // Limpia el campo si se limpia la selección
    });

    $('.mi-select-fiscal').select2({
        ajax: {
            url: 'llamados2.php?query=fiscal',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona una opción',
        allowClear: true
    });

    $('.mi-select-fiscal').on('select2:select', function (e) {
        var data = e.params.data;
        $('#nombre5').val(data.nombre_apellido); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-fiscal').on('select2:clear', function () {
        $('#nombre5').val(''); // Limpia el campo si se limpia la selección
    });

    $('.mi-select-jefe').select2({
        ajax: {
            url: 'llamados2.php?query=jefe',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona una opción',
        allowClear: true
    });

    $('.mi-select-jefe').on('select2:select', function (e) {
        var data = e.params.data;
        $('#nombre6').val(data.nombre_apellido); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-jefe').on('select2:clear', function () {
        $('#nombre6').val(''); // Limpia el campo si se limpia la selección
    });
    
    $('.mi-select-turnos').select2({
        ajax: {
            url: 'llamados2.php?query=turnos',
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    search: params.term  // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
       
        placeholder: 'Selecciona una opción',
        allowClear: true
    });


        $('.mi-select-distritos').select2({
            ajax: {
                url: 'llamados2.php?query=distritos',
                dataType: 'json',
                delay: 0,
               data: function (params) {
               return {
                 search: params.term
               };
               },
               processResults: function(data) {
                return {
                    results: data
                };
            },
                cache: true
            },
         
            placeholder: 'Selecciona un distrito',
            allowClear: true
        });

        $('.mi-select-zona').select2({
            ajax: {
                url: 'llamados2.php?query=zonas',
                dataType: 'json',
                delay: 0,
               data: function (params) {
               return {
                 search: params.term
               };
               },
               processResults: function(data) {
                return {
                    results: data
                };
            },
                cache: true
            },
         
            placeholder: 'Selecciona una zona',
            allowClear: true
        });

        $('.mi-select-ruta').select2({
            ajax: {
                url: 'llamados2.php?query=rutas',
                dataType: 'json',
                delay: 0,
                data: function (params) {
               return {
                 search: params.term
               };
               },
               processResults: function(data) {
                return {
                    results: data
                };
            },
                cache: true
            },
          
            placeholder: 'Selecciona una ruta',
            allowClear: true
        });
    

        
        $('.mi-select-equipos').select2({
        ajax: {
            url: 'llamados2.php?query=equipos',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    search: params.term  // Enviar el término de búsqueda
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder: 'Selecciona un equipo',
        allowClear: true
    });

    // Evento para mostrar la descripción del equipo seleccionado
    $('.mi-select-equipos').on('select2:select', function (e) {
        var data = e.params.data;
        $('#descripcion').val(data.descripcion); // Llena el campo con la descripción
    });

    $('.mi-select-equipos').on('select2:clear', function () {
        $('#descripcion').val(''); // Limpia el campo si se limpia la selección
    });

        // Añade más inicializaciones de Select2 aquí según sea necesario
    });