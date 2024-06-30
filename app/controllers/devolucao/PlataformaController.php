<?php
namespace app\controllers\devolucao;
use app\controllers\Controller;
use app\models\devolucao\PlataformaModel;

class PlataformaController{
    public function index(){
        return Controller::view("devolucao/plataforma");
    }

    public function store($params){
        $plataforma = new PlataformaModel($params->id, $params->linkFornecedor, $params->nomeFornecedor, $params->usuarioPlataforma, $params->senhaPlataforma);

        if ($plataforma->cadastrarPlataforma()){
            header("location:https://www.youtube.com/");
        }
    }

}