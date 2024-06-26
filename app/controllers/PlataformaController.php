<?php
namespace app\controllers;
use PDO;

class PlataformaController{
    public function index(){
        Controller::view("devolucao/plataforma");
    }

    public function store($params){
        $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);

        $stmt = $db->prepare("INSERT INTO plataforma(linkFornecedor, nomeFornecedor, usuarioPlataforma, senhaPlataforma) VALUES (:linkFornecedor, :nomeFornecedor, :usuarioPlataforma, :senhaPlataforma)");
        $stmt -> bindParam(":linkFornecedor", $params->linkFornecedor);
        $stmt -> bindParam(":nomeFornecedor", $params->Fornecedor);
        $stmt -> bindParam(":usuarioPlataforma", $params->usuarioPlataforma);
        $stmt -> bindParam(":senhaPlataforma", $params->senhaPlataforma);
        $stmt->execute();
        header("location:http://localhost:8000/plataforma");
    }

    public function excluir($id){
        $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);

        $stmt = $db->prepare("DELETE FROM plataforma WHERE id = :id ");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location: http://localhost:8000/plataforma");
    }
}

