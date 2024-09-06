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
    {{ Form::model($infonutri, ['route' => ['informacaonutricional.update', $infonutri->id], 'method' => 'PUT', 'files' => true]) }}
          <div class="row">
            <div class="form-group col-md-12">
              {{ Form::label('descricao', 'Descrição') }}
              {{ Form::text('descricao', null, array('class' => 'form-control', 'autofocus','maxlength' => '50','required')) }}
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              {{ Form::label('quantidade', 'Quantidade') }}
              {{ Form::text('quantidade', null, array('class' => 'form-control', 'autofocus','maxlength' => '20','required')) }}
            </div>
            <div class="form-group col-md-6">
              {{ Form::label('vd', 'VD %') }}
              {{ Form::text('vd', null, array('class' => 'form-control', 'autofocus','maxlength' => '20')) }}
            </div>
          </div>

          <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
                <a href="JavaScript: window.history.back();" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
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

<script>
jQuery(function($){
  $('.js-example-basic-single').select2();
  $('#preco').mask('#.##0,00', {reverse: true});
});
autosize(document.querySelectorAll('textarea'));
</script>
@endsection
