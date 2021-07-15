$(document).ready(function () {

    $('.table-default').DataTable();

    $("#modal-crudbanco").on('click', '.btn-primary', function (event) {

        salvarBanco();

        window.location.href = URL_JS + "/banco";

    });

    $("#modal-crudcategoria").on('click', '.btn-primary', function (event) {

        salvarCategoria();

        window.location.href = URL_JS + "/categoria";

    });

    $("#modal-crudconta").on('click', '.btn-primary', function (event) {

        salvarConta();

        window.location.href = URL_JS + "/conta";

    });

    $("#modal-crudfluxo").on('click', '.btn-primary', function (event) {

        salvarFluxo();

       //window.location.href = URL_JS + "/fluxo";

    });

    $("#table-banco").on('click', '.edit', function (event) {

        var row = $(this).attr('row');

        var id_banco = $("tr[linerow='" + row + "']").find("td[label='id_banco']").text();
        var nome = $("tr[linerow='" + row + "']").find("td[label='nome']").text();
        var codigo = $("tr[linerow='" + row + "']").find("td[label='cod_banco']").text();

        $("#modal-crudbanco input[name='id_banco']").val(id_banco);
        $("#modal-crudbanco input[name='nome']").val(nome);
        $("#modal-crudbanco input[name='cod_banco']").val(codigo);

        $('#modal-crudbanco').modal('toggle');

    });

    $("#table-categoria").on('click', '.edit', function (event) {

        var row = $(this).attr('row');

        var id_categoria = $("tr[linerow='" + row + "']").find("td[label='id_categoria']").text();
        var nome = $("tr[linerow='" + row + "']").find("td[label='nome']").text();

        $("#modal-crudcategoria input[name='id_categoria']").val(id_categoria);
        $("#modal-crudcategoria input[name='nome']").val(nome);

        $('#modal-crudcategoria').modal('toggle');

    });

    $("#table-conta").on('click', '.edit', function (event) {

        var row = $(this).attr('row');

        var id_conta = $("tr[linerow='" + row + "']").find("td[label='id_conta']").text();
        var descricao = $("tr[linerow='" + row + "']").find("td[label='descricao']").text();
        var tipo = $("tr[linerow='" + row + "']").find("td[label='tipo']").text();
        var banco = $("tr[linerow='" + row + "']").find("td[label='id_banco']").text();
        var agencia = $("tr[linerow='" + row + "']").find("td[label='agencia']").text();
        var conta_corrente = $("tr[linerow='" + row + "']").find("td[label='conta_corrente']").text();

        $("#modal-crudconta input[name='id_conta']").val(id_conta);
        $("#modal-crudconta input[name='descricao']").val(descricao);
        $("#modal-crudconta select[name='tipo']").val(tipo);
        $("#modal-crudconta select[name='id_banco']").val(banco);
        $("#modal-crudconta input[name='agencia']").val(agencia);
        $("#modal-crudconta input[name='conta_corrente']").val(conta_corrente);

        $('#modal-crudconta').modal('toggle');

    });


    $("#table-banco").on('click', '.deletar', function (event) {

        var id = $(this).attr('row');

        deletarBanco(id);

        window.location.href = URL_JS + "/banco";

    });

    $("#table-categoria").on('click', '.deletar', function (event) {

        var id = $(this).attr('row');

        deletarCategoria(id);

        window.location.href = URL_JS + "/categoria";

    });



});


function salvarBanco() {

    var dados = $("#form-crudbanco").serialize();

    $.ajax({
        url: URL_JS + '/banco/salvar',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function (retorno) {

            if (retorno == 'success') {

                alert('Banco cadastrado com sucesso!');
                $('#modal-crudbanco').modal('toggle');

            }

        }

    });

}

function salvarCategoria() {

    var dados = $("#form-crudcategoria").serialize();

    $.ajax({
        url: URL_JS + '/categoria/salvar',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function (retorno) {

            if (retorno == 'success') {

                alert('Categoria cadastrada com sucesso!');
                $('#modal-crudcategoria').modal('toggle');

            }

        }

    });

}

function salvarConta() {

    var dados = $("#form-crudconta").serialize();

    $.ajax({
        url: URL_JS + '/conta/salvar',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function (retorno) {

            if (retorno == 'success') {

                alert('Conta cadastrada com sucesso!');
                $('#modal-crudconta').modal('toggle');

            }

        }

    });

}


function salvarFluxo() {

    var dados = $("#form-crudfluxo").serialize();

    $.ajax({
        url: URL_JS + '/fluxo/salvar',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function (retorno) {

            if (retorno == 'success') {

                alert('Fluxo financeiro registrado com sucesso!');
                $('#modal-crudfluxo').modal('toggle');

            }

        }

    });

}

function deletarBanco(id) {

    $.ajax({
        url: URL_JS + '/banco/deletarBanco',
        type: 'POST',
        data: {id_banco: id},
        dataType: 'json',
        success: function (retorno) {

            if (retorno) {

                alert('Banco deletado com sucesso!');
            
            }

        }

    });

}

function deletarCategoria(id) {

    $.ajax({
        url: URL_JS + '/categoria/deletarCategoria',
        type: 'POST',
        data: {id_categoria: id},
        dataType: 'json',
        success: function (retorno) {

            if (retorno) {

                alert('Categoria deletada com sucesso!');
            
            }

        }

    });

}


function modalShow(modalName, formName) {

    $('#' + formName).each(function () {
        this.reset();
    });

    $('#' + modalName).modal('toggle');

}