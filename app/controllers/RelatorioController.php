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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (!empty($_FILES['image']['name'][0])) {
        foreach ($_FILES['image']['name'] as $key => $name) {
          if ($_FILES['image']['error'][$key] === 0) {
            $tmp_name = $_FILES['image']['tmp_name'][$key];
            $size = $_FILES['image']['size'][$key];
            $type = $_FILES['image']['type'][$key];

            echo "Arquivo: $name, Tamanho: $size bytes, Tipo: $type<br>";
          }
        }
      } else {
        echo "Nenhum arquivo foi enviado.";
      }
    }
    die();
  }
}
