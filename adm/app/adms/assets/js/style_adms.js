if(window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}

/* função responsável por exibir/ocultar o menu responsivo
   quando a tela diminui e esconde o menu
---------------------------------------------------------*/
$(document).ready(function() {
    $('.sidebar-toggle').on('click', function(){
      $('.sidebar').toggleClass('toggled');
    });
   
  /* função responsável por carregar o submenu aberto
  --------------------------------------------------*/
  var active = $('.sidebar .active');
  if(active.length && active.parent('.collapse').length){
    var parente = active.parente('.collapse');
    parent.prev('a').attr('aria-expanded', true);
    parent.addClass('show');
  }
});

$(document).ready(function () {
    $('#new_user').on("submit", function () {
        var password = $('#password').val();
        if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        } else if (password === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>");
            return false;
        } else if (password.length < 6 || password.match(/([1-9]+)\1{1,}/)) {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Senha muito fraca, não deve ter número repetido!</div>");
            return false;
        } else if (password.length < 6 || !password.match(/[A-Za-z]/)) {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Senha muito fraca, deve ter pelo menos uma letra!</div>");
            return false;
        }
    });
});

$(document).ready(function () {
    $('#send_login').on("submit", function () {
        if ($('#username').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>");
            return false;
        } else if ($('#password').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>");
            return false;
        }
    });
});


 function passwordStrength(){
     var password = document.getElementById('password').value;
     var strength = 0;

     if((password.length >= 5) && (password.length <= 7)){
         strength += 10;
     } else if(password.length > 7) {
         strength += 25;
     }

     if((password.length >= 6) && (password.match(/[a-z]+/))){
         strength += 10;
     }

     if((password.length >= 7) && (password.match(/[A-Z]+/))){
        strength += 20;
    }

    if((password.length >= 8) && (password.match(/[@#$%&;*]+/))){
        strength += 25;
    }

    if(password.match(/([1-9]+)\1{1,}/)){
        strength += -25;
    }

    console.log(strength);
    viewStrength(strength);
}

function viewStrength(strength) {
    /*Imprimir a força da senha*/

    if (strength < 30) {
        document.getElementById("msgViewStrength").innerHTML = ("<div class='alert alert-danger mt-2' role='alert'>Senha Fraca</div>");
    } else if ((strength >= 30) && (strength < 50)) {
        document.getElementById("msgViewStrength").innerHTML = ("<div class='alert alert-warning mt-2' role='alert'>Senha Média</div>");
    } else if ((strength >= 50) && (strength < 70)) {
        document.getElementById("msgViewStrength").innerHTML = ("<div class='alert alert-info mt-2' role='alert'>Senha Boa</div>");
    } else if ((strength >= 70) && (strength < 100)) {
        document.getElementById("msgViewStrength").innerHTML = ("<div class='alert alert-success mt-2' role='alert'>Senha Forte</div>");
    }
}

$(document).ready(function () {
    $('#new_conf_email').on("submit", function () {
        if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        }
    });
});
 

$(document).ready(function () {
    $('#update_password').on("submit", function () {
        var password = $('#password').val();
        if (password === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>");
            return false;
        } else if (password.length < 6 || password.match(/([1-9]+)\1{1,}/)) {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Senha muito fraca, deve ter no minimo 6 caracteres e não deve ter número repetido!</div>");
            return false;
        } else if (password.length < 6 || !password.match(/[A-Za-z]/)) {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Senha muito fraca, deve ter pelo menos uma letra!</div>");
            return false;
        }
    });
});

$(document).ready(function () {
    $('#add_user').on("submit", function () {
        var password = $('#password').val();
        if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        } else if ($('#username').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>");
            return false;
        }else if (password === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>");
            return false;
        } else if (password.length < 6 || password.match(/([1-9]+)\1{1,}/)) {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Senha muito fraca, não deve ter número repetido!</div>");
            return false;
        } else if (password.length < 6 || !password.match(/[A-Za-z]/)) {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Senha muito fraca, deve ter pelo menos uma letra!</div>");
            return false;
        }
    });
});

$(document).ready(function () {
    $('#edit_user').on("submit", function () {
        if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        } else if ($('#username').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>");
            return false;
        } 
    });
});

$(document).ready(function () {
    $('#edit_profile').on("submit", function () {
        if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        } else if ($('#username').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>");
            return false;
        } 
    });
});


$(document).ready(function () {
    $('#edit_img').on("submit", function () {
        if ($('#new_image').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário selecionar uma imagem JPG ou PNG!</div>");

            return false;
        } 
    });
    
    $('#new_image').change( function(){
        let validos = /(\.jpg|\.png)$/i;
        let fileInput = $(this);
        let name = fileInput.get(0).files["0"].name;
        if(validos.test(name)){
            $(".msg").html('<p></p>');
            previewImage();
        }else{
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário selecionar uma imagem JPG ou PNG!</div>");
            return false;
        }        
    });

    function previewImage(){
        var image = document.querySelector('input[name=new_image]').files[0];
        var preview = document.querySelector('#preview-img');

        var reader = new FileReader();
        reader.onloadend = function(){
            preview.src = reader.result;            
        };

        if(image){
            reader.readAsDataURL(image);
        }else{
            preview.src = "";
        }
    }
});

$(document).ready(function () {
    $('#sits_user').on("submit", function () {
        if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#adms_color_id').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo cor!</div>");
            return false;
        } 
    });
});

$(document).ready(function () {
    $('#form_color').on("submit", function () {
        if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#color').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo cor!</div>");
            return false;
        } 
    });
});

$(document).ready(function () {
    $('#add_conf_email').on("submit", function () {
        if ($('#title').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo título!</div>");
            return false;
        } else if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        } else if ($('#host').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo host!</div>");
            return false;
        } else if ($('#username').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>");
            return false;
        } else if ($('#password').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>");
            return false;
        } else if ($('#smtpsecure').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo SMTP!</div>");
            return false;
        } else if ($('#port').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo porta!</div>");
            return false;
        } 
    });
});

$(document).ready(function () {
    $('#edit_conf_email').on("submit", function () {
        if ($('#title').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo título!</div>");
            return false;
        } else if ($('#name').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>");
            return false;
        } else if ($('#email').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>");
            return false;
        } else if ($('#host').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo host!</div>");
            return false;
        } else if ($('#username').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo usuário!</div>");
            return false;
        } else if ($('#smtpsecure').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo SMTP!</div>");
            return false;
        } else if ($('#port').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo porta!</div>");
            return false;
        } 
    });
});

$(document).ready(function () {
    $('#edit_conf_email_pass').on("submit", function () {
        if ($('#password').val() === "") {
            $(".msg").html("<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo senha!</div>");
            return false;
        } 
    });
});