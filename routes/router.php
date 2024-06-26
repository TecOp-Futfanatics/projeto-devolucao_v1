<?php

function load(string $controller, string $action)
{
    try {
        // se controller existe
        $controllerNamespace = "app\\controllers\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
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
    "/" => fn () => load("HomeController", "index"),
    "/relatorio" => fn () => load("RelatorioController", "index"),
    "/checklist-financeiro" => fn () => load("ChecklistFinanceiroController", "index"),
    "/produto-checklist-financeiro" => fn () => load("ProdutoChecklistFinanceiroController", "index"),
    "/plataforma" => fn () => load("PlataformaController", "index")
  ],
  "POST" => [
    "/plataforma" => fn () => load("PlataformaController", "store"),
    "/relatorio" => fn () => load("RelatorioController", "store"),
    "/checklist-financeiro" => fn () => load("ChecklistFinanceiroController","store"),
    "/produto-checklist-financeiro" => fn () => load("ProdutoChecklistFinanceiroController", "store"),
  ],
];
