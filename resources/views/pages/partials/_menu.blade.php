<!-- Menu de Navegação -->
<nav>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-2">
                <div class="menu-icon">
                    <div class="menu-line"></div>
                    <div class="menu-line"></div>
                    <div class="menu-line"></div>
                </div>
                <a href="/"><img src="{{ asset('theme/images/soberano.png') }}" alt="Leite Soberano" class="logo"></a>
            </div>
            <div class="col-md-8">
                <ul>
                  <li class="{{($page=='produtos')?'active':''}}"><a href="/produtos">PRODUTOS</a></li>
                  <li class="{{($page=='galeria')?'active':''}}"><a href="/galeria">GALERIA</a></li>
                  @if($page!='home')
                    <li class="{{($page=='receitas')?'active':''}}"><a href="/#receitas">RECEITAS</a></li>
                  @else
                    <li class="receitas"><a href="#">RECEITAS</a></li>
                  @endif
                  <li class="{{($page=='contato')?'active':''}}"><a href="/contato">CONTATO</a></li>
                  @if(isset($empresa->achenos))
                    <li><a href="{{$empresa->achenos}}" target="_blank">ENCONTRE-NOS</a></li>
                  @endif
                </ul>
            </div>
            <div class="col-md-2">
                <div class="redessociais">
                  @if($empresa->facebook != NULL)
                    <a href="{{$empresa->facebook}}" target="_blank"><img src="{{ asset('theme/images/facebook.png') }}" alt="Facebook"></a>
                  @endif
                  @if($empresa->whatsapp != NULL)
                    <a href="{{$empresa->whatsapp}}" target="_blank"><img src="{{ asset('theme/images/whatsapp.png') }}" alt="Whatsapp"></a>
                  @endif
                  @if($empresa->instagram != NULL)
                    <a href="{{$empresa->instagram}}" target="_blank"><img src="{{ asset('theme/images/instagram.png') }}" alt="Instagram"></a>
                  @endif

                </div>
            </div>
        </div>
    </div>
</nav>
