<!doctype html>
<html>
    <header>
        <title>@yield('titulo')</title>
        {{-- <link rel="stylesheet" href="/resources/assets/css/main.css"> --}}
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/material-dashboard.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/demo.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
        <link type="text/css" rel="stylesheet" href="{{URL::asset('sweetalert/sweetalert.css')}}"  media="screen,projection"/>
        <script src="{{URL::asset('sweetalert/sweetalert.min.js')}}"></script>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    </header>
    <body>
        <div class="wrapper">
        <div class="sidebar" data-active-color="red" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="#this" class="simple-text">
                    Easy Banners
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com" class="simple-text">
                    EB
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="https://s-media-cache-ak0.pinimg.com/originals/b1/bb/ec/b1bbec499a0d66e5403480e8cda1bcbe.png" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            {{  Auth::user()->name}}
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">Perfil</a>
                                </li>
                                <li>
                                    <a href="#">Configuração</a>
                                </li>
                                <li><a href="{{URL::asset('medidas')}}">Formatos</a></li>
                                <li><a href="{{URL::asset('portais')}}">Portais</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>                           
                        </div>
                    </div>
                </div>
                @if(isset($campanhas))
                    <div>
                        <ul class="nav">
                            <li class="active">
                                <a href="/campanhas">
                                    <i class="material-icons">dashboard</i>
                                    <p>Campanhas</p>
                                </a>
                            </li>
                            @foreach($campanhas as $campanha)
                                <li>
                                    <a href="/campanhas/portais/{{$campanha->id}}">
                                        <p>{{$campanha->nome}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                             <a  class="navbar-brand _breadcrumb" href="{{URL::asset('campanhas')}}">Campanhas</a>
                             @hasSection('portal')
                                <a class="navbar-brand _breadcrumb"  href="{{URL::asset('campanhas/portais/')}}/@yield('portal')">Portais</a>
                             @endif
                             @hasSection('linhacriativa')
                                <a  class="navbar-brand _breadcrumb" href="{{URL::asset('campanhas/portais/linhascriativas/listar/')}}/@yield('linhacriativa')">Linhas Criativas</a>
                             @endif
                             @hasSection('formato')
                                <a class="navbar-brand _breadcrumb"  href="{{URL::asset('campanhas/portais/linhascriativas/formatos/')}}/@yield('formato')">formatos</a>
                             @endif
                            @hasSection('peca')
                                <a  class="navbar-brand _breadcrumb"  href="{{URL::asset('campanhas/portais/linhascriativas/formatos/pecas/')}}/@yield('peca')"> Peças</a>
                            @endif
                        </div>
                        <div class="collapse navbar-collapse">
                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group form-search is-empty">
                                    <input type="text" class="form-control" placeholder="Pesquisar">
                                    <span class="material-input"></span>
                                </div>
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>
                <div class="content">
                 <div class="container-fluid">
                        @yield('conteudo')
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!--   Core JS Files   -->
    <script src="{{URL::asset('js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/material.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{URL::asset('js/moment.min.js')}}"></script>
    <script src="{{URL::asset('js/chartist.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.bootstrap-wizard.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-notify.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{URL::asset('js/jquery-jvectormap.js')}}"></script>
    <script src="{{URL::asset('js/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.select-bootstrap.js')}}"></script>
    <script src="{{URL::asset('js/jquery.datatables.js')}}"></script>
    <script src="{{URL::asset('js/sweetalert2.js')}}"></script>
    <script src="{{URL::asset('js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/fullcalendar.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.tagsinput.js')}}"></script>
    <script src="{{URL::asset('js/material-dashboard.js')}}"></script>
    <script src="{{URL::asset('js/demo.js')}}"></script>
</body>
</html>
