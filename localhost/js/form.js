
// A $( document ).ready() block.
$(document).ready(function() {
    $("#upload_form").submit(function( event ) {

        event.preventDefault();
        
        $.ajax({
           type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,


        });


    });




});