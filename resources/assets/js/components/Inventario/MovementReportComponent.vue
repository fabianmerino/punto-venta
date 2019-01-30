<template>
    <div class="container-fluid mt-5">
        <div class="card">
            <h4 class="card-header bg-secondary text-white">HISTORIAL DE MOVIMIENTOS DE INVENTARIO</h4>
            <div class="card-body">
                <datepicker :lang="es" :>

                </datepicker>
            </div>
        </div>
    </div>
</template>

<script>
    import DatePicker from 'vuejs-datepicker'
    import {en, es} from 'vuejs-datepicker/dist/locale'
    export default {
        name: "MovementReportComponent",
        components: { DatePicker },
        data() {
            return {
                en: en,
                es: es,
            }
        }
    }
</script>

<style scoped>

</style>