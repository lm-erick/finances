<?php

class Router
{

	private $controlador;
	public $acao;
	private $parametros;

	public function __construct()
	{

		$this->get_url_data();

		if (!$this->controlador) {

			require_once DIR . '/controllers/home-controller.php';
			$this->controlador = new HomeController();
			$this->controlador->index();
			return;
		} else {

			if (!file_exists(DIR . '/controllers/' . $this->controlador . '.php')) {
				require_once DIR . '/views/_includes/404.php';
				return;
			}

			require_once DIR . '/controllers/' . $this->controlador . '.php';

			$this->controlador = preg_replace('/[^a-zA-Z0-9]/i', '', $this->controlador);

			$this->controlador = new $this->controlador($this->parametros);

			$this->acao = preg_replace('/[^a-zA-Z0-9_-]/i', '', $this->acao);

			if (method_exists($this->controlador, $this->acao)) {

				$this->controlador->{$this->acao}($this->parametros);
			} else {

				$this->controlador->index();
			}

			return;
		}
	}

	public function get_url_data()
	{

		if (isset($_GET['path'])) {

			$path = $_GET['path'];

			$path = rtrim($path, '/');
			$path = filter_var($path, FILTER_SANITIZE_URL);

			$path = explode('/', $path);

			$this->controlador  = $this->chk_array($path, 0);
			$this->controlador .= '-controller';
			$this->acao         = $this->chk_array($path, 1);

			if ($this->chk_array($path, 2)) {
				unset($path[0]);
				unset($path[1]);

				$this->parametros = array_values($path);
			}
		}
	}

	function chk_array($array, $key)
	{

		if (isset($array[$key]) && !empty($array[$key])) {

			return $array[$key];
		}

		return null;
	}
}
