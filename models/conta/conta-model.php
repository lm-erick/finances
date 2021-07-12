<?php

class contaModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarConta($post)
    {

        $saldo = $post['saldo'];
        $id_banco = $post['id_banco'];
        $descricao = $post['descricao'];
        $tipo = $post['tipo'];
        $agencia = $post['agencia'];
        $conta_corrente = $post['conta_corrente'];

        $sql = $this->db->prepare("INSERT INTO contas (saldo, id_banco, descricao, tipo, agencia, conta_corrente) 
        VALUES (:saldo, :id_banco, :descricao, :tipo, :agencia, :conta_corrente)");

        $sql->bindParam(':saldo', $saldo);
        $sql->bindParam(':id_banco', $id_banco);
        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':agencia', $agencia);
        $sql->bindParam(':conta_corrente', $conta_corrente);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateConta($post)
    {

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

        $sql = $this->db->prepare("SELECT * FROM  contas");

        try {

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            return false;
        }
    }

}
