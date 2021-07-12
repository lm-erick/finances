<?php

class HomeController 
{

	public function index()
	{
		// Título da página
		$this->title = 'Test';

		// Parametros da função
		$parametros = (func_num_args() >= 1) ? func_get_arg(0) : array();

		// /views/_includes/header.php
		require DIR . '/views/_includes/header.php';

		// /views/home/home-view.php
		require DIR . '/views/home/home-index.php';

		// /views/_includes/footer.php
		require DIR . '/views/_includes/footer.php';

	} 

} 