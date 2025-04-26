var emojiboxOpened = false;
$(document).ready(function(){

	$(function () {$('audio').audioPlayer();});
	var lightbox = GLightbox();

    $(".select-emoji").click(function(){
		if(emojiboxOpened == false){
			$(".emojibox").addClass("show");
			emojiboxOpened = true;
			$(".select-emoji").removeClass("ic-emoji");
			$(".select-emoji").addClass("ic-close");
            $(".transparent-overlay").addClass("show");
		}else{
			closeEmojiBox();
		}
    });

    $(".msg-menu-btn").click(function(event){
        $(".msg-menu").addClass("show");
        var menu_position = $(event.currentTarget).offset();
        $(".msg-menu").css(menu_position);
        $(".transparent-overlay").addClass("show");
    });

    $(".transparent-overlay").click(function(){
        $(".msg-menu").removeClass("show");
        closeEmojiBox();
        $(".transparent-overlay").removeClass("show");
    });
    
});

function closeEmojiBox(){
    $(".emojibox").removeClass("show");
	$(".select-emoji").addClass("ic-emoji");
	$(".select-emoji").removeClass("ic-close");
    emojiboxOpened = false;
}

function insertContent(html) {
    var sel, range;
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        document.selection.createRange().pasteHTML(html);
    }
}
