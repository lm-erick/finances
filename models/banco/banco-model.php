<?php

class bancoModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarBanco($post)
    {

        $nome = $post['nome'];
        $codBanco = $post['cod_banco'];

        $sql = $this->db->prepare("INSERT INTO bancos (name, cod_banco) VALUES (:nome, :codbanco)");

        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':codbanco', $codBanco);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateBanco($post)
    {

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

        $sql = $this->db->prepare("SELECT * FROM bancos");

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
