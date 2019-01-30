<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <h4 class="card-header bg-primary text-white">NUEVA PROMOCION</h4>
            <div class="row">
                <div class="card-body">
                    <form class="form form-horizontal col-xl-6">
                        <div class="form-group row">
                            <label for="promoName" class="col-sm-4 col-form-label text-sm-right">
                                Nombre de la Promoción
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="promoName" v-model="promoName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="productCode" class="col-sm-4 col-form-label text-sm-right">
                                Código del Producto
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productCode" v-model="productCode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="minQty" class="col-sm-4 col-form-label text-sm-right">
                                Cuando la cantidad vaya desde:
                            </label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="minQty" v-model="minQty">
                            </div>
                            <label for="maxQty" class="col-sm-2 col-form-label text-sm-right">hasta:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="maxQty" v-model="maxQty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unitPrice" class="col-sm-4 col-form-label text-sm-right">
                                Usar precio unitario
                            </label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control font-weight-bold" id="unitPrice" v-model="unitPrice">
                            </div>
                            <div class="col-sm-5">
                                <p class="card-text mt-0">
                                    <small class="text-muted">Precio Normal: </small>
                                    <br>
                                    <small class="text-muted">Precio Costo: </small>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fa fa-check-circle"></i> Guardar Nueva Promoción
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-1">PROMOCIONES VIGENTES</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-light">
                                <i class="fa fa-minus-circle"></i> Eliminar
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre de la Promoción</th>
                                    <th scope="col">Código del Producto</th>
                                    <th scope="col">Desde</th>
                                    <th scope="col">Hasta</th>
                                    <th scope="col">Precio Promoción</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PromocionComponent",
        data() {
            return {
                promoName: "",
                productCode: "",
                minQty: 0,
                maxQty: 0,
                unitPrice: 0,
            }
        }
    }
</script>

<style scoped>

</style>