@extends('admin.main')

@section('page-caminho')
Galeria
@endsection

@section('page-title')
Cadastar Mídia
@endsection

@section('styles')
  {!! Html::style('css/gallery_backend.css') !!}
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('template/css/dropzone.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('template/css/gallery_backend.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
    <div class="box-header with-border">
        <div class="row">
          <div class="col-md-12">
            <h2>Imagens</h2>
            {{ Form::open(['route' => 'gallery.upload', 'files' => true, 'class' => 'dropzone', 'id' => 'dropzone',  'enctype'=>'multipart/form-data']) }}
            {{csrf_field()}}
            {{ Form::close() }}
          </div>
          <div class="row">
            <div class="col-md-12 standard-top-spacing">
              <div id="gallery-images">
                  <ul>
                    @foreach($galeria as $image)
                      <li>
                          <img src="{{ url('uploads/galeria/'.$image->caminho) }}">
                          <div class="caption">
                            <div class="row">
                              <div class="col-md-6">
                                <button type="button" onclick="goswet({{$image->id}})" class="btn btn-danger btn-block">Deletar</button>
                              </div>
                            </div>
                          </div>
                      </li>
                    @endforeach
                  </ul>
              </div>
            </div>
          </div>
        </div>

      <div class="row" style="margin-top: 20px">
      <div class="form-group col-12">
        <div class="text-center">
          <hr>
          <button class="btn btn-success" id="submit-all" onclick="reload()" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('template/js/dropzone.js') }}"></script>

<script type="text/javascript">

Dropzone.options.dropzone = {
  autoProcessQueue: false,
  acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
  maxFilesize: 5,
  resizeWidth: 1024,
  resizeHeight: 768,
  parallelUploads: 50,
  dictDefaultMessage: "Clique ou arraste as fotos aqui, limite de 50 fotos por vez. Tamanho máximo de imagem 2900 x 2900 ",
  dictRemoveFile: "Remover foto",
  addRemoveLinks: true,

  init: function() {
    var submitButton = document.querySelector("#submit-all")
    myDropzone = this;
    submitButton.addEventListener("click", function() {
      myDropzone.processQueue();
    });

  this.on('failed', function() {
    swal('Não foi possível adicionar imagem');
  });

  }
};
</script>


<script type="text/javascript">
$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

function goswet(id){
    swal({
        title: "Deseja excluir esta mídia?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar",
        closeOnConfirm: false
    }).then(
      function(){
        $.ajax({
          type: "GET",
          url: "{{ url('admin/galeria/gallery/destroy') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Item deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('galeria.index') }}";
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
