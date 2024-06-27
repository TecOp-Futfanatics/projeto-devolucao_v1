<?php 
namespace app\models\devolucao;
use app\db\Conexao;
class VeficacaoModel{
    private $id;
    private $nome;
    private $senha;

    function __construct($id, $nome, $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function verificar(){
        $conexao = new Conexao();
        $sql = "SELECT * FROM tb_usuario WHERE user_nome = :usuario";
        $stmt = $conexao->select($sql,[
            ":usuario" => $this->nome,
        ]);
        return $stmt;
    }
}