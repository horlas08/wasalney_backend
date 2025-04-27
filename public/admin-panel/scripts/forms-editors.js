"use strict";



initEditors();

CKEDITOR.on('instanceReady', function(e) {
    // for (var i in CKEDITOR.instances) {
    //
    //     CKEDITOR.instances[i].on('change', function() {
    //         CKEDITOR.instances[i].updateElement();
    //         console.log(CKEDITOR.instances[i].getData())
    //     });
    //
    // }
    e.editor.on('change', function (event) {
        var id=$('#'+event.editor.element.getId()).attr('textarea_id');
        console.log(id)
        $('#'+id).html(event.editor.getData());

    });
});





// $('.full-editor').each(function(i, obj) {
//
//     new Quill('#'+obj.id, {
//         bounds: '#'+obj.id,
//         placeholder: "Type Something...",
//         modules: {
//             formula: !0,
//             toolbar: [[{size: []}], ["bold", "italic", "underline", "strike"], [{color: []}, {background: []}], [{script: "super"}, {script: "sub"}], [{header: "1"}, {header: "2"}, "blockquote", "code-block"], [{list: "ordered"}, {list: "bullet"}, {indent: "-1"}, {indent: "+1"}], [{direction: "rtl"}], ["link", "image", "video", "formula"], ["clean"]]
//         },
//         theme: "snow"
//     });
// });

// $(".full-editor").on('DOMSubtreeModified',function(){
//     var data=$(this).children(":first").html();
//     console.log(data)
//     if(data=="<p><br></p>")
//         $('#'+$(this).attr('textarea_id')).html('');
//     else
//         $('#'+$(this).attr('textarea_id')).html(data);
// })



