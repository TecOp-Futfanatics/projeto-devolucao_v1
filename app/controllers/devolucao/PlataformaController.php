<?php
namespace app\controllers\devolucao;
use app\controllers\Controller;
use app\models\devolucao\PlataformaModel;

class PlataformaController{
    public function index(){
        Controller::view("devolucao/plataforma");
    }

    public function store($params){
        
    }

}