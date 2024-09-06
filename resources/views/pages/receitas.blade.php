@extends('pages.base')

@section('metatags')
    <meta name="description" content="{{$empresa->descricao}}">
    <meta name="keywords" content="{{$receita->palavraschave}}">
    <meta property="og:title" content="{{$empresa->nomefantasia}}">
    <meta property="og:description" content="{{$receita->descricao}}">
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/receitas.css') }}">
@endsection

@section('jslibrary')
    <script src="{{ asset('theme/js/lib/slick.js') }}" charset="utf-8"></script>
@endsection

@section('body')

    @include('pages.partials._menu')

    <div class="container">
        <div class="produtos">
            <img class="img-receita" src="{{ asset('uploads/receitas/'.$receita->capa) }}">
            <div class="content-box titulo">
                <h1>{{$receita->nome}}</h1>
                <div class="infos">
                    <strong><img src="{{ asset('theme/images/clock.png') }}" alt="clock"> {{$receita->duracao}}</strong>
                    <strong><img src="{{ asset('theme/images/fork.png') }}" alt="fork"> {{$receita->porcoes}} Porções</strong>
                    <strong><img src="{{ asset('theme/images/chef.png') }}" alt="chef"> {{$receita->nivel}}</strong>
                </div>
            </div>
            <div class="content-box">
                <h2>Ingredientes</h2>
                <p>
                  {!!$receita->ingredientes!!}
                </p>
                <div style="clear:both"></div>
            </div>
            <div class="content-box">
                <h2>Modo de Preparo</h2>
                <p>
                  {!!$receita->modopreparo!!}
                </p>
            </div>
        </div>
    </div>

    @include('pages.partials._footer')

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $('.pageloader').fadeOut('fast');
            },2000);

            $('.menu-icon').click(function(){
                $(this).toggleClass('active');
                $('nav ul').slideToggle(200);
                $('nav .redessociais').slideToggle(200);
            });

            $("nav li.receitas a").click(function (event)
        	{
        		event.preventDefault();
                $('.menu-icon').toggleClass('active');
                $('nav ul').slideToggle(200);
                $('nav .redessociais').slideToggle(200);
                var deslocamento = $("#receitas").offset().top-56;
        		$('html, body').animate({ scrollTop: deslocamento }, 700);
        	});
        });
    </script>
@endsection
