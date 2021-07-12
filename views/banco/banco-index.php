<?php

require_once DIR . '/views/_includes/menu.php';
?>

<div class="pag-index col-md-10">


    <div id="btns-banco" class="btn-default">

        <button onclick="modalShow('modal-crudbanco','form-crudbanco')" class="btn btn-success">Adicionar</button>
        <button class="btn"><a href="<?php echo URL ?>/controlpanel">Voltar</a></button>

    </div>

    <table id="table-banco" class="table table-striped table-bordered table-default">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Código</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $dado) : ?>
                <tr linerow="<?php echo 'id_banco_'.$dado['id_banco'] ?>">
                    <td label="id_banco"><?php echo $dado['id_banco'] ?></td>
                    <td label="nome"><?php echo $dado['name'] ?></td>
                    <td label="cod_banco"><?php echo $dado['cod_banco'] ?></td>
                    <td>
                        <i row="<?php echo 'id_banco_'.$dado['id_banco'] ?>" class="edit far fa-edit"></i>
                        <i row="<?php echo $dado['id_banco'] ?>" class="deletar fas fa-trash-alt"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="modal-crudbanco" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro Bancos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-crudbanco" class="row">
                        <div class="col-md-6">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="nome">
                            <input hidden class="form-control" type="text" name="id_banco">
                        </div>
                        <div class="col-md-6">
                            <label>Código Banco</label>
                            <input class="form-control" type="text" name="cod_banco">
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