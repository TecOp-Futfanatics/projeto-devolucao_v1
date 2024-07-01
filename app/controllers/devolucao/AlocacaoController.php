<?php

namespace app\controllers\devolucao;

use app\controllers\Controller;
use app\models\devolucao\AlocacaoRncModel;

class AlocacaoController
{

    public function index()
    {
        Controller::view("devolucao/coletor/loginColetor");
    }
    public function rnc()
    {
        Controller::view("devolucao/coletor/consultaRnc");
    }

    public function store($request)
    {
        $model = new AlocacaoRncModel($request->rnc);
        $rnc = $model->buscarRnc();
        if ($rnc) {
            Controller::view("devolucao/coletor/consultaCodigoRnc", [
                "rnc" => $rnc
            ]);
        } else {
            Controller::view("devolucao/coletor/consultaRnc", [
                "msg" => "RNC não encontrada "
            ]);
        }
    }

    public function verificacaoView($request)
    {
        $model = new AlocacaoRncModel($request->rnc);
        $rnc = $model->buscarRnc();
        Controller::view("devolucao/coletor/verificacaoCodigo", [
            "rnc" => $rnc
        ]);
    }

    public function verificacao($request)
    {
        $model = new AlocacaoRncModel($request->rnc);
        $rnc = $model->buscarRnc();
        $codigo = $model->consultaCodigoRnc($request->codigo, "");
        
        if ($codigo) {
            Controller::view("devolucao/coletor/verificacaoCodigo", [
                "rnc" => $rnc,
                "sucesso" => "Código encontrado com sucesso!",
                "quantidade" => $codigo[0]['pro_quantidade'],
            ]);
        } else {
            Controller::view("devolucao/coletor/verificacaoCodigo", [
                "msg" => "Código não encontrado",
                "rnc" => $rnc,
                "quantidade" => 0,
            ]);
        }
    }
}
