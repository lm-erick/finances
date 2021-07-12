<?php if (!defined('DIR')) exit; ?>

<div class="paginas">
	<div id="espaco-login" class="forms-default">
		<form id="form-login" >

			<div class="separacao-campos">
				<label for="login">Login</label>
				<input type="text" name="login" class="form-control">
			</div>

			<div class="separacao-campos">
				<label for="login">Senha</label>
				<input type="password" name="senha" class="form-control">
			</div>

			<div class="separacao-campos">
				<label id="btn-login" class="btn btn-success">Acessar</label>
				<a href="<?php echo URL ?>/user/cadastrar">Cadastrar-se</a>
			</div>

		</form>
	</div>
</div>