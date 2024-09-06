<!DOCTYPE html>
<html>

@include('admin.partials._head')

@yield('styles')

@section('page-title')
Painel Administrativo
@endsection


<body>

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left">
        <a href="/admin" class="logo">
          <span>
            <img src="{{ asset('template/images/soberano.png') }}" alt="" height="40">
          </span>
          <i>
            <img src="{{ asset('template/images/soberano.png') }}" alt="" height="20">
          </i>
        </a>
      </div>

      @include('admin.partials._nav')

    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.partials._aside')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <h4 class="page-title float-left">@yield('page-title')</h4>

                <div class="clearfix"></div>
              </div>

            </div>
          </div>

          @include('admin.partials._message')
          <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="mdi mdi-chart-bar float-right"></i>
                    <h6 class="text-muted text-uppercase mb-3">Alcance Orgânico</h6>
                    <h4 class="mb-3" id="organico" data-plugin="counterup">Carregando</h4>
                    <span class="badge badge-primary" id="crescimento"> Carregando </span> <span class="text-muted ml-2 vertical-middle"> nos últimos 30 dias</span>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fa fa-clock-o float-right"></i>
                    <h6 class="text-muted text-uppercase mb-3">Tempo de Acesso</h6>
                    <h4 class="mb-3" id="tempoAcessos">
                      <span style="display: inline-block; width: 32%">
                        <span class="counter">Carregando</span>
                      </span>
                    </h4>
                    <span class="text-muted ml-2 vertical-middle">Tempo médio de cada usuário</span>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
              <div class="card-box tilebox-one">
                <i class="fi-layers float-right"></i>
                <h6 class="text-muted text-uppercase mb-3">Acessos Hoje</h6>
                <h4 class="mb-3" id="acessosHoje">$<span data-plugin="counterup">Carregando</span></h4>
                <span class="text-muted ml-2 vertical-middle">a qualquer página do site</span>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="fa fa-line-chart float-right"></i>
                    <h6 class="text-muted text-uppercase mb-3">Crescimento</h6>
                    <h4 class="mb-3" id = "crescimentoAlcance">Carregando</h4>
                    <span class="text-muted ml-2 vertical-middle">Nos últmimos 30 dias</span>
                </div>
            </div>
        </div>
        <div class="col-12">
          <div class="row">
            @yield('content')
            <div class="col-md-6">
              <div class="card-box">
                <p style="text-align: center">Acessos ao site nos últimos 7 dias</p>
                <canvas id="visitantes" height="150px" ></canvas>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-box">
                <p style="text-align: center">Páginas mais acessadas nos últimos 7 dias</p>
                <canvas id="paginas" height="150px"></canvas>
              </div>
            </div>
          </div>
        </div>


        </div> <!-- container -->

      </div> <!-- content -->

      <footer class="footer text-right">
        <a href="http://www.likepublicidade.com" target="_blank">
          2018 © Like Publicidade</a>
        </footer>

      </div>

    </div>

    @section('scripts')
      <script type="text/javascript">
        var a = {!!json_encode($visitantes)!!};
        var b = {!!json_encode($paginas)!!};
        var c = {!!json_encode($acessos)!!};
        var d = {!!json_encode($acessoAnterior)!!};
      </script>
      <script type="text/javascript" src="{{ asset('template/pages/jquery.jvectormap.init.js') }}"></script>
      <script type="text/javascript" src="{{ asset('template/js/analytics.js') }}"></script>
    @endsection
    @include('admin.partials._bottom')
    @yield('scripts')
  </body>
  </html>
