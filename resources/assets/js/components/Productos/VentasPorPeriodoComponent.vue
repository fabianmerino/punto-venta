<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <h4 class="card-header text-white bg-primary">
                REPORTE DE PRODUCTOS VENDIDOS
            </h4>
            <div class="card-body">
                <!--Barra de herramientas-->
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <label for="elegirPeriodo">Mostrar ventas de:</label>
                        <div class="w-100"></div>
                        <date-range-picker
                                :ranges="ranges"
                                :opens="opens"
                                :startDate="startDate"
                                :endDate="endDate"
                                :locale-data="locale"
                                id="elegirPeriodo">
                            <!--Optional scope for the input displaying the dates -->
                            <!--<div slot="input" slot-scope="picker">...</div>-->
                        </date-range-picker>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end no-gutters">
                            <div class="col-md-3">
                                <label for="selectCajas">De la caja</label>
                                <select name="cajas" id="selectCajas" class="custom-select">
                                    <option v-for="caja in cajas" :value="caja.id">{{ caja.nombre }}</option>
                                </select>
                            </div>
                            <div class="col-md-2 align-self-end ml-md-2">
                                <button type="button" class="btn btn-outline-secondary btn-block">
                                    <i class="fa fa-file-excel text-success"></i> Exportar
                                </button>
                            </div>
                            <div class="col-md-2 align-self-end ml-md-2">
                                <button type="button" class="btn btn-outline-primary btn-block">
                                    <i class="fa fa-print text-info"></i> Imprimir
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="tablaVentasPeriodo">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción del producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio de venta</th>
                            <th scope="col">Deparatamento</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DateRangePicker from 'vue2-daterange-picker'
    export default {
        props: ["cajas"],
        components: { DateRangePicker },
        data() {
            return {
                ranges: {
                    'Hoy': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Esta semana': [moment().startOf('week'), moment().endOf('week')],
                    'La semana pasada': [moment().subtract(1, 'week').startOf('week'), moment().subtract(1, 'week').endOf('week')],
                    'Este mes': [moment().startOf('month'), moment().endOf('month')],
                },
                opens: 'right',
                startDate: moment(),
                endDate: moment(),
                locale: {
                    direction: 'ltr', //direction of text
                    format: 'DD-MM-YYYY', //fomart of the dates displayed
                    separator: ' - ', //separator between the two ranges
                    applyLabel: 'Aplicar',
                    cancelLabel: 'Cancelar',
                    weekLabel: 'W',
                    customRangeLabel: 'De un peirodo en particular...',
                    daysOfWeek: moment.weekdaysMin(), //array of days - see moment documenations for details
                    monthNames: moment.monthsShort(), //array of month names - see moment documenations for details
                    firstDay: 0 //ISO first day of week - see moment documenations for details
                }
            }
        }
    }
</script>

<style scoped>

</style>