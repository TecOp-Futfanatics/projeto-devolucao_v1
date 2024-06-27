<?php
namespace app\controllers\devolucao;

use app\controllers\Controller;

class HomeDevolucaoController
{
  public function index($params)
  {
    Controller::view("home");
  }
}
