<header role="header">
    {{--Barra de navegacion--}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth()
                <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::is('ventas*') ? 'active' : '' }}">
                            <a href="" class="nav-link">
                                <i class="fa fa-shopping-cart"></i> Ventas
                            </a>
                        </li>
                        <li class="nav-item dropdown {{ Request::is('clientes*') || (Route::currentRouteName() == 'reporte-saldos') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i> Clientes
                            </a>
                            <div class="dropdown-menu mt-md-2" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('clientes.index') }}"><i class="fa fa-list"></i> Lista de Clientes</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('clientes.create') }}"><i class="fa fa-user-plus"></i> Nuevo Cliente</a>
                                {{--<a class="dropdown-item" href="#"><i class="fa fa-user-edit"></i> Modificar Cliente</a>--}}
                                {{--<a class="dropdown-item" href="#"><i class="fa fa-user-minus"></i> Eliminar Cliente</a>--}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-id-card"></i> Estado de Cuenta</a>
                                <a class="dropdown-item" href="{{ route('reporte-saldos') }}"><i class="fa fa-address-book"></i> Reporte de Saldos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{ Request::is('productos*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i> Productos
                            </a>
                            <div class="dropdown-menu mt-md-2" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('productos.index') }}"><i class="fa fa-book-open"></i> Catálogo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('productos.create') }}"><i class="fa fa-plus"></i> Nuevo Producto</a>
                                {{--<a class="dropdown-item" href="#"><i class="fa fa-edit"></i> Modificar Producto</a>--}}
                                {{--<a class="dropdown-item" href="#"><i class="fa fa-minus"></i> Eliminar Producto</a>--}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-th-list"></i> Departamentos</a>
                                <a class="dropdown-item" href="#"><i class="far fa-calendar-alt"></i> Ventas por Periodo</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-gift"></i> Promociones</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-file-import"></i> Importar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown {{ Request::is('inventario*') ? 'active' : '' }}">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i> Inventario
                            </a>
                            <div class="dropdown-menu mt-md-2" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><i class="fa fa-plus-circle"></i> Agregar</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-pencil-alt"></i> Ajustes</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-arrow-alt-circle-down"></i> Productos bajos en Inventario</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-file-archive"></i> Reporte de Inventario</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-file-alt"></i> Reporte de Movimientos</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-book"></i> Kardex de Inventario</a>
                            </div>
                        </li>
                    </ul>
            @endauth
            
            
            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Inciar sesión') }}</a>
                        </li>
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--</li>--}}
                    @else
                        <li class="nav-item">
                            <a href="#" class="nav-link" role="button" data-toggle="tooltip" data-placement="bottom" title="{{ __('Configuración') }}">
                                <i class="fa fa-cog"></i>
                                <span class="d-lg-none">Configuración</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" role="button" data-toggle="tooltip" data-placement="bottom" title="{{ __('Facturas') }}">
                                <i class="fab fa-wpforms"></i>
                                <span class="d-lg-none">Facturas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" role="button" data-toggle="tooltip" data-placement="bottom" title="{{ __('Cortes') }}">
                                <i class="fa fa-cut"></i>
                                <span class="d-lg-none">Cortes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" role="button" data-toggle="tooltip" data-placement="bottom" title="{{ __('Reportes') }}">
                                <i class="fa fa-chart-bar"></i>
                                <span class="d-lg-none">Reportes</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombre_completo }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right mt-md-2" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{--Fin Barra de navegacion--}}
</header>