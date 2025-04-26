
function uploadChunk(fieldName,url,token,isMulti){

    let browseFile = $('#file-input-'+fieldName);

    let resumable = new Resumable({
        target: url,
        query: {_token: token},
        // fileType: ['png', 'jpg', 'jpeg', 'mp4'],
        chunkSize:  1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,

        maxFiles: isMulti?undefined:1,

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
        console.log('success>>>'+response)
        updateProgress(100);
        response = JSON.parse(response)
        // $('#'+fieldName).val(response.path+'/'+response.fileName);
        // $('#imagePreview-'+fieldName).attr('src', response.address +'/'+ response.path +'/'+ response.fileName);
        // $('#linkPreview-'+fieldName).attr('href', response.address +'/'+ response.path +'/'+ response.fileName).show();
        // $('#btnDelete-'+fieldName).attr('fileName',response.fileName).show();

        $('<div style="position: relative">'
            +'<input type="hidden" name="'+fieldName+(isMulti?"[]":"")+'" class="form-control" value="'+response.path+'/'+response.fileName+'">'
            +'<a  href="'+response.address +'/'+ response.path +'/'+ response.fileName+'" target="_blank">'
        +'<img src="'+response.address +'/'+ response.path +'/'+ response.fileName+'" height="60" width="60" onerror="this.src=\'/admin-panel/images/file.png\'" >'
        +'</a>'
        +'<i onclick="deleteFile(this,\''+fieldName+'\')" fileName="'+response.fileName+'" class="fa-solid fa-trash" style="position: absolute;top: 5px;right:5%;color: red;cursor: pointer"></i>'
        +'</div>').appendTo('#files-'+fieldName);


    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        console.log('failed>>>'+response)
        response = JSON.parse(response)
        $('<div class="alert alert-danger alert-dismissible  in" >' +
            '<p><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>' +
            '<p>'+response.message+'</p></div>').prependTo('#cardBody-'+fieldName);

        $('#btnUpload-'+fieldName).show();
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
            if (isMulti)
                $('#btnUpload-'+fieldName).show();
        }
    }

    function hideProgress() {
        progress.hide();
    }


    browseFile.click();

}



function deleteFile(element,fieldName){
    var fileName=$(element).attr('fileName');
    var url=$(element).parent().parent().attr('deleteUrl');
    $.ajax({url: url+'?fileName='+fileName, success: function(result){
            if(result){
                $(element).parent().remove();
                $('#progress-'+fieldName).hide();
                $('#btnUpload-'+fieldName).show();
            }
        }});
}





function uploadExcel(url,token){

    browseFile=$('#input-import');


    let resumable = new Resumable({
        target: url,
        query: {_token: token},
        // fileType: ['png', 'jpg', 'jpeg', 'mp4'],
        chunkSize:  1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
        maxFiles: 1,

    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked

        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        console.log('progress>>>'+file.progress())
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete


        response = JSON.parse(response)




    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error

        response = JSON.parse(response)

        console.log(response);
    });





    browseFile.click();

}
