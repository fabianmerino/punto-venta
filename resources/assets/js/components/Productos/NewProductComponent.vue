<template>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white bg-primary ">
                <h4 class="mb-0">NUEVO PRODUCTO</h4>
            </div>
            <form @submit="saveProduct" role="form" novalidate method="post">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item">
                            <a href="#nuevo" class="nav-link active" id="nuevo-tab" data-toggle="tab" role="tab" aria-controls="nuevo" aria-selected="true">Nuevo</a>
                        </li>
                        <li class="nav-item" v-if="seen === 'En Kit'">
                            <a href="#componentes" class="nav-link" id="componentes-tab" data-toggle="tab" role="tab" aria-controls="componentes" aria-selected="false">Contenido del KIT</a>
                        </li>
                        <li class="nav-item">
                            <a href="#impuestos" class="nav-link" id="impuestos-tab" data-toggle="tab" role="tab" aria-controls="impuestos" aria-selected="false">Impuestos</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="nav-tabContent">

                        <!--Pestaña nuevo-->
                        <div id="nuevo" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nuevo-tab">
                            <h5 class="font-weight-bold">Llene los siguientes datos acerca del Nuevo Producto:</h5>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="codigo">Código</label>
                                    <input type="text" name="codigo" id="codigo"
                                           placeholder="Ingresa un código de Barras"
                                           class="form-control text-monospace font-weight-bold text-uppercase">
                                    <span v-if="errors.includes('codigo')" class="invalid-feedback" role="alert">
                                        <strong>{{ errors[errors.indexOf('codigo')].name }}</strong>
                                    </span>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="col-form-label col-sm-4 pt-0">Se vende:</label>
                                    <div class="form-control form-control-plaintext">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Por Unidad/Pza" checked v-model="seen">
                                            <label class="form-check-label" for="inlineRadio1">Por Unidad/Pza</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="A Granel/Kg" v-model="seen">
                                            <label class="form-check-label" for="inlineRadio2">A granel/Kg</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="En Kit" v-model="seen">
                                            <label class="form-check-label" for="inlineRadio3">En Kit</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion"  class="form-control form-control-sm" aria-describedby="descHelp">
                                <small id="descHelp" class="form-text text-muted">Máximo 255 Caracteres</small>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-3">
                                    <label for="pcosto">Precio de Costo</label>
                                    <input type="number" name="pcosto" id="pcosto"  class="form-control form-control-sm" v-model="pcosto">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="porcentaje_ganancia">Ganancia</label>
                                    <div class="input-group  input-group-sm">
                                        <input type="number" name="porcentaje_ganancia" id="porcentaje_ganancia" class="form-control form-control-sm text-right" v-model="porcentaje_ganancia" step="any" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">%</div>
                                        </div>
                                        <span v-if="errors.includes('porcentaje_ganancia')" class="invalid-feedback" role="alert">
                                            <strong >{{ errors[errors.indexOf('porcentaje_ganancia')].name }}</strong>
                                        </span>
                                    </div>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="pventa">Precio de Venta</label>
                                    <input type="number" name="pventa" id="pventa" class="form-control form-control-sm" v-model="pventa">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="pmayoreo">Precio de Mayoreo</label>
                                    <input type="number" name="pmayoreo" id="pmayoreo" class="form-control form-control-sm"  v-model="pmayoreo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-4">
                                    <label for="departamento">Departamento</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-sm btn-outline-primary"  @click.prevent="loadModal()">
                                                <i class="fa fa-plus fa-circle-notch"></i>
                                            </button>
                                        </div>
                                        <select name="departamento" id="departamento" class="form-control form-control-sm">
                                            <!--@if(isset($producto->departamento->id))-->
                                            <!--@foreach($departamentos as $departamento)-->
                                            <!--<option value="{{ $embalaje->id }}" {{ $producto->medida->id == $medida->id ? 'selected' : ''}}>{{ $embalaje->nombre }}</option>-->
                                            <!--@endforeach-->
                                            <!--@else-->
                                            <!--@foreach($departamentos as $departamento)-->
                                            <!--<option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>-->
                                            <!--@endforeach-->
                                            <!--@endif-->
                                            <option :value="departamento.id" v-for="departamento in departments">
                                                {{ departamento.nombre }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="medida">Unidad de Medida</label>
                                    <select name="medida" id="medida" class="form-control form-control-sm">
                                        <option :value="medida.id " v-for="medida in medidas">
                                            {{ medida.unid_enteros }}{{ medida.unid_fracciones == "" ? "" : (" / " + medida.unid_fracciones) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="custom-control custom-checkbox form-group">
                                <input type="checkbox" class="custom-control-input" id="chkInventario" v-model="chkInv">
                                <label class="custom-control-label" for="chkInventario">Este producto usa Inventario</label>
                            </div>
                            <fieldset id="fieldInventario" :disabled="!chkInv">
                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="dinventario">Hay en inventario</label>
                                        <input type="number" name="dinventario" id="dinventario"  class="form-control form-control-sm" value="0.00">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="dinvminimo">Stock Mínimo</label>
                                        <input type="number" name="dinvminimo" id="dinvminimo"  class="form-control form-control-sm" value="0.00">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="dinvmaximo">Stock Máximo</label>
                                        <input type="number" name="dinvmaximo" id="dinvmaximo"  class="form-control form-control-sm" value="0.00">
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!--Pestaña componentes-->
                        <div id="componentes" class="tab-pane fade" role="tabpanel" aria-labelledby="componentes-tab">
                            <detallekit-component :productos="productos"></detallekit-component>
                        </div>

                        <!--Pestaña Impuestos-->
                        <div id="impuestos" class="tab-pane fade" role="tabpanel" aria-labelledby="impuestos-tab">
                            <div class="card col-6">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-sm-4">
                                            <div v-for="impuesto in impuestos" class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" :checked="impuesto.activo === 'T'">
                                                <label class="custom-control-label font-weight-bold" for="customCheck1">{{ impuesto.nombre }} - {{ impuesto.porcentaje }}%</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary ml-2" @click.prevent="saveProduct()"><i class="fa fa-save"></i> Guardar Producto</button>
                        <button type="reset" class="btn btn-outline-warning"><i class="fa fa-broom"></i> Limpiar</button>
                    </div>
                </div>
            </form>
            <!-- Modal Departamento-->
            <div class="modal fade" id="departamentoModal" tabindex="-1" role="dialog" aria-labelledby="departamentoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="departamentoModalLabel">Crear Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="unloadModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <departamento-component></departamento-component>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click.prevent="unloadModal()">
                                <i class="fa fa-check"></i> Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Fin Modal Departamento-->
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ["productos", "departamentos", "medidas", "impuestos"],
        data() {
            return {
                errors: [],
                departments: this.departamentos,
                chkInv: false,
                seen: "",
                pcosto: (0).toFixed(2),
                porcentaje_ganancia: (20).toFixed(2),
            }
        },
        methods: {
            loadModal() {
                $("#departamentoModal").modal({
                    backdrop: false,
                    keyboard: false
                });
            },
            unloadModal() {
                let url = "departamentos";
                axios.get(url).then(response => {
                    this.departments = response.data;
                });
                $("#departamentoModal").modal("hide");
            },
            saveProduct() {
                let url = "productos";
            },
        },
        computed: {
            pventa() {
                return (parseFloat(this.pcosto) + (this.pcosto * (this.porcentaje_ganancia / 100))).toFixed(2);
            },
            pmayoreo() {
                return (parseFloat(this.pcosto) + (this.pcosto * (15 / 100))).toFixed(2)
            }
        }
    }
</script>

<style lang="scss" scoped>
    .form-control .form-check {
        input, label{
            cursor: pointer;
        }
    }
</style>