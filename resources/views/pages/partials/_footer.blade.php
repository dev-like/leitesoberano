<!-- Rodapé -->
<footer>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-5 col-lg-4 col-xl-3">
                <img src="{{ asset('theme/images/soberano.png') }}" alt="Leite Soberano" class="logo-footer">
            </div>
            <div class="col-md-5 col-lg-4 col-xl-3 sac">
                <img src="{{ asset('theme/images/sac.png') }}" alt="sac">
                SAC:<br>
                @if(isset($empresa->telefone))
                +55 {{$empresa->telefone}}
                @endif
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-12 info">
              @if(isset($empresa->endereco))
              {{$empresa->endereco}}
              @endif
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-12 info">
                TODOS OS DIREITOS RESERVADOS @ SOBERANO 2019
                | DESENVOLVIDO POR
                <a href="http://www.likepublicidade.com">
                    <img src="{{ asset('theme/images/like.png') }}" alt="Like" class="like">
                </a>
            </div>
        </div>
    </div>
</footer>
