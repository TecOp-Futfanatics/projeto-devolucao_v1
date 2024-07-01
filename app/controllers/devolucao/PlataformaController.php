<?php
namespace app\controllers\devolucao;
use app\controllers\Controller;
use app\models\devolucao\PlataformaModel;

class PlataformaController{
    public function index($params){
        $plataformaModel = new PlataformaModel($params->id, $params->linkFornecedor, $params->nomeFornecedor, $params->usuarioPlataforma, $params->senhaPlataforma);

        $plataformas = $plataformaModel->listarPlataforma();
        return Controller::view("devolucao/plataforma", compact("plataformas"));
        
    }

    public function store($params){
        $plataforma = new PlataformaModel($params->id, $params->linkFornecedor, $params->nomeFornecedor, $params->usuarioPlataforma, $params->senhaPlataforma);

        if ($plataforma->cadastrarPlataforma()){
            header("location:https://www.youtube.com/");
        }
    }

}