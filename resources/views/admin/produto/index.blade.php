@extends('admin.main')

@section('page-title')
Produtos Cadastradas
@endsection

@section('page-caminho')
Produtos
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script-bottom')
  <link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="col-12">
  <div class="card-box table-responsive">

    {{--MODAL INSERE --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastrar Produto</h4>
                </div>
              {{ Form::open(['route' => 'produtos.store', 'files' => true]) }}
                {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-8">
                          {{ Form::label('nome', 'Nome') }}
                          {{ Form::text('nome', null, array('class' => 'form-control', 'autofocus','maxlength' => '255','required')) }}
                        </div>
                        <div class="form-group col-md-4">
                          {{ Form::label('sifdipoa', 'SIF/DIPOA') }}
                          {{ Form::text('sifdipoa', null, array('class' => 'form-control', 'autofocus','maxlength' => '40','placeholder' => 'Somentes os números','required')) }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                          {{ Form::label('embalagem', 'Imagem Embalagem') }}
                          <input type="file" name="embalagem" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light" required>
                        </div>
                        <div class="form-group col-md-6">
                          {{ Form::label('selo', 'Imagem Selo') }}
                          <input type="file" name="selo" class="filestyle" data-placeholder="Enviar imagem" data-btnClass="btn-light" required>
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
                          {{ Form::text('infodestaque', null, array('class' => 'form-control', 'autofocus','maxlength' => '1500')) }}
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
                    </div>
                <div class="modal-footer">
                  <div class="row" style="margin-top: 20px">
                    <div class="col-12">
                      <div class="text-center">
                        <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close m-r-5"></i> Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Embalagem</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <!-- <td><div class="background" style="background-image: url( {{url ('produtos/'.$produto->embalagem) }} )"></div></td> -->
                <td><img width="320px" src="{{ asset('uploads/produtos/'. $produto->embalagem) }}"></td>
                <td width="16%">
                  <span class="hint--top" aria-label="Informações Nutricionais"><a href="{{ route('informacaonutricional.index', $produto->id) }}" style="border-radius: 50%" class="btn btn-success waves-effect"> <i class="fa  fa-bar-chart-o"></i></a></span>
                  <span class="hint--top" aria-label="Editar Produto"><a href="{{ route('produtos.edit', $produto->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                  <span class="hint--top" aria-label="Deletar Produto"><button type="button" onclick="goswet({{$produto->id}}, '{{$produto->nome}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/js/autosize.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
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
<script>
$(document).ready( function () {
    $('datatable').DataTable();
  var table = $('#datatable').DataTable({
      "dom": "<'row'<'col-sm-12 col-md-10'f> <'col-sm-12 col-md-2'B> >" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
             lengthChange: false,
              "language": {
                "emptyTable": "Nennhum item cadastrado !",
                "info": "Listando _END_ de _MAX_ registros",
                "infoEmpty":      "",
                "lengthMenu":     "Mostrar _MENU_ Registros",
                "search":         "Pesquisa:",
                "zeroRecords":    "Nenhum registro encontrado.",
                "processing":     "Processando...",
                "loadingRecords": "Carregado...",
                "infoFiltered":   "(filtrado de _MAX_ registros)",
                "paginate": {
               "first":      "Primeiro",
               "last":       "Último",
               "next":       "Próximo",
               "previous":   "Anterior"
             }
           },
        "order": [[ 0, "desc" ]],
        buttons: {
          buttons:[
             {
            text: "Adicionar",
            action: function ( e, dt, button, config ) {
              //dt.ajax.reload();
              $('#modal-default').modal('show')
            },
            className: "btn btn-dark waves-effect waves-light pull-right"
          }]
        }
    });
} );


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  function goswet(id, nome){
    swal.setDefaults({
      reverseButtons: true
    })
    swal({
        title: "Deseja excluir "+nome+"?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/produtos') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Produto deletado !",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('produtos.index') }}";
             }
           );
          },
          error: function(xhr,status, data) {
            swal("Não foi possível deletar item");
          }

        });
      }
    );
  }
</script>
@endsection
