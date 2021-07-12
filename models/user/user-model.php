<?php

class userModel extends Utils
{
	public function __construct()
	{
		$this->db = $this->conectdb();
	}


	public function logIn($post)
	{

		$login = $post['login'];
		$senha = $post['senha'];

		$sql = $this->db->prepare("SELECT * FROM users WHERE login = :login AND senha = :senha LIMIT 1");

		$sql->bindParam(':login', $login);
		$sql->bindParam(':senha', $senha);
		$sql->execute();

		$result = $sql->fetch(PDO::FETCH_ASSOC);

		if (empty($result)) return false;

		return  $result;
	}

	public function checkUser($login)
	{

		$sql = "SELECT * FROM users WHERE login = '$login' LIMIT 1";

		$query = $this->db->query($sql);

		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		$check = true;

		if (sizeof($result) > 0) $check = false;

		return $check;
	}

	public function salvarUser($post)
	{

		$nome = $post['nome'];
		$login = $post['login'];
		$senha = $post['senha'];

		$sql = "INSERT INTO users (name, login, senha) VALUES ('$nome', '$login', '$senha')";

		$query = $this->db->query($sql);

		$check = false;

		if ($query) $check = true;

		return $check;
	}
}
