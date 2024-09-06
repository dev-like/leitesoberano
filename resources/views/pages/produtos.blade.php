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
    <link rel="stylesheet" href="{{ asset('theme/css/produtos.css') }}">
@endsection

@section('jslibrary')
    <script src="{{ asset('theme/js/lib/slick.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        window.onload = initPage;
        function initPage(){
            setTimeout(function(){
                $('.pageloader').fadeOut('fast');
            },2000);
        }
    </script>
@endsection

@section('body')

    @include('pages.partials._menu')

    @if(count($produtos) > 0)
    <section class="produtos">
        <div class="container">
            <div class="carousel-leites">
              @foreach($produtos as $produto)
                <div id="prod{{$produto->id}}" class="item" style="background-image:url('/uploads/produtos/{{$produto->embalagem}}')"></div>
              @endforeach
            </div>
        </div>
        <div class="container content-box">
            <div class="side">

                <h4 class="nm">Modo de Preparo</h4>
                <h4 class="fl" style="display:none">Mingau para Crianças</h4>
                <div class="info mododepreparo">{!!$produtos[0]->mododepreparo!!}</div>

                <h4 class="nm">Para um litro de leite</h4>
                <h4 class="fl" style="display:none">Vitaminas</h4>
                <div class="info para1litro">
                    <img src="/theme/images/para1litro.png" alt="para 1 litro">
                      {!!$produtos[0]->para1litro!!}
                </div>

                <h4 class="nm">Para 200ml de leite</h4>
                <h4 class="fl" style="display:none">Com Frutas</h4>
                <div class="info para200ml">
                    <img src="/theme/images/para200ml.png" alt="para 200ml">
                      {!!$produtos[0]->para200ml!!}
                </div>

                <div class="info">
                    Use somente água fltrada ou fervida para dissolver mais
                    facilmente o Leite em pó Integral Soberano.
                </div>
                <div class="info">
                    Quando não for utilizar todo o conteúdo, dobre a embalagem
                    e guarde-a em recipiente fechado e seco.
                </div>
                <div class="info">
                    Após aberto consumir seu conteúdo em até 30 dias.
                </div>
                <span>CONSERVAR EM LOCAL SECO E AREJADO</span>
            </div>
            <div class="side">
                <h4>Informação Nutricional</h4>
                <div class="table">
                    <div class="linha">
                        <div class="coluna-3">Porção de 20g (2 colheres de sopa)</div>
                    </div>
                    <div class="linha">
                        <div class="coluna-2">Quantidade por porção</div>
                        <div class="coluna-vd">%VD(*)</div>
                    </div>
                    <div class="valores-nutricionais">
                      @if(count($produtos[0]->informacoesnutricionais) > 0)
                        @foreach($produtos[0]->informacoesnutricionais as $in )
                        <div class="linha">
                            <div class="coluna-1">{{ $in->descricao }}</div>
                            <div class="coluna-1">{{ $in->quantidade }}</div>
                            <div class="coluna-vd">{{ $in->vd }}</div>
                        </div>
                        @endforeach
                      @endif
                    </div>
                </div>
                <div class="asterisco">
                    (*) % Valores Diários com base em uma dieta de 2.000 kcal ou 8.400 kJ.
                    Seus Valores diários podem ser maiores ou menores dependendo
                    de suas necessidades energéticas.
                </div>
                <div class="asterisco">
                    (**) Seus Valores diários podem ser maiores ou menores dependendo
                    de suas necessidades energéticas.
                </div>
                <div class="destaque">
                    {{$produtos[0]->infodestaque}}
                </div>
                <div class="ingredientes">
                    {{$produtos[0]->ingredientes}}
                </div>
                <div class="sifdipoa" style="padding-top: 35px">
                  {{$produtos[0]->sifdipoa}}
                </div>

                <div class="selo" style="background-image:url('/uploads/produtos/{{$produtos[0]->selo}}')"></div>
            </div>
            <div style="clear:both"></div>
            <div class="aviso-importante">
              {{$produtos[0]->avisoimportante}}
            </div>
        </div>
    </section>
    @endif

    @include('pages.partials._footer')

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            // setTimeout(function(){
            //     $('.pageloader').fadeOut('fast');
            // },2000);
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

        var produtoscarousel = $('.produtos div.carousel-leites').slick({
            dots: false,
            arrows: false,
            infinite: false,
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            variableWidth: true,
            focusOnSelect: true
        });

        produtoscarousel.on('afterChange', function(event, slick, currentSlide){

          identify = $('.carousel-leites .item.slick-current').attr('id');
            if (identify == "prod2") {
              $('h4.nm').css('display','none');
              $('h4.fl').css('display','block');
              $('.para200ml img').css('display','none');
              $('.para1litro img').css('display','none');
            }
            else
            {
              $('h4.fl').css('display','none');
              $('h4.nm').css('display','block');
              $('.para200ml img').css('display','block');
              $('.para1litro img').css('display','block');
            }

            $('.produtos .content-box .mododepreparo').html(produtos[identify].mododepreparo);
            $('.produtos .content-box .para1litro p').html(produtos[identify].para1litro);
            $('.produtos .content-box .para200ml p').html(produtos[identify].para200ml);
            $('.produtos .content-box .destaque').text(produtos[identify].infodestaque);
            $('.produtos .content-box .ingredientes').text(produtos[identify].ingredientes);
            $('.produtos .content-box .sifdipoa').text(produtos[identify].sifdipoa);
            $('.produtos .content-box .selo').css('background-image',"url('/uploads/produtos/"+produtos[identify].selo+"')");
            $('.produtos .content-box .aviso-importante').text(produtos[identify].avisoimportante);


            var infonutri = "";
            for (var i = 0; i < produtos[identify].informacoesnutricionais.length; i++) {
                infonutri +=
                '<div class="linha">'+
                    '<div class="coluna-1">'+produtos[identify].informacoesnutricionais[i].descricao+'</div>'+
                    '<div class="coluna-1">'+produtos[identify].informacoesnutricionais[i].quantidade+'</div>'+
                    '<div class="coluna-vd">'+produtos[identify].informacoesnutricionais[i].vd+'</div>'+
                '</div>';
            }
            $('.produtos .content-box .table .valores-nutricionais').html(infonutri);
        });

        var produtos = [];
        @if(count($produtos) > 0)
          @foreach($produtos as $produto)
              produtos["prod{{$produto->id}}"] = {
                  'mododepreparo':'{!!$produto->mododepreparo!!}',
                  'sifdipoa':'{{$produto->sifdipoa}}',
                  'para1litro':'{!!$produto->para1litro!!}',
                  'para200ml':'{!!$produto->para200ml!!}',
                  'infodestaque':'{{$produto->infodestaque}}',
                  'ingredientes':'{{$produto->ingredientes}}',
                  'selo':'{{$produto->selo}}',
                  'avisoimportante':'{{$produto->avisoimportante}}',
                  'informacoesnutricionais':[
                      @if(count($produto->informacoesnutricionais) > 0)
                        @foreach($produto->informacoesnutricionais as $in )
                          {
                            'descricao':'{{$in->descricao}}',
                            'quantidade':'{{$in->quantidade}}',
                            'vd':'{{$in->vd}}'
                          },
                        @endforeach
                      @endif
                  ]
              };
          @endforeach
        @endif

        if($('#{{$prodselecionado || "none"}}').length != 0)
            produtoscarousel.slick("slickGoTo",$('.carousel-leites .item#{{$prodselecionado}}').index());

    </script>
@endsection
