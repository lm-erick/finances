<?php

class bancoModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarBanco($post)
    {

        if($this->killPost($post)) return;

        $id_user = $_SESSION['userId'];
        $nome = $post['nome'];
        $codBanco = $post['cod_banco'];

        $sql = $this->db->prepare("INSERT INTO bancos (name, cod_banco, id_user) VALUES (:nome, :codbanco, :id_user)");

        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':codbanco', $codBanco);
        $sql->bindParam(':id_user', $id_user);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateBanco($post)
    {

        if($this->killPost($post)) return;

        $id_banco = $post['id_banco'];
        $nome = $post['nome'];
        $codBanco = $post['cod_banco'];

        $sql = $this->db->prepare("UPDATE bancos SET name=:nome, cod_banco=:codbanco WHERE id_banco = :id_banco");

        $sql->bindParam(':id_banco', $id_banco);
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':codbanco', $codBanco);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function listarBancos()
    {

        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("SELECT * FROM bancos WHERE id_user = :id_user");

        $sql->bindParam(':id_user', $id_user);

        try {

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            return false;
        }
    }

    public function deleteBanco($id_banco)
    {
    
        $sql = $this->db->prepare("DELETE FROM bancos WHERE id_banco = :id_banco");

        $sql->bindParam(':id_banco', $id_banco);
        
        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }

    }
}
