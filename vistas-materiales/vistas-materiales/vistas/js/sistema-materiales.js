$(document).ready(function(){

// $("#mySelect").select2({});

$("#buscadorProyecto").select2({
               
         ajax: {
                    url: "modelos/proyectos-select.modelo.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            palabraClave: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
                
        });
});
