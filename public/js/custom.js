Dropzone.options.myDropzone = {
  maxFilesize: 5, //mb- Image files not above this size
  uploadMultiple: true, // set to true to allow multiple image uploads
  parallelUploads: 15, //all images should upload same time
  maxFiles: 15, //number of images a user should upload at an instance
  acceptedFiles: ".png,.jpg,.jpeg", //allowed file types, .pdf or anyother would throw error
  addRemoveLinks: true, // add a remove link underneath each image to 
     autoProcessQueue: false, // Prevents Dropzone from uploading dropped files immediately

     removedfile: function(file) {

      var name = file.name; 
      if (name) {
        $.ajax({

          headers:{
            'X-CSRF-Token':$('input[name="_token"]').val()
  }, //passes the current token of the page to image url

  type: 'GET',
        url: "/products/remove/"+name,  //passes the image name to  the method handling this url to //remove file
        dataType: 'json'
      });
      }
      var _ref;
      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

    },

    
    

    init: function() {
      var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

        submitButton.addEventListener("click", function() {
      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("addedfile", function() {
      // Show submit button here and/or inform user to click it.
    });


  }
};
