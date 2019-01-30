/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./custom');


window.Vue = require('vue');
window.toastr = require('toastr');
window.moment = require('moment');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('departamento-component', require('./components/Productos/DepartamentoComponent'));
Vue.component('detallekit-component', require('./components/Productos/DetalleKitComponent'));
Vue.component('nuevo-producto-component', require('./components/Productos/NewProductComponent'));
Vue.component('ventas-por-periodo-component', require('./components/Productos/VentasPorPeriodoComponent'));
Vue.component('promocion-component', require('./components/Productos/PromocionComponent'));
Vue.component('add-inventory-component', require('./components/Inventario/AddInventoryComponent'));
Vue.component('adjustment-inventory-component', require('./components/Inventario/AdjustmentInventoryComponent'));
Vue.component('low-inventory-products-component', require('./components/Inventario/LowInventoryProductsComponent'));
Vue.component('inventory-report-component', require('./components/Inventario/InventoryReportComponent'));
Vue.component('movement-report-component', require('./components/Inventario/MovementReportComponent'));

const app = new Vue({
    el: '#app',
});