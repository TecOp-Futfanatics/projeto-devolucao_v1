<?php
namespace app\controllers\devolucao;
use app\models\devolucao\FornecedorModel;

class FornecedorController{
    public function store($params){
        $model = new FornecedorModel("",$params->marca, "", "");
        $resultado = $model->listarFornecedorId();
        echo json_encode($resultado);
    }
}
