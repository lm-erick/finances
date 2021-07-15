<?php

class fluxoModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarFluxo($post)
    {

        $descricao = $post['descricao'];
        $data_vencimento = $post['data_vencimento'];
        $status = $post['status'];
        $valor = $post['valor'];
        $id_conta = $post['id_conta'];
        $id_categoria = $post['id_categoria'];
        $tipo = $post['tipo'];

        $sql = $this->db->prepare("INSERT INTO fluxos (descricao, data_vencimento, status, valor, id_conta, id_categoria, tipo) 
                                    VALUES (:descricao, :data_vencimento, :status, :valor  :id_conta, :id_categoria, :tipo)");

        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':data_vencimento', $data_vencimento);
        $sql->bindParam(':status', $status);
        $sql->bindParam(':valor', $valor);  
        $sql->bindParam(':id_conta', $id_conta);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->bindParam(':tipo', $tipo);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateFluxo($post)
    {
        $id_fluxo = $post['id_fluxo'];
        $descricao = $post['descricao'];
        $data_vencimento = $post['data_vencimento'];
        $status = $post['status'];
        $valor = $post['valor'];
        $id_conta = $post['id_conta'];
        $id_categoria = $post['id_categoria'];
        $tipo = $post['tipo'];

        $sql = $this->db->prepare("UPDATE fluxos SET descricao = :descricao, data_vencimento = :data_vencimento, status = :status, valor = :valor, id_conta = :id_conta, id_categoria = :id_categoria, tipo = :tipo WHERE id_fluxo = :id_fluxo");

        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':data_vencimento', $data_vencimento);
        $sql->bindParam(':status', $status);
        $sql->bindParam(':valor', $valor);  
        $sql->bindParam(':id_conta', $id_conta);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':id_fluxo', $id_fluxo);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function listarFluxos()
    {

        $sql = $this->db->prepare("SELECT * FROM  fluxos");

        try {

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            return false;
        }
    }

}
