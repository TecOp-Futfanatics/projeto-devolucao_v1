<?php
namespace app\controllers;
use app\models\FornecedorModel;

class FornecedorController{
    public function store($params){
        $model = new FornecedorModel("",$params->marca, "", "");
        $resultado = $model->listarFornecedorId();
        echo json_encode($resultado);
    }
}
