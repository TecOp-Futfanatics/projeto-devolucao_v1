<?php
namespace app\controllers\devolucao;
use app\controllers\Controller;
use app\models\devolucao\AlocacaoRncModel;

class AlocacaoController {

    private $contador;

    public function __construct(){
        $this->contador = 0;
    }

    public function index(){
        Controller::view("devolucao/coletor/coletorAlocacao");
    }
    public function rnc(){
        Controller::view("devolucao/coletor/alocacaoProduto");
    }

    public function store($request){
        $model = new AlocacaoRncModel($request->rnc, "");
        $rnc = $model->buscarRnc();
        if($rnc){
            Controller::view("devolucao/coletor/consultaCodigoRnc", [
                "rnc" => $rnc
            ]);
        } else {
            Controller::view("devolucao/coletor/alocacaoProduto", [
                "msg" => "RNC não encontrado"
            ]);
        }
    }

    public function verificacao($params){
        $model = new AlocacaoRncModel($params->rnc, "");
        $quantProduto = $model->CountProduto();

        Controller::view("devolucao/coletor/verificacaoProduto", [
            "rnc" => $params->rnc,
            "quantProduto" => $quantProduto,
            "contador"  => $this->contador
        ]);
    }

    public function verificacaoCodigo($params){
        $model = new AlocacaoRncModel($params->rnc, "");
        $quantProduto = $model->CountProduto();
        $model = new AlocacaoRncModel($params->rnc, $params->codigo);
        $resultado = $model->verificarCodigoProduto();
        if($resultado){
            Controller::view("devolucao/coletor/verificacaoProduto", [
               "success" => "Código pertence a esta RNC",
               "rnc" => $params->rnc,
               "contador" => $this->contador+=1,
               "quantProduto" => $quantProduto,
            ]);
        } else {
            Controller::view("devolucao/coletor/verificacaoProduto", [
                "error" => "Código não pertence a esta RNC",
                "rnc" => $params->rnc,
                "contador" => $this->contador,
                "quantProduto" => $quantProduto
            ]);
        }
    }
}