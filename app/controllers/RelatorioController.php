<?php
namespace app\controllers;
use app\models\OrigemModel;

class RelatorioController
{
  public function index()
  {
    $model = new OrigemModel("", "");
    $lista = $model->listarOrigem();
    Controller::view("devolucao/relatorio-rnc", ['lista' => $lista]);
  }
}
