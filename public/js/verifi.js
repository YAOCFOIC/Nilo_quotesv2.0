$(".quotes").click( function(e){
        var submitButton = $("#input-form").attr("required", true);
        var submitButton = $("#input-form3").attr("required", true);
        var submitButton = $("#input-form3").attr("pattern", '[0-9]{10}');
        var submitButton = $("#input-form2").attr("required", true);
        var submitButton = $("#input-form2").attr("pattern", '^[a-zA-Z ]+$');

       

        var submitButton = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        if (submitButton.test($('#input-form').val().trim())) {
          
            
        } else {
            alert('La direccón de correo no es válida');
            return false;
            e.preventDefault();
        }
        
        var v = grecaptcha.getResponse();
        if(v.length == 0)
        {
            alert("No completaste el captcha")
            return false;
            e.preventDefault();
        }
        else
        {
            document.getElementById('captcha').innerHTML="Captcha completado";
            return true; 
        }
});


$("#position").click( function(e){
        
        var v = grecaptcha.getResponse();
        if(v.length == 0)
        {
            alert("No completaste el captcha")
            return false;
            e.preventDefault();
        }
        else
        {
            document.getElementById('captcha').innerHTML="Captcha completado";
            return true; 
        }
});