<template>
    <div class="form-row">
        <div class="col-sm-5">
            <p class="text-black-50">Ingrese el código y la cantidad de cada producto que contiene este kit:</p>
            <div class="form-group">
                <label for="codArticulo">Código de Barras</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-secondary" @click="modalBuscar">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <input type="search" name="codArticulo" id="codArticulo" class="form-control"
                           placeholder="Ingrese o Busque un código (F2)"
                           @keyup.113.stop="modalBuscar"
                           @keyup.prevent="productoxCodigo"
                           v-model="codigoProdBuscar" autocomplete="off">
                </div>
            </div>
            <div class="form-row justify-content-between bg-light mb-3" :id="product.id">
                <div class="col-8">
                    <p class="text-monospace mb-0">{{ product.nombre }}</p>
                </div>
                <div class="col-4">
                    <p class="text-monospace mb-0">{{ product.precio }}</p>
                </div>
            </div>
            <div class="form-group">
                <label for="cant">Cantidad</label>
                <input type="number" name="cantidad" id="cant" class="form-control" v-model="cantidad" step="any"
                       @keydown.enter.prevent="agregarComponente">
            </div>
            <button class="btn btn-outline-info" type="button" @click.prevent="agregarComponente">
                <i class="fa fa-plus-circle"></i> Agregar
            </button>
        </div>
        <div class="col-sm-7">
            <div class="d-flex justify-content-end pb-2">
                <button class="btn btn-secondary" type="button" @click.prevent="eliminarComponente">
                    <i class="fa fa-minus-circle"></i> Quitar seleccionado
                </button>
            </div>
            <table class="table table-bordered table-sm table-hover">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(comp, index) in componentes" :id="comp.id" style="cursor:pointer;" :key="comp.id"
                    @click="seleccionarComponente(comp, index)"
                    :class="{'table-primary': componente && componente.nombre === comp.nombre}">
                    <td>{{ comp.nombre }}</td>
                    <td>{{ comp.cantidad }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- Modal Buscar-->
        <div class="modal fade" id="buscarModal" tabindex="-1" role="dialog" aria-labelledby="buscarModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buscarModalLabel">Buscar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="buscarP">Buscar</label>
                            <input type="search" name="buscar" id="buscarP" class="form-control"
                                   v-model="nombreProdbuscar"
                                   @keyup.prevent=""
                            >
                        </div>
                        <table class="table table-bordered table-sm table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="producto in productosxNombre" @click="seleccionarProducto(producto)"
                                :class="{'table-primary': productoSeleccionado && productoSeleccionado.descripcion === producto.descripcion }"
                                style="cursor: pointer;" :key="producto.id">
                                <td>{{ producto.id }}</td>
                                <td>{{ producto.descripcion }}</td>
                                <td>{{ producto.pventa }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" @click.prevent="unloadProducto">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click.prevent="cargarProducto">Elegir</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Buscar-->
    </div>
</template>

<script>
    import toastr from "toastr";

    export default {
        props: ["productos"],
        data() {
            return {
                codigoProdBuscar: "",
                nombreProdbuscar: "",
                cantidad: 1,
                product: {id: "", nombre: "-", precio: 0.0},
                productoSeleccionado: null,
                componente: {id: "", nombre: "", cantidad: 0.0},
                componenteIndex: null,
                componentes: [],
            };
        },
        methods: {
            modalBuscar() {
                $("#buscarModal").modal("show");
            },
            seleccionarProducto(prod) {
                this.productoSeleccionado = prod;
            },
            cargarProducto() {
                if (!this.productoSeleccionado) {
                    toastr.warning("Seleccione un producto");
                    return;
                }
                this.product = {
                    id: this.productoSeleccionado.id,
                    nombre: this.productoSeleccionado.descripcion,
                    precio: this.productoSeleccionado.pventa
                };
                this.codigoProdBuscar = this.productoSeleccionado.codigo;
                this.nombreProdbuscar = "";
                $("#buscarModal").modal("hide");
            },
            unloadProducto() {
                this.productoSeleccionado = null;
                this.product = {
                    id: "",
                    nombre: "-",
                    precio: 0.0,
                };
                this.codigoProdBuscar = "";
                $("#buscarModal").modal("hide");
            },
            seleccionarComponente(prod, index) {
                this.componente = prod;
                this.componenteIndex = index;
            },
            agregarComponente() {
                if (!this.productoSeleccionado) {
                    toastr.warning("No ha buscado un producto");
                    return;
                }
                if (this.cantidad > this.productoSeleccionado.dinventario) {
                    toastr.error(
                        "La cantidad ingresada supera al stock del producto - " +
                        this.productoSeleccionado.dinventario
                    );
                    this.cantidad = this.productoSeleccionado.dinventario;
                    $("#cant").focus();
                    return;
                }
                for (let componente of this.componentes) {
                    if (this.product.id === componente.id) {
                        if (
                            componente.cantidad + parseInt(this.cantidad) >
                            this.productoSeleccionado.dinventario
                        ) {
                            toastr.error(
                                "La suma de las cantidades supera al stock del producto (" +
                                this.productoSeleccionado.dinventario +
                                ")"
                            );
                            this.cantidad =
                                parseInt(this.productoSeleccionado.dinventario) -
                                componente.cantidad;
                            $("#cant").focus();
                            return;
                        }
                        componente.cantidad = componente.cantidad + parseInt(this.cantidad);
                        toastr.success(
                            "Se sumó " + this.cantidad + " a la cantidad ya existente!!"
                        );
                        this.cantidad = 1;
                        this.unloadProducto();
                        return;
                    }
                }
                this.componentes.push({
                    id: this.product.id,
                    nombre: this.product.nombre,
                    cantidad: parseInt(this.cantidad)
                });
                this.cantidad = 1;
                this.unloadProducto();
                toastr.success("Producto agregado!!");
            },
            eliminarComponente() {
                this.componentes.splice(this.componenteIndex, 1);
                this.componenteIndex = null;
                this.componente = {id: "", nombre: "", cantidad: 0.0};
            },
            productoxCodigo() {
                let res = this.productos.filter(
                    producto => producto.codigo === this.codigoProdBuscar
                );

                if (res.length) {
                    this.product = {
                        id: res[0].id,
                        nombre: res[0].descripcion,
                        precio: res[0].pventa
                    };
                    this.productoSeleccionado = res[0];
                } else if (this.product.id !== "") {
                    this.product = {
                        id: "",
                        nombre: "-",
                        precio: 0.0
                    };
                    this.productoSeleccionado = null;
                }
            },
        },
        computed: {
            productosxNombre() {
                return this.productos.filter(producto =>
                    producto.descripcion
                        .toLowerCase()
                        .includes(this.nombreProdbuscar.toLowerCase())
                );
            }
        }
    };
</script>

<style lang="scss" scoped>
</style>