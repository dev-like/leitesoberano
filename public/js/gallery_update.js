Dropzone.options.addImages = {
  maxFileSize: 2,
  acceptedFiles: 'image/*',
  success: function(file, response){
    if(file.status == 'success'){
      handleDropzoneFileUpload.handleSuccess(response);
    } else {
      handleDropzoneFileUpload.handleError(response);
    }
  }
};

var handleDropzoneFileUpload = {
  handleError: function(response){
    console.log(response);
  },
  handleSuccess: function(response){
    console.log(response);
    var imageList = $('#gallery-images ul');
    var imageSrc = baseUrl + 'galeria/imagens/' + response.midia;
    $(imageList).append('<li><div class="img-thumbnail" style="margin-bottom: 15px"><img src="'+ imageSrc +'"><div class="caption"><div class="row"><div class="col-md-12">'
    +(response.descricao || '<p></p>')+'</div></div> <div class="row"><div class="col-md-6"> <button onclick="editarDescrição('+response.id+', '+(response.descricao || '\'\'')
    +')" class="btn btn-primary btn-block">Editar Descricao</button> </div> <div class="col-md-6"><button type="button" onclick="goswet('+response.id+')" class="btn btn-danger btn-block">Deletar</button></div></div> </div></div></li>')
  }
};
