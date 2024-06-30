<?php

namespace app\models\devolucao;
use app\db\Conexao;

class PlataformaModel{
    private $id;
    private $linkFornecedor;
    private $nomeFornecedor;
    private $usuarioPlataforma;
    private $senhaPlataforma;
    
    public function __construct($id, $linkFornecedor, $nomeFornecedor, $usuarioPlataforma, $senhaPlataforma) {
        $this->id = $id;
        $this->linkFornecedor = $linkFornecedor;
        $this->nomeFornecedor = $nomeFornecedor;
        $this->usuarioPlataforma = $usuarioPlataforma;
        $this->senhaPlataforma = $senhaPlataforma;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getLinkFornecedor() {
        return $this->linkFornecedor;
    }

    public function getNomeFornecedor() {
        return $this->nomeFornecedor;
    }

    public function getUsuarioPlataforma() {
        return $this->usuarioPlataforma;
    }

    public function getSenhaPlataforma() {
        return $this->senhaPlataforma;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setLinkFornecedor($linkFornecedor) {
        $this->linkFornecedor = $linkFornecedor;
    }

    public function setNomeFornecedor($nomeFornecedor) {
        $this->nomeFornecedor = $nomeFornecedor;
    }

    public function setUsuarioPlataforma($usuarioPlataforma) {
        $this->usuarioPlataforma = $usuarioPlataforma;
    }

    public function setSenhaPlataforma($senhaPlataforma) {
        $this->senhaPlataforma = $senhaPlataforma;
    }

    public function cadastrarPlataforma(){
        $conn = new Conexao();
        $sql = "INSERT INTO tb_plataforma (linkFornecedor, nomeFornecedor, usuarioPlataforma, senhaPlataforma) 
        VALUES (:linkFornecedor, :nomeFornecedor, :usuarioPlataforma, :senhaPlataforma)";

        $valores = [
            ":linkFornecedor" => $this->linkFornecedor,
            ":nomeFornecedor" => $this->nomeFornecedor,
            ":usuarioPlataforma" => $this->usuarioPlataforma,
            ":senhaPlataforma" => $this->senhaPlataforma
        ];

        $stmt = $conn->insert($sql, $valores);
        return $stmt;
    }

    public function listarPlataforma(){
        $conn = new Conexao();
        $sql = "SELECT * FROM tb_plataforma";

        $stmt = $conn->select($sql, "");
        return $stmt;
    }
}
