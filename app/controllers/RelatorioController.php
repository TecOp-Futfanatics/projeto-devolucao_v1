<?php
namespace app\controllers;
use app\models\RelatorioOrigemModel;

class RelatorioController
{
  public function index()
  {
    $model = new RelatorioOrigemModel("", "");
    $lista = $model->listarOrigem();
    Controller::view("devolucao/relatorio-rnc", ['lista' => $lista]);
  }
}
