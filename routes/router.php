<?php

function load(string $path, string $controller, string $action)
{
  try {
    // Se controller existe no caminho especificado
    $controllerNamespace = "app\\controllers\\{$path}\\{$controller}";

    if (!class_exists($controllerNamespace)) {
      throw new Exception("O controller {$controller} não existe no caminho {$path}");
    }

    $controllerInstance = new $controllerNamespace();

    if (!method_exists($controllerInstance, $action)) {
      throw new Exception(
        "O método {$action} não existe no controller {$controller}"
      );
    }

    $controllerInstance->$action((object) $_REQUEST);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

$router = [
  "GET" => [
    "/" => fn () => load("devolucao", "HomeDevolucaoController", "index"),
    "/relatorio" => fn () => load("devolucao", "RelatorioController", "index"),
    "/alocacao" => fn () => load("devolucao", "AlocacaoController", "index"),
    "/alocacaoproduto" => fn () => load("devolucao", "AlocacaoController", "rnc"),
    "/verificacaoproduto" => fn () => load("devolucao", "AlocacaoController", "verificacao"),
  ],
  "POST" => [
    "/relatorio" => fn () => load("devolucao", "RelatorioController", "store"),
    "/fornecedor" => fn () => load("devolucao", "FornecedorController", "store"),
    "/loginAlocacao" => fn () => load("devolucao", "LoginAlocacaoController", "store"),
    "/alocacaoproduto" => fn () => load("devolucao", "AlocacaoController", "store"),
    "/verificacaoproduto" => fn () => load("devolucao", "AlocacaoController", "verificacaoCodigo"),
  ],
];
