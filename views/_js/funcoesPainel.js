$(document).ready(function () {

    $('.date').mask('00/00/0000');
    $('.money').mask('000.000.000.000.000,00', { reverse: true });
    $('.money2').mask("#.##0,00", { reverse: true });
   
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

        window.location.href = URL_JS + "/fluxo";

    });

    $("#espaco-filtro-fluxo").on('click', '.btn-primary', function (event) {

        data_de = $("#filtros-fluxo input[name='data_de']").val();
        data_ate = $("#filtros-fluxo input[name='data_ate']").val();

        if ((data_de == '' || data_ate == '') || (data_de > data_ate)) {

            alert('POR FAVOR COLOCAR DATAS VÁLIDAS');

            return;

        }

        calcularFluxos();

    });

    $("#espaco-filtro-fluxo").on('click', '.btn-success', function (event) {

        filtrarFluxos();

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

    $("#table-fluxo").on('click', '.edit', function (event) {

        if ($("#modal-crudfluxo select[name='status']").val() == 'pago') {

            $("input[name='data_pagamento']").prop('disabled', false);

        } else {

            $("input[name='data_pagamento']").prop('disabled', true);

        }

        var row = $(this).attr('row');

        var id_fluxo = $("tr[linerow='" + row + "']").find("td[label='id_fluxo']").text();
        var id_conta = $("tr[linerow='" + row + "']").find("td[label='id_conta']").text();
        var descricao = $("tr[linerow='" + row + "']").find("td[label='descricao']").text();
        var status = $("tr[linerow='" + row + "']").find("td[label='status']").text();
        var tipo = $("tr[linerow='" + row + "']").find("td[label='tipo']").text();
        var id_categoria = $("tr[linerow='" + row + "']").find("td[label='id_categoria']").text();
        var valor = $("tr[linerow='" + row + "']").find("td[label='valor']").text();
        var data_vencimento = $("tr[linerow='" + row + "']").find("td[label='data_vencimento']").text();
        var data_pagamento = $("tr[linerow='" + row + "']").find("td[label='data_pagamento']").text();


        $("#modal-crudfluxo select[name='status']").val(status);
        $("#modal-crudfluxo select[name='id_categoria']").val(id_categoria);
        $("#modal-crudfluxo select[name='tipo']").val(tipo);
        $("#modal-crudfluxo select[name='id_conta']").val(id_conta);

        $("#modal-crudfluxo input[name='descricao']").val(descricao);
        $("#modal-crudfluxo input[name='valor']").val(valor);
        $("#modal-crudfluxo input[name='id_fluxo']").val(id_fluxo);

        $("#modal-crudfluxo input[name='data_vencimento']").val(data_vencimento);
        $("#modal-crudfluxo input[name='data_pagamento']").val(data_pagamento);



        $('#modal-crudfluxo').modal('toggle');

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
        data: { id_banco: id },
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
        data: { id_categoria: id },
        dataType: 'json',
        success: function (retorno) {

            if (retorno) {

                alert('Categoria deletada com sucesso!');

            }

        }

    });

}

function calcularFluxos() {

    $("#filtros-fluxo input[name='operacao']").val("calcular");

    var dados = $("#filtros-fluxo").serialize();

    $.ajax({
        url: URL_JS + '/fluxo/filtrarFluxos',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function (retorno) {

            $.each(retorno, function (index, value) {

                montarDisplay(value.tipo, value.valor_total);

            });

            receitas = parseFloat($("input[name='receitas']").val());
            despesas = parseFloat($("input[name='despesas']").val());

            $("input[name='balanço']").val(receitas - despesas);

        }

    });

}

function montarDisplay(tipo, valor) {

    if (tipo == "receita") $("input[name='receitas']").val(parseFloat(valor));

    if (tipo == "despesa") $("input[name='despesas']").val(parseFloat(valor));

}

function filtrarFluxos() {

    $("#filtros-fluxo input[name='operacao']").val("filtrar");

    var dados = $("#filtros-fluxo").serialize();

    $.ajax({
        url: URL_JS + '/fluxo/filtrarFluxos',
        type: 'POST',
        data: dados,
        dataType: 'json',
        success: function (retorno) {

            $.each(retorno, function (index, value) {

                montarTableFluxos(value);

            });

        }

    });

}

function montarTableFluxos(value) {

    $("#table-fluxo tbody").remove();

    $("#table-fluxo").append("<tbody></tbody>");

    $("#table-fluxo tbody").append(
        '<tr linerow="' + value.id_fluxo + '">' +
        '<td label="id_fluxo">' + value.id_fluxo + '</td>' +
        '<td label="id_conta">' + value.id_conta + '</td>' +
        '<td label="descricao">' + value.descricao + '</td>' +
        '<td label="status">' + value.fluxostatus + '</td>' +
        '<td label="tipo">' + value.tipo + '</td>' +
        '<td label="id_categoria">' + value.id_categoria + '</td>' +
        '<td label="data_vencimento">' + value.data_vencimento + '</td>' +
        '<td label="data_pagamento">' + value.data_pagamento + '</td>' +
        '<td label="valor" class="money2">' + value.valor + '</td>' +
        '<td>' +
        '<i row="id_fluxo_' + value.id_fluxo + '" class="edit far fa-edit"></i>' +
        '</td>' +
        '</tr>'
    );

}

function modalShow(modalName, formName) {

    $('#' + formName).each(function () {
        this.reset();
    });

    $('#' + modalName).modal('toggle');

}