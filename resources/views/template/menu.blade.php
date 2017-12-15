<!--
    'Admin' => 'Administrador del Sistema',
    'Adminzaire' => 'Administra Zaire',
    'Adminzabim' => 'Administra Zabim',
    'Adminborder' => 'Administra Bolivian Border Shop',
    'Adminventas' => 'Ventas',
    'Admincontabilidad' => 'Contabilidad',
    'Admincontrol' => 'Monitoreo',
    'Adminimportaciones' => 'Importaciones'
-->

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset(Auth::user()->usuario_fotografia) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->usuario_cuenta }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú de Navegación</li>
            
            <li>
                <a href="{{ url('/principal') }}">
                    <i class="fa fa-home"></i> <span>Mi Calendario principal</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Mis Actividades</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('principal.create') }}">
                            <i class="fa fa-calendar"></i> <span>Nueva Actividad</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/listEvent') }}">
                            <i class="fa fa-list"></i> <span>Listar mis Actividades</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/reportEvent') }}">
                            <i class="fa fa-file-pdf-o"></i> <span>Reporte de mis Actividades</span>
                        </a>
                    </li>
                </ul>
            </li>  

            @if(Auth::user()->usuario_tipo=='Admin')
            <li>
                <a href="{{ url('/user') }}">
                    <i class="fa fa-user"></i> <span>Usuarios</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Admincontabilidad')
            <li>
                <a href="{{ url('/empleado') }}">
                    <i class="fa fa-user-md"></i> <span>Empleados</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzaire' || Auth::user()->usuario_tipo=='Adminzabim' || Auth::user()->usuario_tipo=='Adminborder' || Auth::user()->usuario_tipo=='Admincontabilidad')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i> <span>Planillas</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzaire' || Auth::user()->usuario_tipo=='Admincontabilidad')
                    <li>
                        <a href="{{ url('/pagoZaire') }}">
                            <i class="fa fa-dollar"></i> <span>Pago/Boletas Zaire LTDA</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzabim' || Auth::user()->usuario_tipo=='Admincontabilidad')
                    <li>
                        <a href="{{ url('/pagoZabim') }}">
                            <i class="fa fa-dollar"></i> <span>Pago/Boletas Zabim SRL</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminborder' || Auth::user()->usuario_tipo=='Admincontabilidad')
                    <li>
                        <a href="{{ url('/pagoBorder') }}">
                            <i class="fa fa-dollar"></i> <span>Pago/Boletas BBS SRL</span>
                        </a>
                    </li>
                    @endif

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-pdf-o"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzaire' || Auth::user()->usuario_tipo=='Admincontabilidad')
                            <li>
                                <a href="{{ url('/planillaZaire') }}">
                                    <i class="fa fa-file-pdf-o"></i> <span>Planilla Zaire LTDA </span>
                                </a>
                            </li>
                            @endif

                            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzabim' || Auth::user()->usuario_tipo=='Admincontabilidad')
                            <li>
                                <a href="{{ url('/planillaZabim') }}">
                                    <i class="fa fa-file-pdf-o"></i> <span>Planilla Zabim SRL</span>
                                </a>
                            </li>
                            @endif

                            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminborder' || Auth::user()->usuario_tipo=='Admincontabilidad')
                            <li>
                                <a href="{{ url('/planillaBorder') }}">
                                    <i class="fa fa-file-pdf-o"></i> <span>Planilla BBS SRL</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                </ul>
            </li>
            @endif


             <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Aguinaldos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzaire' || Auth::user()->usuario_tipo=='Admincontabilidad')
                    <li>
                        <a href="{{ url('/aguinaldoZaire') }}">
                            <i class="fa fa-list-ol"></i> <span>Aguinaldo Zaire LTDA </span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzabim' || Auth::user()->usuario_tipo=='Admincontabilidad')
                    <li>
                        <a href="{{ url('/aguinaldoZabim') }}">
                            <i class="fa fa-list-ol"></i> <span>Aguinaldo Zabim SRL</span>
                        </a>
                    </li>
                    @endif

                    @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminborder' || Auth::user()->usuario_tipo=='Admincontabilidad')
                    <li>
                        <a href="{{ url('/aguinaldoBorder') }}">
                            <i class="fa fa-list-ol"></i> <span>Aguinaldo BBS SRL</span>
                        </a>
                    </li>
                    @endif

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-pdf-o"></i> <span>Planilla Aguinaldo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzaire' || Auth::user()->usuario_tipo=='Admincontabilidad')
                            <li>
                                <a href="{{ url('/paZaire') }}">
                                    <i class="fa fa-file-pdf-o"></i> <span>Planilla Zaire LTDA </span>
                                </a>
                            </li>
                            @endif

                            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminzabim' || Auth::user()->usuario_tipo=='Admincontabilidad')
                            <li>
                                <a href="{{ url('/paZabim') }}">
                                    <i class="fa fa-file-pdf-o"></i> <span>Planilla Zabim SRL</span>
                                </a>
                            </li>
                            @endif

                            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminborder' || Auth::user()->usuario_tipo=='Admincontabilidad')
                            <li>
                                <a href="{{ url('/paBorder') }}">
                                    <i class="fa fa-file-pdf-o"></i> <span>Planilla BBS SRL</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>


            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Admincontabilidad')
            <li>
                <a href="{{ url('/empresa') }}">
                    <i class="fa fa-table"></i> <span>Empresa</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Admincontabilidad')
            <li>
                <a href="{{ url('/asignar') }}">
                    <i class="fa fa-edit"></i> <span>Asignar E & E</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Admincontabilidad')
            <li>
                <a href="{{ url('/area') }}">
                    <i class="fa fa-list-alt"></i> <span> Area</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Admincontabilidad')
            <li>
                <a href="{{ url('/cargo') }}">
                    <i class="fa fa-list"></i> <span> Cargo</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->usuario_tipo=='Admin' || Auth::user()->usuario_tipo=='Adminimportaciones')
            <li>
                <a href="{{ url('/rastreo') }}">
                    <i class="fa fa-location-arrow"></i> <span> Rastrear Contenedor</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>