<?php
namespace app\controllers\devolucao;
use app\controllers\Controller;
use app\models\devolucao\AlocacaoRncModel;

class AlocacaoController {
    public function index(){
        Controller::view("devolucao/coletor/coletorAlocacao");
    }
    public function rnc(){
        Controller::view("devolucao/coletor/alocacaoProduto");
    }

    public function store($request){
        $model = new AlocacaoRncModel($request->rnc);
        $rnc = $model->buscarRnc();
        if($rnc){
            Controller::view("devolucao/coletor/consultaCodigoRnc", [
                "rnc" => $rnc
            ]);
        } else {
            Controller::view("devolucao/coletor/alocacaoProduto", [
                "msg" => "RNC não encontrada "
            ]);
        }
    }
}