<?php

class categoriaModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarCategoria($post)
    {

        $nome = $post['nome'];

        $sql = $this->db->prepare("INSERT INTO categorias (nome) VALUES (:nome)");

        $sql->bindParam(':nome', $nome);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateCategoria($post)
    {

        $id_categoria = $post['id_categoria'];
        $nome = $post['nome'];

        $sql = $this->db->prepare("UPDATE categorias SET nome = :nome WHERE id_categoria = :id_categoria");

        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->bindParam(':nome', $nome);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function listarCategorias()
    {

        $sql = $this->db->prepare("SELECT * FROM categorias");

        try {

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            return false;
        }
    }

    public function deleteCategoria($id_categoria)
    {
    
        $sql = $this->db->prepare("DELETE FROM categorias WHERE id_categoria = :id_categoria");

        $sql->bindParam(':id_categoria', $id_categoria);
        
        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }

    }

}