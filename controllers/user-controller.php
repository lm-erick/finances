<?php


class userController extends Utils
{

	public function cadastrar()
	{

		// Título da página
		$this->title = 'Cadastrado de Usuário';

		// /views/_includes/header.php
		require DIR . '/views/_includes/header.php';

		// /views/home/home-view.php
		require DIR . '/views/cadastro/cadastro.php';
	}

	public function salvar()
	{

		$modelo = $this->load_model('user/user-model');

		$check = $modelo->checkUser($_POST['login']);

		$insert = 'error';

		if ($check) {

			if ($modelo->salvarUser($_POST)) {

				$insert = 'success';
			}
		}

		echo json_encode($insert);
	}

	public function logar()
	{
		$modelo = $this->load_model('user/user-model');

		$user = $modelo->logIn($_POST);

		if (!$user) {

			echo json_encode('error');
			return;
		} else {

			if (!isset($_SESSION)) session_start();

			$_SESSION['userId'] = $user['id_user'];
			$_SESSION['userName'] = $user['name'];

			echo json_encode($user);
		}
	}

	public function logout()
	{
		session_destroy();

		header("Location: ".URL);
		exit;
	}
}
