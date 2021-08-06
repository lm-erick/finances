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
        $data_pagamento = $post['data_pagamento'];
        $fluxostatus = $post['status'];
        $valor = $post['valor'];
        $id_conta = $post['id_conta'];
        $id_categoria = $post['id_categoria'];
        $tipo = $post['tipo'];
        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("INSERT INTO fluxos (descricao, data_vencimento, data_pagamento, fluxostatus, valor, id_conta, id_categoria, tipo, id_user) 
                                    VALUES (:descricao, :data_vencimento, :data_pagamento, :fluxostatus, :valor, :id_conta, :id_categoria, :tipo, :id_user)");

        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':data_vencimento', $data_vencimento);
        $sql->bindParam(':data_pagamento', $data_pagamento);
        $sql->bindParam(':fluxostatus', $fluxostatus);
        $sql->bindParam(':valor', $valor);  
        $sql->bindParam(':id_conta', $id_conta);
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':id_user', $id_user);

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
        $fluxostatus = $post['status'];
        $valor = $post['valor'];
        $id_conta = $post['id_conta'];
        $id_categoria = $post['id_categoria'];
        $tipo = $post['tipo'];
        $data_pagamento = $post['data_pagamento'];

        $sql = $this->db->prepare("UPDATE fluxos SET descricao = :descricao, data_vencimento = :data_vencimento, fluxostatus = :fluxostatus, valor = :valor, id_conta = :id_conta, id_categoria = :id_categoria, tipo = :tipo, data_pagamento = :data_pagamento WHERE id_fluxo = :id_fluxo");

        $sql->bindParam(':descricao', $descricao);
        $sql->bindParam(':data_vencimento', $data_vencimento);
        $sql->bindParam(':data_pagamento', $data_pagamento);
        $sql->bindParam(':fluxostatus', $fluxostatus);
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

        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("SELECT * FROM  fluxos WHERE id_user = :id_user ");

        $sql->bindParam(':id_user', $id_user);

        try {

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            return false;
        }
    }

    public function filtrarFluxos( $post )
    {

        $id_user = $_SESSION['userId'];
        $operacao = $post['operacao'];
        $tipo = $post['tipo'];
        $fluxostatus = $post['status'];
        $id_conta = $post['id_conta'];
        $id_categoria = $post['id_categoria'];
        $tipo_data = $post['tipo_data'];
        $data_de = $post['data_de'];
        $data_ate = $post['data_ate'];

        $query = "";

        if($operacao == "calcular") $query = "SELECT tipo, SUM(valor) AS valor_total ";

        if($operacao == "filtrar") $query = "SELECT * ";

        $query .= "FROM fluxos WHERE id_user = $id_user ";

        if(!empty($tipo) && $tipo != "ambos" ) $query .= "AND tipo = '$tipo' ";

        if(!empty($fluxostatus) && $fluxostatus != "ambos") $query .= "AND fluxostatus = '$fluxostatus' ";

        if(!empty($id_conta)) $query .= "AND id_conta = $id_conta ";

        if(!empty($id_categoria)) $query .= "AND id_categoria = $id_categoria ";

        if( $tipo_data == 'vencimento' ) $query .= "AND data_vencimento >= '$data_de' AND data_vencimento <= '$data_ate' ";
        
        if( $tipo_data == 'pagamento' ) $query .= "AND data_pagamento >= '$data_de' AND data_pagamento <= '$data_ate' ";

        $query .= " GROUP BY tipo";

        try {

            $sql = $this->db->query($query);

		    return $sql->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {

            return false;
        }
    }
    
}
