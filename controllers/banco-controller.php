<?php
class bancoController extends Utils
{
    public function index()
    {
        // Título da página
        $this->title = 'Cadastro Bancos';

        $modelo = $this->load_model('banco/banco-model');

        $dados = $modelo->listarBancos();

        // /views/home/home-view.php
        require DIR . '/views/banco/banco-index.php';
    }

    public function salvar()
    {
        $modelo = $this->load_model('banco/banco-model');

        if (empty($_POST['id_banco'])) {

            $save = $modelo->salvarBanco($_POST);
        } else {

            $save = $modelo->updateBanco($_POST);
        }

        $response = '';

        if ($save) {
            $response = 'success';
        }

        echo json_encode($response);
    }

    public function listarBancos()
    {
        $modelo = $this->load_model('banco/banco-model');

        $result = $modelo->listarBancos();

        echo json_encode($result);
    }

    public function deletarBanco()
    {
        $modelo = $this->load_model('banco/banco-model');

        $result = $modelo->deleteBanco($_POST['id_banco']);

        echo json_encode($result);
    }

}
