<?php

require_once DIR . '/views/_includes/menu.php';
?>

<div class="pag-index col-md-10">


    <div id="btns-banco" class="btn-default">

        <button onclick="modalShow('modal-crudconta','form-crudconta')" class="btn btn-success">Adicionar</button>
        <button class="btn"><a href="<?php echo URL ?>/controlpanel">Voltar</a></button>

    </div>

    <table id="table-conta" class="table table-striped table-bordered table-default">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descricao</th>
                <th scope="col">Cod Banco</th>
                <th scope="col">Tipo</th>
                <th scope="col">Agencia</th>
                <th scope="col">Conta Corrente</th>
                <th scope="col">Opções</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $dado) : ?>
                <tr linerow="<?php echo 'id_conta_' . $dado['id_conta'] ?>">
                    <td label="id_conta"><?php echo $dado['id_conta'] ?></td>
                    <td label="descricao"><?php echo $dado['descricao'] ?></td>
                    <td label="id_banco"><?php echo $dado['id_banco'] ?></td>
                    <td label="tipo"><?php echo $dado['tipo'] ?></td>
                    <td label="agencia"><?php echo $dado['agencia'] ?></td>
                    <td label="conta_corrente"><?php echo $dado['conta_corrente'] ?></td>
                    <td>
                        <i row="<?php echo 'id_conta_'. $dado['id_conta'] ?>" class="edit far fa-edit"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="modal-crudconta" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro Contas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-crudconta" class="row">

                        <div class="col-md-6">
                            <label>Descrição</label>
                            <input class="form-control" type="text" name="descricao">
                            <input hidden class="form-control" type="text" name="id_conta">
                        </div>

                        <div class="col-md-6">
                            <label>Saldo</label>
                            <input class="form-control" id="campo_saldo" type="number" name="saldo">
                        </div>

                        <div class="col-md-6">
                            <label>Tipo</label>
                            <select class="form-control" type="text" name="tipo">
                                <option value=""></option>
                                <option value="contacorrente">Conta Corrente</option>
                                <option value="poupanca">Poupança</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="investimento">Investimento</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Banco</label>
                            <select class="form-control" id="select_banco" type="text" name="id_banco">
                                <option value=""></option>
                                <?php foreach ($dadosBanco as $banco) : ?>
                                    <option value="<? echo $banco['id_banco'] ?>"><? echo $banco['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Agência</label>
                            <input class="form-control" type="text" name="agencia">
                        </div>

                        <div class="col-md-6">
                            <label>Nº Conta</label>
                            <input class="form-control" type="text" name="conta_corrente">
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