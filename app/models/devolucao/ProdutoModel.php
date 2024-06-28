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



        $arraySize = count($this->nome);
        if (
            count($this->codigoRef) !== $arraySize ||
            count($this->codigoFut) !== $arraySize ||
            count($this->variacao) !== $arraySize ||
            count($this->quantidade) !== $arraySize ||
            count($this->quantidadeFaturado) !== $arraySize ||
            count($this->valorUnit) !== $arraySize ||
            count($this->quantTotal) !== $arraySize ||
            count($this->custo) !== $arraySize ||
            count($this->detalhes) !== $arraySize ||
            count($this->destinacao) !== $arraySize
        );

        $conn = new Conexao(); 
        $sql = "INSERT INTO tb_produto_nao_conformidade (pro_nome, pro_cod_referencia, pro_cod_futfanatics, pro_variacao, pro_quantidade, pro_quant_fat, pro_valor_unitario, pro_quant_total, pro_custo, pro_detalhes, pro_destinacao, end_id) VALUES (:nome, :codigoRef, :codigoFut, :variacao, :quantidade, :quantidadeFaturado, :valorUnit, :quantTotal, :custo, :detalhes, :destinacao, :end_id)";

        $lastInsertIds = [];


        for ($i = 0; $i < $arraySize; $i++) {

            $stmt = $conn->insert($sql, [
                ':nome' => $this->nome[$i],
                ':codigoRef' => $this->codigoRef[$i],
                ':codigoFut' => $this->codigoFut[$i],
                ':variacao' => $this->variacao[$i],
                ':quantidade' => $this->quantidade[$i],
                ':quantidadeFaturado' => $this->quantidadeFaturado[$i],
                ':valorUnit' => $this->valorUnit[$i],
                ':quantTotal' => $this->quantTotal[$i],
                ':custo' => $this->custo[$i],
                ':detalhes' => $this->detalhes[$i],
                ':destinacao' => $this->destinacao[$i],
                ':end_id' => $idEndereco
            ]);

            $lastInsertIds[] = $stmt;
        }

        return $lastInsertIds;
    }
}
