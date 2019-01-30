<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-1">PRODUCTOS BAJOS EN INVENTARIO</h4>
                <div class="card-tools">
                    <button class="btn btn-success">
                        <i class="fa fa-file-excel"></i> Exportar a Excel
                    </button>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-2">A continuación se muestra un listado de los productos con inventario debajo de su mínimo:</p>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Código</th>
                                <th scope="col">Descripción del Producto</th>
                                <th scope="col">Precio de venta</th>
                                <th scope="col">Departamento</th>
                                <th scope="col">Existencia</th>
                                <th scope="col">Inv. Mínimo</th>
                                <th scope="col">Inv. Máximo</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LowInventoryProductsComponent"
    }
</script>

<style scoped>

</style>