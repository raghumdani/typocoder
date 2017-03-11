     window.onbeforeunload= function(){
       jQuery.ajax({
       type: "POST",
       url: "logout_on_close.php",
       data: '',
       cache: false,
       success: function(response)
       {
         alert("Record successfully updated");
       }
       });
     }