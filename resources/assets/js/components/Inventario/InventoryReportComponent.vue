<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="header-title mb-1">REPORTE DE INVENTARIO</h4>
                <div class="card-tools">
                    <button class="btn btn-outline-light">
                        <i class="far fa-edit text-warning"></i> Modificar Producto
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="far fa-file-excel text-success"></i> Exportar...
                    </button>
                    <button class="btn btn-outline-light">
                        <i class="fas fa-print text-info"></i> Imprimir
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-sm-3 text-center">
                        <label for="cost" class="font-weight-bold">Costo del Inventario</label>
                        <h3 class="text-muted text-uppercase" id="cost">S/ {{cost}}</h3>
                    </div>
                    <div class="form-group col-sm-3 text-center">
                        <label for="qty" class="font-weight-bold">Cantidad de Productos en Inventario</label>
                        <h3 class="text-muted text-uppercase" id="qty">{{qty}}</h3>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group row col-sm-4">
                        <label for="departments"class="col-md-3 col-form-label">Departamento</label>
                        <div class="col-md-9">
                            <select name="departments" id="departments" class="custom-select">
                                <option value="-1" selected>Todos</option>
                                <option v-for="departamento in departamentos" :value="departamento.id">{{departamento.nombre}}</option>
                            </select>
                        </div>
                    </div>
                </div>
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
        name: "InventoryReportComponent",
        props: ["departamentos"],
        data(){
            return {
                cost: 0,
                qty: 0
            }
        }
    }
</script>

<style scoped>

</style>