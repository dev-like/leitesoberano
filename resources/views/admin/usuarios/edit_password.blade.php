@extends('admin.main')

@section('page-title')
  Usuários
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Editar senha de {{ $usuario->nome }}</b></h4>

        {{ Form::model($usuario, ['route' => ['usuario.atualizar_senha', $usuario->id], 'method' => 'POST', 'id' => 'sendForm']) }}
            <div class="row">
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password', 'Nova Senha') }}
                  {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password_confirmation', 'Confirmar Nova Senha') }}
                  {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password_user', 'Digite sua senha de usuário, para confirmar alteração') }}
                  {{ Form::password('password_user', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
              <div class="col-12">
                <div class="text-center">
                  <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
                  <a href="{{ route('usuario.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
                </div>
              </div>
            </div>
        {{ Form::close() }}

  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/js/pages/form_elements.js') }}"></script>
@endsection
