<?php
namespace app\controllers;
use app\models\ProdutoChecklistFinanceiroModel;
use PDO;

class ProdutoChecklistFinanceiroController{
    public function index(){
        Controller::view("produto-checklist-financeiro");
    }

    public function store($params){
        
    }
}