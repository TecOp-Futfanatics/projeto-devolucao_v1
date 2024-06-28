<?php
namespace app\models\devolucao;
use app\db\Conexao;

class CabecalhoChecklistFinanceiroModel{
    private $id;
    private $formaDeAbatimentoFinanceiro;
    private $motivoDevolucao;
    private $naturezaDevolucao;
    private $cnpjTransportadora;
    private $razaoSocial;
    private $informacoesAdicionais;

    public function __construct($id, $formaDeAbatimentoFinanceiro, $motivoDevolucao, $naturezaDevolucao, $cnpjTransportadora, $razaoSocial, $informacoesAdicionais){
        $this->id = $id;
        $this->formaDeAbatimentoFinanceiro = $formaDeAbatimentoFinanceiro;
        $this->motivoDevolucao = $motivoDevolucao;
        $this->naturezaDevolucao = $naturezaDevolucao;
        $this->cnpjTransportadora = $cnpjTransportadora;
        $this->razaoSocial = $razaoSocial;
        $this->informacoesAdicionais = $informacoesAdicionais;
    }

    //getters
    public function getId(){
        return $this->id;
    }

    public function getFormaDeAbatimentoFinanceiro(){
        return $this->formaDeAbatimentoFinanceiro;
    }

    public function getMotivoDevolucao(){
        return $this->motivoDevolucao;
    }

    public function getNaturezaDevolucao(){
        return $this->naturezaDevolucao;
    }

    public function getCnpjTransportadora(){
        return $this->cnpjTransportadora;
    }

    public function getRazaoSocial(){
        return $this->razaoSocial;
    }

    public function getInformacoesAdicionais(){
        return $this->informacoesAdicionais;
    }

    //setters
    public function setId($id){
        return $this->id = $id;
    }

    public function setFormaDeAbatimentoFinanceiro($formaDeAbatimentoFinanceiro){
        return $this->formaDeAbatimentoFinanceiro = $formaDeAbatimentoFinanceiro;
    }

    public function setMotivoDevolucao($motivoDevolucao){
        return $this->motivoDevolucao = $motivoDevolucao;
    }

    public function setNaturezaDevolucao($naturezaDevolucao){
        return $this->naturezaDevolucao = $naturezaDevolucao;
    }

    public function setCnpjTransportadora($cnpjTransportadora){
        return $this->cnpjTransportadora = $cnpjTransportadora;
    }

    public function setRazaoSocial($razaoSocial){
        return $this->razaoSocial = $razaoSocial;
    }

    public function setInformacoesAdicionais($informacoesAdicionais){
        return $this->informacoesAdicionais = $informacoesAdicionais;
    }

}