<?php if (!defined('DIR')) exit; ?>

<div class="paginas">

    <div id="alerts">

        <div id="user-create" class="success">
            <label>Usuário criado com sucesso! <a href="<?php echo URL ?>">Entrar!</a></label>
        </div>

        <div id="user-not-create" class="danger">
            <label>Usuário existente, por favor insira um login não cadastrado!</label>
        </div>

    </div>

    <div id="espaco-cadastro" class="forms-default">

        <form id="form-cadastro" action="" method="POST">

            <div class="separacao-campos">
                <label for="login">Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>

            <div class="separacao-campos">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control">
            </div>

            <div class="separacao-campos">
                <label for="login">Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>

            <div class="separacao-campos">
                <label id="btn-form-cadastro" class="btn btn-success">Cadastrar</label>
                <a href="<?php echo URL ?>">Voltar</a>
            </div>

        </form>

    </div>

</div>