var fileraport = [];


Dropzone.autoDiscover = false;
let ijazahUpload = document.querySelectorAll('.dropzone');
let BtnUoloadIjazah = document.querySelector('#btn-submit-upload');
ijazahUpload.forEach((element,index)=>{
    var myDropzone = new Dropzone(element,{ // camelized version of the `id`
        paramName: "uploadFile", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        acceptedFiles:"image/jpeg,image/png,image/PNG,image/jpg",
        autoProcessQueue:true,
        createImageThumbnails: false,
        uploadMultiple:false,
        addRemoveLinks: true,
        maxFiles: 100,
        params: {
            productid: element.getAttribute('data-id')
       },accept: function(file, done) {
            done(); 
        },addfile:function(file){
            console.log(file);
            formData.append("file", file);
            var _this = this;
            if ($.inArray(file.type, ["image/jpeg","image/png","image/PNG","image/jpg"]) == -1) {
                _this.removeFile(file);
            }
        }
        ,success: function(localfile, response){
            //myDropzone.removeFile(localfile);
            elementfile = JSON.parse(response);
            var mockFile = { name: elementfile.file.name, size: elementfile.file.size,id:elementfile.file.id };
            myDropzone.options.addedfile.call(myDropzone, mockFile);
            myDropzone.options.thumbnail.call(myDropzone, mockFile,elementfile.file.url);

        },removedfile:function(file){
            var _ref;
            console.log(file);
            if(file.xhr){
            var fileName = JSON.parse(file.xhr.response); 
                $.ajax({
                    type: 'DELETE',
                    url: `${this.options.url}?${fileName.name?'filename='+fileName.name:''}`,
                    dataType:'json',
                    success: function(data){
                        $('#notif-message').html('Berkas Berhasil di upload');
                    }
                });
            }else if(file.id){
                $.ajax({
                    type: 'DELETE',
                    url: `${this.options.url}?${file.name?'&fileid='+file.id+'&filename='+file.name:''}`,
                    dataType:'json',
                    success: function(data){
                        $('#notif-message').html('Berkas Berhasil di upload');
                    }
                });
            }
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        } 
    });
    let listfile = JSON.parse(element.getAttribute('file-added'));
    console.log(listfile);
    listfile.forEach((elementfile,indexfile)=>{
        var mockFile = { name: elementfile.name, size: elementfile.size,id:elementfile.id };
        myDropzone.options.addedfile.call(myDropzone, mockFile);
        myDropzone.options.thumbnail.call(myDropzone, mockFile,elementfile.url);
    });
    // const setFile = function(){
        
    // }
    // setFile()

    // myDropzone.hiddenFileInput.removeAttribute("multiple");
    // BtnUoloadIjazah.addEventListener('click',function(e){
    //     e.preventDefault();
    //     myDropzone.processQueue();
    //     $('#modal-upload-ijazah').modal('hide');
    //     setTimeout(()=>{
    //         $('#basic-datatable').DataTable().ajax.reload();
    //     },1000);
    // });
});

