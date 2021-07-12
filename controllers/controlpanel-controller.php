<?php
class controlPanelController extends Utils
{

	public function index()
	{

		// Título da página
		$this->title = 'Dashboard';

		// /views/home/home-view.php
		require DIR . '/views/home/home-dashboard.php';
	}



}
