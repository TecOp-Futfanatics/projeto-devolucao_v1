<?php 
namespace app\models\devolucao;
use app\db\Conexao;

class EnderecoModel{
    private $id;
    private $endereco;

    function __construct($id, $endereco){
        $this->id = $id;
        $this->endereco = $endereco;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function EnderecolastInsertId(){
        $conn = new Conexao();
        $sql = "INSERT INTO tb_endereco_nao_conformidade VALUES ()";
        $stmt = $conn->insert($sql);
        return $stmt;
    }
}