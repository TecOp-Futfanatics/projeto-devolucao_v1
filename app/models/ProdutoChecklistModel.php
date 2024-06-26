<?php
namespace app\models;

class ProdutoChecklistModel{
    private $id;
    private $codigoVariacao;
    private $numeroDaNotaFiscal;
    private $quantidadeFaturada;
    private $quantidadeDevolver;
    private $valorUnitario;
    private $ipi;

    public function __construct($id, $codigoVariacao, $numeroDaNotaFiscal, $quantidadeFaturada, $quantidadeDevolver, $valorUnitario, $ipi){
        $this->id = $id;
        $this->codigoVariacao = $codigoVariacao;
        $this->numeroDaNotaFiscal = $numeroDaNotaFiscal;
        $this->quantidadeFaturada = $quantidadeFaturada;
        $this->quantidadeDevolver = $quantidadeDevolver;
        $this->valorUnitario = $valorUnitario;
        $this->ipi = $ipi;
    }

    public function getId(){
        return $this->id;
    }

    public function getCodigoVariacao(){
        return $this->codigoVariacao;
    }

    public function getNumeroDaNotaFiscal(){
        return $this->numeroDaNotaFiscal;
    }

    public function getQuantidadeFaturada(){
        return $this->quantidadeFaturada;
    }

    public function getQuantidadeDevolver(){
        return $this->quantidadeDevolver;
    }

    public function getValorUnitario(){
        return $this->valorUnitario;
    }

    public function getIpi(){
        return $this->ipi;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function setCodigoVariacao($codigoVariacao){
        return $this->codigoVariacao = $codigoVariacao;
    }

    public function setNumeroDaNotaFiscal($numeroDaNotaFiscal){
        return $this->numeroDaNotaFiscal = $numeroDaNotaFiscal;
    }

    public function setQuantidadeFaturada($quantidadeFaturada){
        return $this->quantidadeFaturada = $quantidadeFaturada;
    }

    public function setQuantidadeDevolver($quantidadeDevolver){
        return $this->quantidadeDevolver = $quantidadeDevolver;
    }

    public function setValorUnitario($valorUnitario){
        return $this->valorUnitario = $valorUnitario;
    }

    public function setIpi($ipi){
        return $this->ipi = $ipi;
    }
}