@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page-title')
  Usuários Cadastrados
@endsection

@section('page-caminho')
  Usuários
@endsection

@section('content')
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="{{ route('usuario.destroy', '1') }}" id='formDestroyer' accept-charset="UTF-8">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="myModalLabel">Exclusão de usuário</h5>
            </div>
            <div class="modal-body">
               <h6>Confirme sua senha de usuário para efetuar a exclusão</h6>
               <div class="row">
                 <div class="col-md-6 offset-md-3">
                   <input type="password" name="senhaUsuarioLogado" class="form-control">
                   <input type="hidden" name="idUsuario" id="idUsuario">
                 </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="btn btn-primary waves-effect waves-light" value="Deletar">Confirmar</button>
            </div>
        </div><!-- /.modal-content -->
      </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="col-12">
  <div class="card-box">
    <a href="{{ route('usuario.create') }}" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
    <h4 class="m-t-0 header-title">Usuários Cadastrados</h4>

    <table class="table table-striped">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @forelse($usuarios as $usuario)
            <tr>
              @if($usuario->id != 1)
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->email }}</td>
                <td width="15%">
                    <span class="hint--top" aria-label="Editar usuário"><a href="{{ route('usuario.edit', $usuario->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Alterar senha"><a href="{{ route('usuario.editar_senha', $usuario->id) }}" style="border-radius: 50%" class="btn btn-secondary waves-effect"> <i class="fa fa-key m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Deletar usuário"><button type="button" style="border-radius: 50%" onclick="$('#idUsuario').val({{$usuario->id}})" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#myModal"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
            @endif
          @empty
            <tr>
                <td colspan="4" class="text-center">Nenhum Item cadastrado</td>
            </tr>
          @endforelse
        </tbody>
    </table>
    @if ($usuarios->lastPage() > 1)
        <ul class="pagination ml-auto">
            <li class="{{ ($usuarios->currentPage() == 1) ? ' disabled' : '' }} page-item">
                <a class=" page-link " href="{{ $usuarios->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $usuarios->lastPage(); $i++)
                <li class="{{ ($usuarios->currentPage() == $i) ? ' active' : '' }} page-item">
                    <a class=" page-link " href="{{ $usuarios->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($usuarios->currentPage() == $usuarios->lastPage()) ? ' disabled' : '' }} page-item">
                <a href="{{ $usuarios->url($usuarios->currentPage()+1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    @endif  </div>

</div>

@endsection

@section('scripts')

  <script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  </script>

@endsection
