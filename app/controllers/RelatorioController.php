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

  public function store($params)
  {
    print_r($params);
  }
}
