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
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="{{ url('../admin') }}">@yield('page-caminho')</a></li>
                                        <li class="breadcrumb-item active">@yield('page-title')</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        @include('admin.partials._message')
                        <div class="row">
                          @yield('content')
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
                <footer class="footer text-right">
                  <a href="http://www.likepublicidade.com" target="_blank">
                    2018 © Like Publicidade
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        @include('admin.partials._bottom')
        @yield('scripts')
    </body>
</html>
