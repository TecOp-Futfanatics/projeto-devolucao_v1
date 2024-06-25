<?php
namespace app\models\ChecklistFinanceiro;
//use function app\db\Conexao;

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
}