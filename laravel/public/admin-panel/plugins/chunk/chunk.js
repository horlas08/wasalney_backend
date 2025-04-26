
function uploadChunk(fieldName,url,token){

    let browseFile = $('#file-input-'+fieldName);

    let resumable = new Resumable({
        target: url,
        query: {_token: token},
        // fileType: ['png', 'jpg', 'jpeg', 'mp4'],
        chunkSize: 2 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
        maxFiles: 1,

    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        $('#btnUpload-'+fieldName).hide();
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        console.log('progress>>>'+file.progress())
        if(file.progress()!=1)
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete

        updateProgress(100);
        response = JSON.parse(response)
        $('#'+fieldName).val(response.path+'/'+response.fileName);
        $('#imagePreview-'+fieldName).attr('src', response.address +'/'+ response.path +'/'+ response.fileName);
        $('#linkPreview-'+fieldName).attr('href', response.address +'/'+ response.path +'/'+ response.fileName).show();
        $('#btnDelete-'+fieldName).attr('fileName',response.fileName).show();



    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error

        response = JSON.parse(response)
        $('<div id="chunk-alert-{{$field->name}}" class="alert alert-danger alert-dismissible  in" >' +
            '<p><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>' +
            '<p id="chunk-alert-text-{{$field->name}}">'+response.message+'</p></div>').prependTo('#cardBody-'+fieldName);

        $('#btnUpload-'+fieldName).show();
        console.log(response);
        // alert('file uploading error.');
    });

    let progress = $('#progress-'+fieldName);

    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)

        if (value === 100) {
            progress.find('.progress-bar').addClass('bg-success');
        }
    }

    function hideProgress() {
        progress.hide();
    }


    browseFile.click();

}
