<?php

require_once DIR . '/views/_includes/menu.php';
?>

<div class="pag-index col-md-10">


    <div id="btns-banco" class="btn-default">

        <button onclick="modalShow('modal-crudfluxo','form-crudfluxo')" class="btn btn-success">Adicionar</button>
        <button class="btn"><a href="<?php echo URL ?>/controlpanel">Voltar</a></button>

    </div>

    <div id="espaco-filtro-fluxo">
        <form id="filtros-fluxo" class="row">

            <input hidden class="form-control" type="text" name="operacao">

            <div class="col-md-3">
                <label>Tipo</label>
                <select class="form-control" type="text" name="tipo">
                    <option value="ambos">Selecione</option>
                    <option value="receita">Receita</option>
                    <option value="despesa">Despesa</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Tipo de data</label>
                <select class="form-control" type="text" name="tipo_data">
                    <option value="vencimento">Vencimento</option>
                    <option value="pagamento">Pagamento</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Data De</label>
                <input class="form-control" required type="date" name="data_de">
            </div>

            <div class="col-md-3">
                <label>Data Até</label>
                <input class="form-control" required type="date" name="data_ate">
            </div>

            <div class="col-md-3">
                <label>Status</label>
                <select class="form-control" type="text" name="status">
                    <option value="ambos">Selecione</option>
                    <option value="pendente">Pendente</option>
                    <option value="pago">Pago</option>
                </select>
            </div>

            <div class="col-md-3">
                <label>Conta</label>
                <select class="form-control" required type="text" name="id_conta">
                    <option value="">Selecione</option>
                    <?php foreach ($dadosConta as $conta) : ?>
                        <option value="<? echo $conta['id_conta'] ?>"><? echo $conta['descricao'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <label>Categoria</label>
                <select class="form-control" type="text" name="id_categoria">
                    <option value="">Selecione</option>
                    <?php foreach ($dadosCategorias as $categoria) : ?>
                        <option value="<? echo $categoria['id_categoria'] ?>"><? echo $categoria['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </form>

        <button type="button" class="btn btn-primary">Calcular</button>
        <button type="button" class="btn btn-success">Filtrar</button>
    </div>

    <div id="display">

        <div class="row">
            <div class="col-md-4">
                <label>Total de receitas no período</label>
                <input class="form-control" type="text" name="receitas" class="money2" disabled>
            </div>
            <div class="col-md-4">
                <label>Total de despesas no período</label>
                <input class="form-control" type="text" name="despesas" class="money2" disabled>
            </div>
            <div class="col-md-4">
                <label>Balanço do período</label>
                <input class="form-control" type="text" name="balanço" class="money2" disabled>
            </div>
        </div>

    </div>

    <table id="table-fluxo" class="table table-striped table-bordered table-default">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Conta</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Tipo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Data Vencimento</th>
                <th scope="col">Data Pagamento</th>
                <th scope="col">Valor</th>
                <th scope="col">Opções</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div id="modal-crudfluxo" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro Contas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-crudfluxo" class="row">

                        <div class="col-md-6">
                            <label>Descrição</label>
                            <input class="form-control" type="text" name="descricao">
                            <input hidden class="form-control" type="text" name="id_fluxo">
                            <input hidden class="form-control" type="text" name="id_user" value="<?php echo $_SESSION['userId'] ?>">
                        </div>

                        <div class="col-md-6">
                            <label>Status</label>
                            <select class="form-control" type="text" name="status">
                                <option value="pendente">Pendente</option>
                                <option value="pago">Pago</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Data Vencimento</label>
                            <input class="form-control" type="date" name="data_vencimento">
                        </div>

                        <div class="col-md-6">
                            <label>Data Pagamento</label>
                            <input class="form-control" type="date" name="data_pagamento">
                        </div>

                        <div class="col-md-6">
                            <label>Valor</label>
                            <input class="form-control" type="text" name="valor">
                        </div>

                        <div class="col-md-6">
                            <label>Conta</label>
                            <select class="form-control" required type="text" name="id_conta">
                                <option value="">Selecione</option>
                                <?php foreach ($dadosConta as $conta) : ?>
                                    <option value="<? echo $conta['id_conta'] ?>"><? echo $conta['descricao'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Categoria</label>
                            <select class="form-control" type="text" name="id_categoria">
                                <option value="">Selecione</option>
                                <?php foreach ($dadosCategorias as $categoria) : ?>
                                    <option value="<? echo $categoria['id_categoria'] ?>"><? echo $categoria['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Tipo</label>
                            <select class="form-control" type="text" name="tipo">
                                <option value="receita">Receita</option>
                                <option value="despesa">Despesa</option>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</div>