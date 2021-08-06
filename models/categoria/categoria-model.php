<?php

class categoriaModel extends Utils
{

    public function __construct()
    {
        $this->db = $this->conectdb();
    }

    public function salvarCategoria($post)
    {
        if($this->killPost($post)) return;

        $nome = $post['nome'];
        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("INSERT INTO categorias (nome, id_user) VALUES (:nome, :id_user)");

        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':id_user', $id_user);

        try {

            $sql->execute();
            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updateCategoria($post)
    {

        if($this->killPost($post)) return;
        
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

        $id_user = $_SESSION['userId'];

        $sql = $this->db->prepare("SELECT * FROM categorias WHERE id_user = :id_user");

        $sql->bindParam(':id_user', $id_user);


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