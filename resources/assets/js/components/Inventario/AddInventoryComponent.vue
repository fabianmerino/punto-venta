<template>
    <div class="container mt-5">
        <div class="card">
            <h4 class="card-header bg-primary text-white mb-0">AGREGAR INVENTARIO</h4>
            <div class="card-body">
                <div class="form-group col-sm-6">
                    <label for="codigo">Código</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button" id="btnSearchProduct">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <input type="text" name="codigo" id="codigo"
                               class="form-control text-monospace font-weight-bold text-uppercase"
                               placeholder="Busca o Ingresa un código de Barras"
                               aria-describedby="btnSearchProduct">
                    </div>
                </div>
                <hr>
                <form @submit.prevent="AddInventory()" class="form">
                    <fieldset v-if="productLoaded" class="col-md-8">
                        <div class="form-group row">
                            <label for="description" class="col-form-label col-sm-4 text-sm-right">Descripción</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control-plaintext font-weight-bold text-info h5" id="description" :value="desc" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exists" class="col-form-label col-sm-4 text-sm-right">Hay</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control-plaintext font-weight-bold text-info h5" id="exists" :value="exist" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-form-label col-sm-4 text-sm-right">Cantidad:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="qty" v-model="qty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salePrice" class="col-form-label col-sm-4 text-sm-right">Precio Costo:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="salePrice" v-model="salePrice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="purchasePrice" class="col-form-label col-sm-4 text-sm-right">Precio Venta:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="purchasePrice" v-model="purchasePrice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wholesalePrice" class="col-form-label col-sm-4 text-sm-right">Precio Mayoreo:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="wholesalePrice" v-model="wholesalePrice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <button class="btn btn-outline-info" type="submit">
                                    <i class="fa fa-plus-square"></i> Agregar a Inventario
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="alert alert-warning" role="alert">
                                <i class="fa fa-info-circle alert-heading"></i>
                                <p>Se recibirán {{ newQty }} de inventario para el producto, el costo será de
                                    S/ {{ purchasePrice }}, el precio de venta será de S/ {{ salePrice }} y
                                    el precio de mayoreo será de S/ {{ wholesalePrice }}</p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddInventoryComponent",
        data() {
            return {
                productLoaded: true,
                desc: 'Texto de prueba',
                stock: 0,
                newQty: 0,
                salePrice: 0,
                purchasePrice: 0,
                wholesalePrice: 0
            }
        },
        methods: {
            AddInventory() {
                console.log('Guardando producto...');
            }
        }
    }
</script>

<style scoped>

</style>