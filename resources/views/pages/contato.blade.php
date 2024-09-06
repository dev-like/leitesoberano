@extends('pages.base')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('theme/css/contato.css') }}">
    <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('jslibrary')
    <!-- <script src="{{ asset('theme/js/lib/jFlowLabel.js') }}" charset="utf-8"></script> -->
@endsection

@section('body')

    @include('pages.partials._menu')

    <section class="contato">
        <form class="envelope" action="/postMail" method="post">
          {{ csrf_field() }}
            <h1>Contate-nos</h1>
            <div class="msg">
                <label for="mensagem">Mensagem</label>
                <textarea name="mensagem" id="mensagem" required></textarea>
            </div>
            <div class="box">
                <div class="side-left">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="side-right">
                    <button type="submit">ENVIAR</button>
                </div>
            </div>
        </form>
    </section>

    @include('pages.partials._footer')

@endsection

@section('script')

<script src="{{ asset('template/plugins/sweet-alert/sweetalert2.min.js') }}" type="text/javascript"></script>

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
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if (exist){
    swal(
            {
                title: 'Contato realizado com Sucesso!',
                type: 'success',
                confirmButtonColor: '#4fa7f3'
            }
        )
    }
</script>
@endsection
