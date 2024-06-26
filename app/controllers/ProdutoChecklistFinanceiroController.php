<?php
namespace app\controllers;
use app\models\ProdutoChecklistFinanceiroModel;
use PDO;

class ProdutoChecklistFinanceiroController{
    public function index(){
        Controller::view("produto-checklist-financeiro");
    }

    public function store($params){
        $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);

          $stmt = $db->prepare("INSERT INTO produtoChecklistFinanceiro(codigoVariacao, numeroDaNotaFiscal, quantidadeFaturada, quantidadeDevolver, valorUnitario, ipi)");
          $stmt->bindParam(":codigoVariacao", $params->codigoVariacao);
          $stmt->bindParam(":numeroDaNotaFiscal", $params->numeroDaNotaFiscal);
          $stmt->bindParam(":quantidadeFaturada", $params->quantidadeFaturada);
          $stmt->bindParam(":quantidadeDevolver", $params->quantidadeDevolver);
          $stmt->bindParam(":valorUnitario", $params->valorUnitario);
          $stmt->bindParam(":ipi", $params->ipi);
          $stmt->execute();
          header("location:http://localhost:8000/produto-checklist-financeiro");
    }
}