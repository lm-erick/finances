<?php
class fluxoController extends Utils
{

    public function index()
    {

        // Título da página
        $this->title = 'Fluxo Financeiro';

        $modelo = $this->load_model('fluxo/fluxo-model');

        $dados = $modelo->listarFluxos();

        // /views/home/home-view.php
        require DIR . '/views/fluxofinanceiro/fluxo-index.php';
    }

    public function salvar()
    {
        $modelo = $this->load_model('fluxo/fluxo-model');

        if (empty($_POST['id_fluxo'])) {

            $save = $modelo->salvarFluxo($_POST);
        } else {

            $save = $modelo->updateFluxo($_POST);
        }

        $response = '';

        if ($save) {
            $response = 'success';
        }

        echo json_encode($response);
    }

    public function listarFluxos()
    {
        $modelo = $this->load_model('fluxo/fluxo-model');

        $result = $modelo->listarFluxos();

        echo json_encode($result);
    }
}
