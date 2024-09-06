@extends('admin.main')

@section('page-title')
  Usuários
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Cadastro de usuários</b></h4>

        {{ Form::open(['route' => 'usuario.store']) }}
            <div class="row">
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('nome', 'Nome do usuário') }}
                  {{ Form::text('nome', null, array('class' => 'form-control')) }}
                </div>
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('email', 'Email do usuário') }}
                  {{ Form::text('email', null, array('class' => 'form-control')) }}
                </div>
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('nivel', 'Usuário administrador?') }}
                  <br>
                  <p class="p-v-xs">
                      <input name="nivel" type="radio" value="0" id="op1" checked  />
                      <label for="op1">Não</label>
                      <input name="nivel" type="radio" value="1" id="op2" />
                      <label for="op2">Sim</label>
                  </p>
                </div>
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password', 'Senha') }}
                  {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
                <div class="col-md-6 offset-md-3">
                  {{ Form::label('password_confirmation', 'Confirmar senha:') }}
                  {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="row">
              <div class="col-md-4 offset-md-4" style="margin-top: 15px">
                <div class="col-6 col-md-6" style="float: left">
                  {{ Form::submit('Salvar', array('class' => 'btn btn-success btn-block')) }}
                </div>
                <div class="col-6 col-md-6" style="float: left">
                  {{ Html::linkRoute('usuario.index', 'Cancelar', null, ['class' => 'btn btn-danger btn-block']) }}
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
