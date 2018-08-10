<!--suppress ALL -->
<template>
    <div class="container-fluid mt-5">
        <h4 class="text-capitalize">Departamentos</h4>
        <hr>
        <div class="card-group">
            <div class="card col-4">
                <div class="card-header">
                    <input type="text" name="buscar" id="buscar" v-model="buscar" class="form-control" placeholder="Buscar" autocomplete="off">
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li :class="['list-group-item', 'list-group-item-action', {'active' : dep.nombre === departamento.nombre}]" :key="departamento.id" v-for="departamento in buscarDepartamento" @click="cargarDepartamento(departamento)">
                            {{ departamento.nombre }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card col-8">
                <div class="card-header">
                    <button class="btn btn-info" @click="nuevoDepartamento">
                        <i class="far fa-file"></i> Nuevo departamento
                    </button>
                    <button class="btn btn-danger" :disabled="!modoEditar || dep.nombre === 'Sin Departamento'" @click="eliminarDepartamento">
                        <i class="far fa-trash-alt"></i> Eliminar
                    </button>
                </div>

                <div class="card-body">
                    <form v-on:submit.prevent="guardarDepartamento" method="post">
                        <h4 v-if="!modoEditar" class="text-warning">NUEVO DEPARTAMENTO</h4>
                        <h4 v-else class="text-warning">EDITAR DEPARTAMENTO</h4>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" :class="[{'is-invalid' : invalid}, 'form-control']" autocomplete="off" v-model="dep.nombre" >
                            <span v-for="error in errors" class="invalid-feedback">
                                {{ error.nombre }}
                            </span>
                        </div>
                        <button class="btn btn-primary" type="submit" :disabled="dep.nombre === 'Sin Departamento'">
                            <i class="far fa-save"></i> {{ modoEditar ? 'Actualizar' : 'Guardar'}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!--<code><pre>{{ $data }}</pre></code>-->
    </div>
</template>

<script>
import axios from "axios";

export default {
    mounted() {
        this.getDepartamentos();
    },
    data() {
        return {
            departamentos: [],
            dep: {'id': '', 'nombre': ''},
            buscar: "",
            modoEditar: false,
            errors: [],
            invalid: false,
        };
    },
    methods: {
        getDepartamentos: function() {
            let url = "departamentos";
            axios.get(url).then(response => {
                this.departamentos = response.data;
            });
        },
        nuevoDepartamento: function() {
            this.modoEditar = false;
            this.dep = {'id': '', 'nombre': ''};
            this.errors = [];
            this.invalid = false;
        },
        cargarDepartamento: function(dep) {
            this.modoEditar = true;
            this.dep.id = dep.id;
            this.dep.nombre = dep.nombre;
            this.errors = [];
            this.invalid = false;
        },
        guardarDepartamento: function() {
            let url = "departamentos";
            if (this.modoEditar) {
                url = "departamentos/" + this.dep.id
                axios.put(url, this.dep).then(() => {
                    this.getDepartamentos();
                    this.dep = {'id': '', 'nombre': ''};
                    this.errors = [];
                    this.invalid = false;
                }).catch(error => {
                    this.errors = error.response.data;
                    this.invalid = true;
                });
            } else {
                axios.post(url, {
                    nombre: this.dep.nombre
                }).then(() => {
                    this.getDepartamentos();
                    this.dep = {'id': '', 'nombre': ''};
                    this.errors = [];
                    this.invalid = false;
                }).catch(error => {
                    this.errors = error.response.data;
                    this.invalid = true;
                });
            }
        },
        eliminarDepartamento: function() {
            let url = "departamentos/" + this.dep.id;
            axios.delete(url).then(response => {
                this.getDepartamentos();
                this.nuevoDepartamento();
            });
        }
    },
    computed: {
        buscarDepartamento: function() {
            return this.departamentos.filter(departamento =>
                departamento.nombre.includes(this.buscar)
            );
        }
    }
};
</script>
