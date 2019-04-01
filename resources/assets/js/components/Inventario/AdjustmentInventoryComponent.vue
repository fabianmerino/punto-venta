<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0">AJUSTAR INVENTARIO</h4>
            </div>
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
                <form @submit.prevent="AdjustmentInventory()" class="form">
                    <fieldset v-if="productLoaded" class="col-md-8">
                        <div class="form-group row">
                            <label for="description" class="col-form-label col-sm-4 text-sm-right">Descripción</label>
                            <div class="col-sm-8">
                                <label id="description" class="form-control-plaintext font-weight-bold text-info h5">{{desc}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stock" class="col-form-label col-sm-4 text-sm-right">Cantidad Actual</label>
                            <div class="col-sm-8">
                                <label class="form-control-plaintext font-weight-bold text-info h5" id="stock" >{{stock}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjustmentQty" class="col-form-label col-sm-4 text-sm-right">Ajuste (+/-):</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="adjustmentQty"
                                       v-model.number.lazy="adjustmentQty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newQty" class="col-form-label col-sm-4 text-sm-right">Nueva cantidad:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="newQty" v-model.number.lazy="newQty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="salePrice" class="col-form-label col-sm-4 text-sm-right">Precio Costo:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="salePrice" v-model.number="salePrice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="purchasePrice" class="col-form-label col-sm-4 text-sm-right">Precio Venta:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="purchasePrice" v-model.number="purchasePrice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="wholesalePrice" class="col-form-label col-sm-4 text-sm-right">Precio Mayoreo:</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="wholesalePrice" v-model.number="wholesalePrice">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reason" class="col-form-label col-sm-4 text-sm-right">Motivo del ajuste:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="reason" v-model="reason">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4">
                                <button class="btn btn-info" type="submit">
                                    <i class="fa fa-edit"></i> Realizar ajuste de Inventario
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="alert alert-warning" role="alert">
                                <i class="fa fa-info-circle alert-heading"></i>
                                <p>Se realizará una {{ adjustmentQty < 0 ? 'salida' : 'entrada'}} de {{ adjustmentQty }}
                                    para que el inventario se quede en {{ newQty }}, con un nuevo costo
                                    de S/ {{ purchasePrice }}</p>
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
        name: "AdjustmentInventoryComponent",
        data() {
            return {
                productLoaded: true,
                desc: 'Texto de prueba',
                stock: 120,
                newQty: 0,
                adjustmentQty: 0,
                salePrice: 0,
                purchasePrice: 0,
                wholesalePrice: 0,
                reason: ''
            }
        },
        methods: {
            AdjustmentInventory() {
                console.log('Ajuste de producto ...');
            },
        },
        // watch: {
        //     newQty() {
        //         this.newQty = (this.stock - this.adjustmentQty);
        //     },
        //     adjustmentQty() {
        //         this.adjustmentQty = (this.newQty - this.stock);
        //     }
        //
        // }
    }
</script>

<style scoped>

</style>