<?php
namespace app\controllers\devolucao;
use app\controllers\Controller;

class AlocacaoController {
    public function index(){
        Controller::view("devolucao/coletorAlocacao");
    }
}