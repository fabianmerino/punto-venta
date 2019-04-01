<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title mb-0">KARDEX INVENTARIO</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-lg">
                        <div class="form-group col-lg col-xl-8">
                            <label for="codigo">
                                Por favor ingresa el código del producto que deseas ver su kardex de inventario:
                            </label>
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
                    </div>
                    <div class="col-lg">
                        <div class="row justify-content-lg-end">
                            <div class="col-lg-6 col-xl-4">
                                <div class="form-group mb-md-0">
                                    <label for="period">Período</label>
                                    <select name="periodo" id="period" class="custom-select">
                                        <option v-for="(value, key) in periods"
                                                :value="key"
                                        >
                                            {{value}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 align-self-end">
                                <button class="btn btn-success btn-block" type="button">
                                    <span class="iconify" data-icon="simple-icons:microsoftexcel" data-inline="false"></span>
                                    <span class="d-lg-none d-xl-inline">Exportar</span>
                                </button>
                            </div>
                            <div class="col-lg-3 align-self-end">
                                <button class="btn btn-info btn-block" type="button">
                                    <span class="iconify" data-icon="simple-line-icons:printer" data-inline="false"></span>
                                    <span class="d-lg-none d-xl-inline">Imprimir</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--TODO: Generar vista Reporte Kardex-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "KardexComponent",
        data() {
            return {
                periods: {
                    all: 'Desde el comienzo',
                    lastYear: 'Del último año',
                    last30: 'De los últimos 30 días',
                    last7: 'De los últimos 7 días'
                }
            }
        }
    }
</script>

<style scoped>

</style>