jQuery(document).ready(function($){
    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
       
    });
    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            message: jQuery('#message').val(),
            post_id: jQuery('#post_id').val(),
            aw_user_id: jQuery('#aw_user_id').val(),
            owner_user_id: jQuery('#owner_user_id').val(),
           
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var todo_id = jQuery('#todo_id').val();
        var ajaxurl = 'chat';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                jQuery('#myForm').trigger("reset");
               
            },
            error: function (data) {
                console.log(data);
                jQuery('#myForm').trigger("reset");
            }
        });
    });
  });
  
  
      