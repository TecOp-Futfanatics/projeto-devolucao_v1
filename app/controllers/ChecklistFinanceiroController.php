<?php

namespace app\controllers;
use app\models\ChecklistFinanceiroModel;
use PDO;


//CABECALHO

    class ChecklistFinanceiroController{
        public function index(){
            Controller::view("checklist-financeiro");
        }

        public function store($params)
        {
          $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);
        
          $stmt = $db->prepare("INSERT INTO cabecalhoChecklistFinanceiro(formaDeAbatimento, motivoDaDevolucao, naturezaDaOperacao, cnpjDaTransportadora, razaoSocial, informacoesAdicionais) VALUES (:formaDeAbatimento, :motivoDaDevolucao, :naturezaDaOperacao, :cnpjDaTransportadora, :razaoSocial, :informacoesAdicionais)");
          $stmt->bindParam(':formaDeAbatimento', $params->formaDeAbatimento);
          $stmt->bindParam(':motivoDaDevolucao', $params->motivoDaDevolucao);
          $stmt->bindParam(':naturezaDaOperacao', $params->naturezaDaOperacao);
          $stmt->bindParam(':cnpjDaTransportadora', $params->cnpjDaTransportadora);
          $stmt->bindParam(':razaoSocial', $params->razaoSocial);
          $stmt->bindParam(':informacoesAdicionais', $params->informacoesAdicionais);
          $stmt->execute();
          header("location:http://localhost:8000/produto-checklist-financeiro");
        }
        
    }