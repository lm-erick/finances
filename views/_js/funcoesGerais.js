$(document).ready(function () {

  $("#form-login").on('click', '#btn-login', function (event) {

    logIn();

  });

  $("#form-cadastro").on('click', '#btn-form-cadastro', function (event) {

    $("#alerts div").css("display", "none");

    var nome = $("#form-cadastro input[name=nome]").val();
    var login = $("#form-cadastro input[name=login]").val();
    var senha = $("#form-cadastro input[name=senha]").val();

    if (nome == '') {
      $("#form-cadastro input[name=nome]").focus();
      return;
    }
    if (login == '') {
      $("#form-cadastro input[name=login]").focus();
      return;
    }
    if (senha == '') {
      $("#form-cadastro input[name=senha]").focus();
      return;
    }

    createUser();

  });

});

function logIn() {

  var dados = $("#form-login").serialize();

  $.ajax({
    url: URL_JS + '/user/logar',
    type: 'POST',
    data: dados,
    dataType: 'json',
    success: function (retorno) {

      if (retorno == 'error') {
        alert('Usuario ou Senha Inválido');
      } else {

        window.location.href = URL_JS + "/controlpanel";

      }

    }

  });

}

function createUser() {

  var dados = $("#form-cadastro").serialize();

  $.ajax({
    url: URL_JS + '/user/salvar',
    type: 'POST',
    data: dados,
    dataType: 'json',
    success: function (retorno) {

      if (retorno == 'success') {

        $("#alerts .success").css("display", "block");

      } else {

        $("#alerts .danger").css("display", "block");

      }

    }

  });

}

