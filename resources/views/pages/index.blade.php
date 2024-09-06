@extends('pages.base')

@section('metatags')
    <meta name="description" content="{{$empresa->descricao}}">
    <meta name="keywords" content="{{$empresa->palavraschave}}">
    <meta property="og:title" content="{{$empresa->nomefantasia}}">
    <meta property="og:description" content="{{$empresa->descricao}}">
@endsection

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/lib/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/home.css') }}">
@endsection

@section('body')

    @include('pages.partials._menu')

    <!-- Banner Inicial com Interação -->
    <header>
        <div class="content">
            <div class="container">
                @if(count($produtos) > 0)
                <div class="carousel-produtos">
                    @foreach($produtos as $produto)
                    <div class="item">
                        <div class="img-produto">
                            <img src="{{ asset('uploads/produtos/'.$produto->embalagem) }}" alt="{{$produto->nome}}">
                        </div>
                        <div class="info">
                            <span>{{$produto->nome}}</span>
                            <a href="{{ route('produtoselecionado', 'prod'.$produto->id) }}">Saiba Mais</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </header>

    <!-- Seção "Sobre" -->
    @if($empresa->texto != NULL)
    <section class="sobre">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>{!!$empresa->texto!!}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('theme/images/vaquinha.png') }}" alt="Imagem Vaquinha">
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Seção "Receitas" -->
    <section class="receitas" id="receitas">
        @if(count($receitas) > 0)
        <div class="gradiente"></div>
        @foreach($receitas as $receita)
          <div class="img-receita-fundo {{!($loop->first)?'esconder':''}}" style="background-image:url('uploads/receitas/{{$receita->capa}}')"></div>
        @endforeach
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="carousel-receitas col-md-11 col-lg-8">
                  @foreach($receitas as $receita)
                    <div class="item-carousel">
                      <a href="{{ route('receita.item', $receita->slug) }}">
                        <div class="item">
                            <div class="img-receita" style="background-image:url('uploads/receitas/{{$receita->capa}}')"></div>
                            <h4>{{$receita->nome}}</h4>
                            <strong><img src="{{ asset('theme/images/clock.png') }}" alt="clock"> {{$receita->duracao}}</strong>
                            <strong><img src="{{ asset('theme/images/fork.png') }}" alt="fork"> {{$receita->porcoes}} Porções</strong>
                            <strong><img src="{{ asset('theme/images/chef.png') }}" alt="chef"> {{$receita->nivel}}</strong>
                            <a href="{{ route('receita.item', $receita->slug) }}">Veja mais &gt;</a>
                        </div>
                      </a>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
        @endif

        @include('pages.partials._footer')

    </section>

@endsection

@section('script')
    <script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
@endsection
