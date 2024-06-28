<?php
namespace app\models\ChecklistFinanceiro;
use app\db\Conexao;
use PDO;

class ChecklistFinanceiroModel{
    private $id;
    private $formaDeAbatimento;
    private $motivoDaDevolucao;
    private $naturezaDaOperacao;
    private $cnpjDaTransportadora;
    private $razaoSocial;
    private $informacoesAdicionais;

    public function __construct($id, $formaDeAbatimento, $motivoDaDevolucao, $naturezaDaOperacao, $cnpjDaTransportadora, $razaoSocial, $informacoesAdicionais){
        $this->id = $id;
        $this->formaDeAbatimento = $formaDeAbatimento;
        $this->motivoDaDevolucao = $motivoDaDevolucao;
        $this->naturezaDaOperacao = $naturezaDaOperacao;
        $this->cnpjDaTransportadora = $cnpjDaTransportadora;
        $this->razaoSocial = $razaoSocial;
        $this->informacoesAdicionais = $informacoesAdicionais;
    }


    //getters
    public function getId(){
        return $this->id;
    }

    public function getFormaDeAbatimento(){
        return $this->formaDeAbatimento;
    }

    public function getMotivoDaDevolucao(){
        return $this->motivoDaDevolucao;
    }

    public function getNaturezaDaOperacao(){
        return $this->naturezaDaOperacao;
    }

    public function getCnpjDaTransportadora(){
        return $this->cnpjDaTransportadora;
    }

    public function getRazaoSocial(){
        return $this->razaoSocial;
    }

    public function getInformacoesAdicionais(){
        return $this->informacoesAdicionais;
    }


    //setters
    public function setId($id){
        $this->id = $id;
    }

    public function setFormaDeAbatimento($formaDeAbatimento){
        $this->formaDeAbatimento = $formaDeAbatimento;
    }

    public function setMotivoDaDevolucao($motivoDaDevolucao){
        $this->motivoDaDevolucao = $motivoDaDevolucao;
    }

    public function setNaturezaDaOperacao($naturezaDaOperacao){
        $this->naturezaDaOperacao = $naturezaDaOperacao;
    }

    public function setCnpjDaTransportadora($cnpjDaTransportadora){
        $this->cnpjDaTransportadora = $cnpjDaTransportadora;
    }

    public function setRazaoSocial($razaoSocial){
        $this->razaoSocial = $razaoSocial;
    }

    public function setInformacoesAdicionais($informacoesAdicionais){
        $this->informacoesAdicionais = $informacoesAdicionais;
    }


    //funções
    public function store($params){
        $db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);
        
        $stmt = $db->prepare("INSERT INTO cabecalhoChecklistFinanceiro(formaDeAbatimento, motivoDaDevolucao, naturezaDaOperacao, cnpjDaTransportadora, razaoSocial, informacoesAdicionais) VALUES (:formaDeAbatimento, :motivoDaDevolucao, :naturezaDaOperacao, :cnpjDaTransportadora, :razaoSocial, :informacoesAdicionais)");
        $stmt->bindParam(':formaDeAbatimento', $params->formaDeAbatimento);
        $stmt->bindParam(':motivoDaDevolucao', $params->motivoDaDevolucao);
        $stmt->bindParam(':naturezaDaOperacao', $params->naturezaDaOperacao);
        $stmt->bindParam(':cnpjDaTransportadora', $params->cnpjDaTransportadora);
        $stmt->bindParam(':razaoSocial', $params->razaoSocial);
        $stmt->bindParam(':informacoesAdicionais', $params->informacoesAdicionais);
        $stmt->execute();
        header("location:http://localhost:8000/produto-checklist-financeiro");
    }