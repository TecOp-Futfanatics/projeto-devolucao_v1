<?php

namespace app\controllers\devolucao;

use app\models\devolucao\VeficacaoModel;
use app\controllers\Controller;
use app\middleware\Auth;

class LoginAlocacaoController
{
    public function store($params)
    {
        if(isset($params->login) || isset($params->senha)){
            $verificacao = new VeficacaoModel(null, $params->login, $params->senha);
            $stmt = $verificacao->verificar();
            if($stmt){
                Auth::session($stmt);
                Controller::view('devolucao/coletor/alocacaoProduto');
            }else{
                $msg = "Usuário ou senha inválidos";
                Controller::view('devolucao/coletor/coletorAlocacao', ['msg' => $msg]);
            }
        }
    }
}
