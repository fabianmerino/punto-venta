<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.iconify.design/1/1.0.0-rc6/iconify.min.js"></script>

@include('vendor.sweetalert.cdn')
@include('vendor.sweetalert.view')

<script type="text/javascript">
    function confDelete(btn) {
        swal({
            title: '¿Esta seguro?',
            text: 'Esta accion no puede revertirse!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then(function(result) {
            if (result.value) {
                $(btn).prev().submit();
            }
        });
    }

    // $("#chkInventario").on( 'change', function() {
    //     if( $(this).is(':checked') ) {
    //         $("#fieldInventario").prop('disabled', false);
    //     } else {
    //         $("#fieldInventario").prop('disabled', true);
    //     }
    // });
</script>