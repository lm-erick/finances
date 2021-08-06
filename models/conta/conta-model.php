<?php

class contaModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarConta($post)
    {

        if($this->killPost($post)) return;

        $saldo = $post['saldo'];
        $id_banco = $post['id_banco'];
        $descricao = $post['descricao'];
        $tipo = $post['tipo'];
        $agencia = $post['agencia'];
        $conta_corrente = $post['conta_corrente'];
        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("INSERT INTO contas (saldo, id_banco, descricao, tipo, agencia, conta_corrente, id_user) 
        VALUES (:saldo, :id_banco, :descricao, :tipo, :agencia, :conta_corrente, :id_user)");

        $sql->bindParam(':saldo', $saldo);
        $sql->bindParam(':id_banco', $id_banco);
        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':agencia', $agencia);
        $sql->bindParam(':conta_corrente', $conta_corrente);
        $sql->bindParam(':id_user', $id_user);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateConta($post)
    {

        if($this->killPost($post)) return;

        $id_banco = $post['id_banco'];
        $descricao = $post['descricao'];
        $tipo = $post['tipo'];
        $agencia = $post['agencia'];
        $conta_corrente = $post['conta_corrente'];
        $id_conta = $post['id_conta'];

        $sql = $this->db->prepare("UPDATE contas SET id_banco = :id_banco, descricao = :descricao, tipo = :tipo, agencia = :agencia, conta_corrente = :conta_corrente WHERE id_conta = :id_conta");

        $sql->bindParam(':id_banco', $id_banco);
        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':agencia', $agencia);
        $sql->bindParam(':conta_corrente', $conta_corrente);
        $sql->bindParam(':id_conta', $id_conta);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function listarContas()
    {
        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("SELECT * FROM contas WHERE id_user = :id_user");

        $sql->bindParam(':id_user', $id_user);

        try {

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            return false;
        }
    }

}
