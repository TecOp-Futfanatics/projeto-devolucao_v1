<?php
namespace app\controllers\devolucao;
use app\models\devolucao\CabecalhoChecklistFinanceiroModel;
use app\controllers\Controller;

class CabecalhoChecklistFinanceiroController{
    public function index(){
        Controller::view("devolucao/cabecalho-checklist-financeiro");
    }

}