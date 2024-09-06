<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Painel Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('template/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('template/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('template/js/modernizr.min.js') }}"></script>

    </head>


    <body class="bg-accpunt-pages" style="background: url('{{ asset('template/images/soberano-bg.png') }}') no-repeat center center;background-size: cover;">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="/login" class="text-success">
                                                <span><img src="{{ asset('template/images/soberano.png') }}" alt="" height="70"></span>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                          {{ csrf_field() }}
                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="email">Email</label>
                                                    <input class="form-control" type="email" name="email" id="emailaddress" required="" value="{{ old('email') }}" placeholder="Digite seu email">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Senha</label>
                                                    <input class="form-control" type="password" name="password" required="" id="password" placeholder="Digite sua senha">
                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn w-lg btn-primary btn-rounded" type="submit">Entrar</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->
                        </div>
                        <!-- end wrapper -->
                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->


        <!-- jQuery  -->
        <script src="{{ asset('template/js/jquery.min.js') }}"></script>
        <script src="{{ asset('template/js/popper.min.js') }}"></script>
        <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('template/js/waves.js') }}"></script>
        <script src="{{ asset('template/js/jquery.slimscroll.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('template/js/jquery.core.js') }}"></script>
        <script src="{{ asset('template/js/jquery.app.js') }}"></script>

    </body>
</html>
