<?php

namespace app\controllers\devolucao;

use app\controllers\Controller;
use app\models\devolucao\RelatorioOrigemModel;
use app\models\devolucao\FornecedorModel;
use app\models\devolucao\RelatorioModel;
use app\models\devolucao\ProdutoModel;

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

    $model = new RelatorioOrigemModel("", "");
    $modelFornecedor = new FornecedorModel("", "", "", "");
    $fornecedor = $modelFornecedor->listarFornecedor();
    $lista = $model->listarOrigem();

    if (
      $params->rnc == "" ||  $params->marca == "" || $params->fornecedor == "" ||
      $params->or == "" ||
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
      Controller::view("devolucao/relatorio-rnc", ['error' => $error, 'lista' => $lista, 'fornecedor' => $fornecedor]);
    } else {

      $modelProduto = new ProdutoModel("", $params->nomeProduto, $params->codigoRef, $params->codigoFut, $params->variacao, $params->quantidade, $params->quantFaturado, $params->valorUnit, $params->quantTotal, $params->custo, $params->detalhes, $params->destinacao, "");
      $idProdutos = $modelProduto->ProdutoLastInsertId();

      foreach ($idProdutos as $idProduto) {
        $modelRelatorio = new RelatorioModel(
          "",
          $params->rnc,
          $params->or,
          $params->nf,
          $params->emissao,
          $params->dataAvaria,
          $params->QuantReprovado,
          $params->origem,
          $params->pedidoTray,
          $params->notaVenda,
          $params->dataNF,
          $idProduto,
          $params->fornecedor,
          1 
        );
        $modelRelatorio->gravarRelatorio();
      }

      if ($modelRelatorio) {
        $success = "Relatório cadastrado com sucesso";
        Controller::view("devolucao/relatorio-rnc", ['success' => $success, 'lista' => $lista, 'fornecedor' => $fornecedor]);
      } else {
        $error = "Erro ao cadastrar relatório";
        Controller::view("devolucao/relatorio-rnc", ['error' => $error, 'lista' => $lista, 'fornecedor' => $fornecedor]);
      }
    }
  }
}
