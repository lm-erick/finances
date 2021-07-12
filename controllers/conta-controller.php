<?php
class contaController extends Utils
{
    
    public function index()
    {
        // Título da página
        $this->title = 'Cadastro Contas';

        $modelo = $this->load_model('conta/conta-model');

        $modeloBanco = $this->load_model('banco/banco-model');

        $dados = $modelo->listarContas();

        $dadosBanco = $modeloBanco->listarBancos();

        // /views/home/home-view.php
        require DIR . '/views/conta/conta-index.php';
    }

    public function salvar()
    {
        $modelo = $this->load_model('conta/conta-model');

        if (empty($_POST['id_conta'])) {

            $save = $modelo->salvarConta($_POST);
        } else {

            $save = $modelo->updateConta($_POST);
        }

        $response = '';

        if ($save) {
            $response = 'success';
        }

        echo json_encode($response);
    }

    public function listarContas()
    {
        $modelo = $this->load_model('conta/conta-model');

        $result = $modelo->listarContas();

        echo json_encode($result);
    }

}
