<?php

require_once DIR . '/views/_includes/menu.php';
?>

<div class="pag-index col-md-10">


    <div id="btns-banco" class="btn-default">

        <button onclick="modalShow('modal-crudfluxo','form-crudfluxo')" class="btn btn-success">Adicionar</button>
        <button class="btn"><a href="<?php echo URL ?>/controlpanel">Voltar</a></button>

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
                <th scope="col">Opções</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $dado) : ?>
                <tr linerow="<?php echo 'id_fluxo_' . $dado['id_fluxo'] ?>">
                    <td label="id_fluxo"><?php echo $dado['id_fluxo'] ?></td>
                    <td label="id_conta"><?php echo $dado['id_conta'] ?></td>
                    <td label="descricao"><?php echo $dado['descricao'] ?></td>
                    <td label="status"><?php echo $dado['status'] ?></td>
                    <td label="tipo"><?php echo $dado['tipo'] ?></td>
                    <td label="id_categoria"><?php echo $dado['id_categoria'] ?></td>
                    <td label="data_vencimento"><?php echo $dado['data_vencimento'] ?></td>
                    <td>
                        <i row="<?php echo 'id_fluxo_' . $dado['id_fluxo'] ?>" class="edit far fa-edit"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
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
                        </div>

                        <div class="col-md-6">
                            <label>Status</label>
                            <select class="form-control" type="text" name="tipo">
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
                            <input class="form-control" type="number" name="valor">
                        </div>

                        <div class="col-md-6">
                            <label>Conta</label>
                            <select class="form-control" type="text" name="id_conta">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Categoria</label>
                            <select class="form-control" type="text" name="id_categoria">
                                <option value=""></option>
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