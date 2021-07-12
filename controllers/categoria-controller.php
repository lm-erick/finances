<?php
class categoriaController extends Utils
{
    
    public function index()
    {
        // Título da página
        $this->title = 'Cadastro Categoriass';

        $modelo = $this->load_model('categoria/categoria-model');

        $dados = $modelo->listarCategorias();

        // /views/home/home-view.php
        require DIR . '/views/categoria/categoria-index.php';
    }

    public function salvar()
    {
        $modelo = $this->load_model('categoria/categoria-model');

        if (empty($_POST['id_categoria'])) {

            $save = $modelo->salvarCategoria($_POST);
        } else {

            $save = $modelo->updateCategoria($_POST);
        }

        $response = '';

        if ($save) {
            $response = 'success';
        }

        echo json_encode($response);
    }

    public function listarCategorias()
    {
        $modelo = $this->load_model('categoria/categoria-model');

        $result = $modelo->listarCategorias();

        echo json_encode($result);
    }

    public function deletarCategoria()
    {
        $modelo = $this->load_model('categoria/categoria-model');

        $result = $modelo->deleteCategoria($_POST['id_categoria']);

        echo json_encode($result);
    }
}
