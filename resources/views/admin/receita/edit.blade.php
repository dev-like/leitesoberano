  @extends('admin.main')

@section('page-title')
Editar Receita
@endsection

@section('page-caminho')
Receitas
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<style>
  .ck-editor__editable {
    height: 180px;
  }
</style>
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    {{ Form::model($receitas, ['route' => ['receitas.update', $receitas->id], 'method' => 'PUT', 'files' => true]) }}

    {{--MODAL INSERE --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <img src="{{ asset('uploads/receitas/'. $receitas->capa) }}" style="width: 100%">
                  </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        <div class="row">
          <div class="form-group col-md-5">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
          </div>
          <div class="form-group col-md-5">
            {{ Form::label('capa', 'Imagem Receita') }}
            <input type="file" name="capa" class="filestyle" data-placeholder="{{ $receitas->capa }}" data-btnClass="btn-light">
          </div>
          <div class="form-group col-md-2">
            {{ Form::label('capa', 'Imagem Cadastrada') }}
            <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-default">Abrir imagem</button>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            {{ Form::label('duracao', 'Duração') }}
            {{ Form::text('duracao', null, array('class' => 'form-control', 'autofocus','maxlength' => '255','required')) }}
          </div>
          <div class="form-group col-md-4">
            {{ Form::label('porcoes', 'Porções') }}
            {{ Form::number('porcoes', null, array('class' => 'form-control', 'autofocus','maxlength' => '255','required')) }}
          </div>
          <div class="form-group col-md-4">
            {{ Form::label('nivel', 'Nivel') }}
            <select class="form-control" name="nivel">
              <option value="Fácil"> Fácil </option>
              <option value="Médio"> Médio </option>
              <option value="Difícil"> Difícil </option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            {{ Form::label('ingredientes', 'Ingredientes') }}
            {{ Form::textarea('ingredientes', null, array('class' => 'form-control', 'autofocus','required')) }}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            {{ Form::label('modopreparo', 'Modo de Preparo') }}
            {{ Form::textarea('modopreparo', null, array('class' => 'form-control', 'autofocus','required')) }}
          </div>
        </div>
        <div class="row" id="web">
          <div class="form-group col-md-6">
            {{ Form::label('descricao', 'Descrição WEB') }}
            {{ Form::text('descricao', null, array('class' => 'form-control', 'autofocus','maxlength' => '250')) }}
          </div>
          <div class="form-group col-md-6">
            {{ Form::label('palavraschave', 'Palavra-chave') }}
            {{ Form::text('palavraschave', null, array('class' => 'form-control', 'autofocus','maxlength' => '250','data-role' => 'tagsinput')) }}
          </div>
        </div>

          <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
                <a href="{{ route('receitas.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
              </div>
            </div>
          </div>
    {{ Form::close() }}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/plugins/ckeditor5/ckeditor.js')}}"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>

<script>
ClassicEditor
  .create( document.querySelector('#ingredientes'), {
    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
</script>
<script>
ClassicEditor
  .create( document.querySelector('#modopreparo'), {
    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
</script>

<script>
jQuery(function($){
  $('.js-example-basic-single').select2();
  $('#preco').mask('#.##0,00', {reverse: true});
});
autosize(document.querySelectorAll('textarea'));
</script>
@endsection
