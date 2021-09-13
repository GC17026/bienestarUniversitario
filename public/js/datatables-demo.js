// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable( {
        language: {
            search: "Buscar:",
            paginate: {
                first:      "Primero",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Último"
            },
            info: "Mostrando _START_ a _END_ de _TOTAL_ ",
            lengthMenu: "Mostrar _MENU_ registros",
        },
    } );
    $('#dataTable').DataTable();
});
