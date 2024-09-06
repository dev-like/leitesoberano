  @extends('admin.main')

@section('page-title')
Editar Produto
@endsection

@section('page-caminho')
Produtos
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    {{ Form::model($produtos, ['route' => ['produtos.update', $produtos->id], 'method' => 'PUT', 'files' => true]) }}

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
                    <img src="{{ asset('uploads/produtos/'. $produtos->embalagem) }}" style="width: 100%">
                  </div>
                </div>
            </div>
        </div>
    </div>
    {{--MODAL INSERE 2 --}}
    <div class="modal fade" id="modal-default2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <img src="{{ asset('produtos/'. $produtos->selo) }}" style="width: 100%">
                  </div>
                </div>
            </div>
        </div>
    </div>

          <div class="row">
            <div class="form-group col-md-8">
              {{ Form::label('nome', 'Nome') }}
              {{ Form::text('nome', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
            </div>
            <div class="form-group col-md-4">
              {{ Form::label('sifdipoa', 'SIF/DIPOA') }}
              {{ Form::text('sifdipoa', null, array('class' => 'form-control', 'autofocus','maxlength' => '40','placeholder' => 'Somentes os números')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-10">
              {{ Form::label('embalagem', 'Imagem Embalagem') }}
              <input type="file" name="embalagem" class="filestyle" data-placeholder="{{ $produtos->embalagem }}" data-btnClass="btn-light">
            </div>
            <div class="form-group col-md-2">
              {{ Form::label('capa', 'Imagem Cadastrada') }}
              <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-default">Abrir imagem</button>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-10">
              {{ Form::label('selo', 'Imagem Selo') }}
              <input type="file" name="selo" class="filestyle" data-placeholder="{{ $produtos->selo }}" data-btnClass="btn-light">
            </div>
            <div class="form-group col-md-2">
              {{ Form::label('capa', 'Imagem Cadastrada') }}
              <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-default2">Abrir imagem</button>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('ingredientes', 'Ingredientes') }}
              {{ Form::text('ingredientes', null, array('class' => 'form-control', 'autofocus','maxlength' => '500')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('infodestaque', 'Info Destaque') }}
              {{ Form::text('infodestaque', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('mododepreparo', 'Modo de Preparo') }}
              {{ Form::textarea('mododepreparo', null, array('class' => 'form-control', 'autofocus','maxlength' => '500')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('para1litro', 'Para 1 Litro') }}
              {{ Form::textarea('para1litro', null, array('class' => 'form-control', 'autofocus','maxlength' => '500')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('para200ml', 'Para 200 ML') }}
              {{ Form::textarea('para200ml', null, array('class' => 'form-control', 'autofocus','maxlength' => '500')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('avisoimportante', 'Aviso Importante') }}
              {{ Form::textarea('avisoimportante', null, array('class' => 'form-control', 'autofocus','required')) }}
            </div>
          </div>


          <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
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
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/ckeditor5/ckeditor.js')}}"></script>

<script>
jQuery(function($){
  $('.js-example-basic-single').select2();
  $('#preco').mask('#.##0,00', {reverse: true});
});
autosize(document.querySelectorAll('textarea'));

ClassicEditor
  .create( document.querySelector('#mododepreparo'), {
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
ClassicEditor
  .create( document.querySelector('#para1litro'), {
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
ClassicEditor
  .create( document.querySelector('#para200ml'), {
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
</script>
@endsection
