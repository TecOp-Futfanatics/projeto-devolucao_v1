<?php
namespace app\models;
use app\db\Conexao;

class RelatorioOrigemModel{
    private $id;
    private $nome;

    function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getNome(){
        return $this->nome;
    }

    function setNome($nome){
        $this->nome = $nome;
    }

    public function listarOrigem(){
        $con = new Conexao();
        $sql = "SELECT * FROM tb_origem";
        $stmt = $con->select($sql);
        return $stmt;
    }
}