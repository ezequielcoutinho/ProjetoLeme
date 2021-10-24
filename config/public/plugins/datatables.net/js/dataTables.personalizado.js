
$(document).ready(function() {

    var table = $('.data-table').DataTable({
        "order": [[0, "desc"]],
        responsive: true,
        select: true,

        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Pesquisar:",
            "sUrl": "",
            "oPaginate": {
              "sFirst": "Primeiro",
              "sPrevious": "Anterior",
              "sNext": "Seguinte",
              "sLast": "Último"
            },
            "buttons": {
              'copy': 'Copiar',
              'print': 'Imprimir',
            },
          },
        
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': ['nosort']
        }]
    });  

});

