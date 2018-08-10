$(document).ready(function () {
    // Incializamos los tooltips y popovers de Bootstrap
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    // Cerrar Popovers al hacer click fuera
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });

    //Inciializamos Datatable de Saldos
    $('#tablaSaldos').DataTable({
        'language': {
            'url': '/vendor/datatables/lang/Spanish.json',
        }
    });

    //Inciializamos Datatable de Clientes
    $('#tablaClientes').DataTable({
        'language': {
            'url': '/vendor/datatables/lang/Spanish.json',
        }
    });

    //Inciializamos Datatable de Productos
    $('#tablaProductos').DataTable({
        'language': {
            'url': '/vendor/datatables/lang/Spanish.json',
        }
    });
});