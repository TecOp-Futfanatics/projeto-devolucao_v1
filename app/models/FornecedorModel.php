<?php
namespace app\models;
use app\db\Conexao;

class FornecedorModel{
    private $id;
    private $marca;
    private $fornecedor;
    private $cnpj;

    function __construct($id, $marca, $cnpj, $fornecedor)
    {
        $this->id = $id;
        $this->marca = $marca;
        $this->cnpj = $cnpj;
        $this->fornecedor = $fornecedor;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getmarca(){
        return $this->marca;
    }

    function setmarca($marca){
        $this->marca = $marca;
    }

    function getCnpj(){
        return $this->cnpj;
    }

    function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    function getFornecedor(){
        return $this->fornecedor;
    }

    function setFornecedor($fornecedor){
        $this->fornecedor = $fornecedor;
    }

    public function listarFornecedor(){
        $con = new Conexao();
        $sql = "SELECT * FROM tb_fornecedor GROUP BY for_marca";
        $stmt = $con->select($sql);
        return $stmt;
    }

    public function listarFornecedorId(){
        $con = new Conexao();
        $sql = "SELECT * FROM tb_fornecedor WHERE for_marca= :marca";
        $stmt = $con->select($sql, ['marca' => $this->marca]);
        return $stmt;
    }
}