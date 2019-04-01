<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-1">HISTORIAL DE MOVIMIENTOS DE INVENTARIO</h4>
                <div class="card-tools">
                    <button class="btn btn-light" type="button">
                        <span class="iconify text-success" data-icon="simple-icons:microsoftexcel" data-inline="false"></span> Exportar movimientos
                    </button>
                    <button class="btn btn-light ml-2" type="button">
                        <span class="iconify text-info" data-icon="simple-line-icons:printer" data-inline="false"></span> Imprimir
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-md-7">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="datepicker">Del día:</label>
                                <datepicker
                                        :language="es"
                                        :bootstrap-styling="true"
                                        :format="format"
                                        :calendar-button="true"
                                        calendar-button-icon="iconify icon:ion:md-calendar icon-inline:false"
                                        id="datepicker"
                                        v-model="date">
                                </datepicker>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="searchText">Buscar por:</label>
                                <input type="search" v-model="searchText" id="searchText" class="form-control" placeholder="Cajero, Producto o Departamento">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="movementType">Movimientos:</label>
                                <select name="movementType" id="movementType" class="custom-select">
                                    <option value="-1">- Todos -</option>
                                    <option v-for="(value, key) in  movementTypes" :value="key" :class="'text-' + value.color">{{ value.name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cashRegister">Caja:</label>
                            <select name="cashRegister" id="cashRegister" class="custom-select">
                                <option v-for="caja in  cajas" :value="caja.id">{{ caja.nombre }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <caption><span class="badge badge-secondary">KIT</span> El producto fue vendido dentro de un kit</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Descripción del producto</th>
                                <th scope="col">Movimiento</th>
                                <th scope="col">Había</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Hay</th>
                                <th scope="col">Cajero</th>
                                <th scope="col">Departamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="emptyTable">
                                <th colspan="11" scope="colgroup">No hay registro de movimientos de inventario para el periodo seleccionado.</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker'
    import {en, es} from 'vuejs-datepicker/dist/locale'
    export default {
        name: "MovementReportComponent",
        components: { Datepicker },
        props: ["cajas"],
        data() {
            return {
                format: 'D d de MMMM de yyyy',
                en: en,
                es: es,
                date: moment().format(),
                searchText: '',
                movementTypes: {
                    1: {name: 'Entradas', color: 'success'},
                    2: {name: 'Salidas', color: 'info'},
                    3: {name: 'Ajustes', color: 'warning'},
                    4: {name: 'Devoluciones', color: 'secondary'},
                },
                emptyTable: true,
            }
        }
    }
</script>

<style scoped>

</style>