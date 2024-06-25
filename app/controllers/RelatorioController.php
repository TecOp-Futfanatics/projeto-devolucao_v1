<?php

namespace app\controllers;

use app\models\RelatorioOrigemModel;
use app\models\FornecedorModel;

class RelatorioController
{
  public function index()
  {
    $model = new RelatorioOrigemModel("", "");
    $modelFornecedor = new FornecedorModel("", "", "", "");
    $fornecedor = $modelFornecedor->listarFornecedor();
    $lista = $model->listarOrigem();
    Controller::view("devolucao/relatorio-rnc", ['lista' => $lista, 'fornecedor' => $fornecedor]);
  }

  public function store($params)
  {
    var_dump($params);
    die();
    if (
      $params->marca == "" || $params->fornecedor == "" ||
      $params->cnpj == "" || $params->or == "" ||
      $params->nf == "" || $params->emissao == "" ||
      $params->dataAvaria == "" || $params->QuantReprovado == "" ||
      $params->origem == "" || $params->nomeProduto == "" ||
      $params->codigoRef == "" || $params->codigoFut == "" ||
      $params->valorUnit == "" || $params->quantTotal == "" ||
      $params->custo == "" || $params->variacao == "" || $params->quantidade == "" ||
      $params->quantFaturado == "" || $params->detalhes == "" || $params->destinacao == "" ||
      $params->image == ""
    ) {
      $error = "Preencha todos os campos";
      Controller::view("devolucao/relatorio-rnc", ['error' => $error]);
    } else {
      $success = "Relatório cadastrado com sucesso"; 
      Controller::view("devolucao/relatorio-rnc", ['success' => $success]);
    }
  }
}
