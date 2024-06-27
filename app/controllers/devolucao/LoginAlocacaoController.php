<?php 
namespace app\controllers\devolucao;
use app\models\devolucao\VeficacaoModel;
use app\controllers\Controller;
use app\middleware\Auth;

class LoginAlocacaoController{
    public function store($request){

        if(empty($request->login) || empty($request->senha)){
            $msg = "Usuário ou senha inválidos!";
            Controller::view("devolucao/coletorAlocacao",["msg" => $msg]);
            return;
        }

        // $verificacao = new VeficacaoModel(null,$request->login,$request->senha);
        // $stmt = $verificacao->verificar();

        // if($request->senha == isset($stmt[0]['user_senha'])){
        //     $model = new Auth();
        //     $modelSession = $model->session($stmt);
        //     Controller::view("devolucao/alocacaoProduto");
        // }else{
        //     $msg = "Usuário ou senha inválidos!";
        //     Controller::view("devolucao/coletorAlocacao",["msg" => $msg]);
        // }
    }
}