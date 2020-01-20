 (function($) {
        "use strict"; // Start of use strict


     $(".bootbox-confirm").on('click', function(e) {
         e.preventDefault();

         var message = $(this).attr('data-message') ? $(this).attr('data-message') : "Are you sure?";
         var title = $(this).attr('data-title') ? $(this).attr('data-title') : "Are you sure?";
         var button1 = $(this).attr('data-confirm-text') ? $(this).attr('data-confirm-text') : "Yes";
         var button2 = $(this).attr('data-cancle-text') ? $(this).attr('data-cancle-text') : "No";

         bootbox.confirm({
             title: title,
             message: message,
             buttons: {
                 cancel: {
                     label: button2
                 },
                 confirm: {
                     label: button1
                 }
             },
             callback:  (result) => {
                 if(result){

                     window.location.href = $(this).attr('href');
                 }
             }
         });
     });

 })(jQuery); // End of use strict
