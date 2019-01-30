$(document).ready(function () {
    // Inicializamos los tooltips y popovers de Bootstrap
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    // Cerrar Popovers al hacer click fuera
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });

    //Inicializamos DataTable de Saldos
    $('#tablaSaldos').DataTable({
        'language': {
            'url': '/vendor/datatables/lang/Spanish.json',
        }
    });

    //Inicializamos DataTable de Clientes
    $('#tablaClientes').DataTable({
        'language': {
            'url': '/vendor/datatables/lang/Spanish.json',
        }
    });

    //Inicializamos DataTable de Productos
    $('#tablaProductos').DataTable({
        'language': {
            'url': '/vendor/datatables/lang/Spanish.json',
        }
    });
});