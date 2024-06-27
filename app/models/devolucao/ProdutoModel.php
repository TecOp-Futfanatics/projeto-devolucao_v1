<?php

namespace app\models\devolucao;

use app\db\Conexao;
use app\models\devolucao\EnderecoModel;

class ProdutoModel
{
    private $id;
    private $nome;
    private $codigoRef;
    private $codigoFut;
    private $variacao;
    private $quantidade;
    private $quantidadeFaturado;
    private $valorUnit;
    private $quantTotal;
    private $custo;
    private $detalhes;
    private $destinacao;
    private $end_id;

    public function __construct($id, $nome, $codigoRef, $codigoFut, $variacao, $quantidade, $quantidadeFaturado, $valorUnit, $quantTotal, $custo, $detalhes, $destinacao, $end_id)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->codigoRef = $codigoRef;
        $this->codigoFut = $codigoFut;
        $this->variacao = $variacao;
        $this->quantidade = $quantidade;
        $this->quantidadeFaturado = $quantidadeFaturado;
        $this->valorUnit = $valorUnit;
        $this->quantTotal = $quantTotal;
        $this->custo = $custo;
        $this->detalhes = $detalhes;
        $this->destinacao = $destinacao;
        $this->end_id = $end_id;
    }

    // get e set 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCodigoRef()
    {
        return $this->codigoRef;
    }
    public function setCodigoRef($codigoRef)
    {
        $this->codigoRef = $codigoRef;
    }

    public function getCodigoFut()
    {
        return $this->codigoFut;
    }
    public function setCodigoFut($codigoFut)
    {
        $this->codigoFut = $codigoFut;
    }

    public function getVariacao()
    {
        return $this->variacao;
    }
    public function setVariacao($variacao)
    {
        $this->variacao = $variacao;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidadeFaturado()
    {
        return $this->quantidadeFaturado;
    }
    public function setQuantidadeFaturado($quantidadeFaturado)
    {
        $this->quantidadeFaturado = $quantidadeFaturado;
    }

    public function getValorUnit()
    {
        return $this->valorUnit;
    }
    public function setValorUnit($valorUnit)
    {
        $this->valorUnit = $valorUnit;
    }

    public function getQuantTotal()
    {
        return $this->quantTotal;
    }
    public function setQuantTotal($quantTotal)
    {
        $this->quantTotal = $quantTotal;
    }

    public function getCusto()
    {
        return $this->custo;
    }
    public function setCusto($custo)
    {
        $this->custo = $custo;
    }

    public function getDetalhes()
    {
        return $this->detalhes;
    }
    public function setDetalhes($detalhes)
    {
        $this->detalhes = $detalhes;
    }

    public function getDestinacao()
    {
        return $this->destinacao;
    }
    public function setDestinacao($destinacao)
    {
        $this->destinacao = $destinacao;
    }

    public function getEndId()
    {
        return $this->end_id;
    }
    public function setEndId($end_id)
    {
        $this->end_id = $end_id;
    }

    public function ProdutoLastInsertId()
    {
        $endereco = new EnderecoModel("", "");
        $idEndereco = $endereco->EnderecolastInsertId();

        $nome = is_array($this->nome) ? implode(",", $this->nome) : $this->nome;
        $codigoRef = is_array($this->codigoRef) ? implode(",", $this->codigoRef) : $this->codigoRef;
        $codigoFut = is_array($this->codigoFut) ? implode(",", $this->codigoFut) : $this->codigoFut;
        $variacao = is_array($this->variacao) ? implode(",", $this->variacao) : $this->variacao;
        $quantidade = is_array($this->quantidade) ? implode(",", $this->quantidade) : $this->quantidade;
        $quantidadeFaturado = is_array($this->quantidadeFaturado) ? implode(",", $this->quantidadeFaturado) : $this->quantidadeFaturado;
        $valorUnit = is_array($this->valorUnit) ? implode(",", $this->valorUnit) : $this->valorUnit;
        $quantTotal = is_array($this->quantTotal) ? implode(",", $this->quantTotal) : $this->quantTotal;
        $custo = is_array($this->custo) ? implode(",", $this->custo) : $this->custo;
        $detalhes = is_array($this->detalhes) ? implode(",", $this->detalhes) : $this->detalhes;
        $destinacao = is_array($this->destinacao) ? implode(",", $this->destinacao) : $this->destinacao;


        $sql = "INSERT INTO tb_produto_nao_conformidade (pro_nome, pro_cod_referencia, pro_cod_futfanatics, pro_variacao, pro_quantidade, pro_quant_fat, pro_valor_unitario, pro_quant_total, pro_custo, pro_detalhes, pro_destinacao, end_id) VALUES (:nome, :codigoRef, :codigoFut, :variacao, :quantidade, :quantidadeFaturado, :valorUnit, :quantTotal, :custo, :detalhes, :destinacao, :end_id)";
        $conn = new Conexao();

        $stmt = $conn->insert($sql, [
            ':nome' => $nome,
            ':codigoRef' => $codigoRef,
            ':codigoFut' => $codigoFut,
            ':variacao' => $variacao,
            ':quantidade' => $quantidade,
            ':quantidadeFaturado' => $quantidadeFaturado,
            ':valorUnit' => $valorUnit,
            ':quantTotal' => $quantTotal,
            ':custo' => $custo,
            ':detalhes' => $detalhes,
            ':destinacao' => $destinacao,
            ':end_id' => $idEndereco
        ]);
        return $stmt;
    }
}
