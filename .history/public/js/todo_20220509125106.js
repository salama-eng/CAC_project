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
          title: jQuery('#title').val(),
          description: jQuery('#description').val(),
      };
      var state = jQuery('#btn-save').val();
      var type = "POST";
      var todo_id = jQuery('#todo_id').val();
      var ajaxurl = 'todo';
      $.ajax({
          type: type,
          url: ajaxurl,
          data: formData,
          dataType: 'json',
          success: function (data) {
             
          },
          error: function (data) {
              console.log(data);
          }
      });
  });
});