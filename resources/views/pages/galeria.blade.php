@extends('pages.base')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/galeria.css') }}">
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/css/lib/ThumbnailGrid.css') }}">
@endsection

@section('jslibrary')
    <!-- <script src="{{ asset('theme/js/lib/jFlowLabel.js') }}" charset="utf-8"></script> -->
@endsection

@section('body')

    @include('pages.partials._menu')

    <div class="container secgaleria">
      <section class="tt-grid-wrapper">

      	<ul class="tt-grid tt-effect-superscale tt-effect-delay">
          @foreach(($galeria)->take(6) as $fotos)
            <li><a href="javascript:openmodal('.ex{{$loop->iteration}}')"><div class="box-img ex{{$loop->iteration}}" style="background-image:url('uploads/galeria/{{$fotos->caminho}}')"></div></a></li>
          @endforeach
      	</ul>

	      <div class="galeria">
          @foreach($galeria as $fotos)
            @if($loop->first)
              <a class="tt-current"></a>
            @elseif($loop->index % 6 == 0)
              <a></a>
            @endif
          @endforeach
	       </div>

      </section>
    </div>

    <div class="fundo-opaco">
      <div class="container">
          <div class="img-album">
            X
          </div>
      </div>
    </div>

    @include('pages.partials._footer')

@endsection

@section('script')

<script src="{{ asset('template/plugins/sweet-alert/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/js/modernizr.custom.js') }}" type="text/javascript"></script>

<script>

    var imgselected = null;

    function openmodal(elem){
        elem = $(elem);
        imgselected = elem.index();
        $('.fundo-opaco .img-album').css('background-image',elem.css('background-image'));
        $('.fundo-opaco').fadeIn('fast');
    }

    $(document).ready(function(){

      $('.fundo-opaco').click(function(teste){
          if($('.fundo-opaco .img-album').has(event.target).length || event.target == $('.fundo-opaco .img-album'))
              return;
          $('.fundo-opaco').fadeOut('fast');
      });


    });

  $('elem').prop('style',$(this).prop('style'))

    var imagensgaleria = {};
    @foreach($rep_galeria as $conjunto)
        imagensgaleria['page{{$loop->iteration}}'] = [];
        @foreach($conjunto as $fotos)
            imagensgaleria['page{{$loop->parent->iteration}}'].push('<a href="javascript:openmodal(\'.ex{{$loop->iteration}}\')"><div class="box-img ex{{$loop->iteration}}" style="background-image:url(\'uploads/galeria/{{$fotos["caminho"]}}\')"></div></a>');
        @endforeach
    @endforeach

</script>

<script src="{{ asset('theme/js/lib/classie.js') }}" type="text/javascript"></script>
<script src="{{ asset('theme/js/lib/thumbnailGridEffects.js') }}" type="text/javascript"></script>

<script>
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
