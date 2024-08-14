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
        $('#inss').val(data.inss); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-nomina').on('select2:clear', function () {
        $('#inss').val(''); // Limpia el campo si se limpia la selección
    });

    $('.mi-select-nomina').on('select2:select', function (e) {
        var data = e.params.data;
        $('#cargo').val(data.cargo); // Llena el campo con el nombre completo
    });

    // Limpia el campo cuando se deselecciona la opción
    $('.mi-select-nomina').on('select2:clear', function () {
        $('#cargo').val(''); // Limpia el campo si se limpia la selección
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

    $('.mi-select-equipos').select2({
        ajax: {
            url: 'llamados2.php?query=equipos',
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

    $('.mi-select-centro').select2({
        ajax: {
            url: 'llamados2.php?query=centro_atencion',
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


});