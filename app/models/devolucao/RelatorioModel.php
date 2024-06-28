<?php

namespace app\models\devolucao;

use app\db\Conexao;

class RelatorioModel
{
    private $id;
    private $rnc;
    private $or;
    private $nota_fical;
    private $data_emissao;
    private $data_avaria;
    private $quantidade_reprovado;
    private $origem_id;
    private $pedido_tray;
    private $nota_venda;
    private $data_nf;
    private $pro_id;
    private $for_id;
    private $user_id;

    public function __construct($id, $rnc, $or, $nota_fical, $data_emissao, $data_avaria, $quantidade_reprovado, $origem_id, $pedido_tray, $nota_venda, $data_nf, $pro_id, $for_id, $user_id)
    {
        $this->id = $id;
        $this->rnc = $rnc;
        $this->or = $or;
        $this->nota_fical = $nota_fical;
        $this->data_emissao = $data_emissao;
        $this->data_avaria = $data_avaria;
        $this->quantidade_reprovado = $quantidade_reprovado;
        $this->origem_id = $origem_id;
        $this->pedido_tray = $pedido_tray;
        $this->nota_venda = $nota_venda;
        $this->data_nf = $data_nf;
        $this->pro_id = $pro_id;
        $this->for_id = $for_id;
        $this->user_id = $user_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRnc()
    {
        return $this->rnc;
    }

    public function setRnc($rnc)
    {
        $this->rnc = $rnc;
    }

    public function getOr()
    {
        return $this->or;
    }

    public function setOr($or)
    {
        $this->or = $or;
    }

    public function getNotaFical()
    {
        return $this->nota_fical;
    }

    public function setNotaFical($nota_fical)
    {
        $this->nota_fical = $nota_fical;
    }

    public function getDataEmissao()
    {
        return $this->data_emissao;
    }

    public function setDataEmissao($data_emissao)
    {
        $this->data_emissao = $data_emissao;
    }

    public function getDataAvaria()
    {
        return $this->data_avaria;
    }

    public function setDataAvaria($data_avaria)
    {
        $this->data_avaria = $data_avaria;
    }

    public function getQuantidadeReprovado()
    {
        return $this->quantidade_reprovado;
    }

    public function setQuantidadeReprovado($quantidade_reprovado)
    {
        $this->quantidade_reprovado = $quantidade_reprovado;
    }

    public function getOrigemId()
    {
        return $this->origem_id;
    }

    public function setOrigemId($origem_id)
    {
        $this->origem_id = $origem_id;
    }

    public function getPedidoTray()
    {
        return $this->pedido_tray;
    }

    public function setPedidoTray($pedido_tray)
    {
        $this->pedido_tray = $pedido_tray;
    }

    public function getNotaVenda()
    {
        return $this->nota_venda;
    }

    public function setNotaVenda($nota_venda)
    {
        $this->nota_venda = $nota_venda;
    }

    public function getDataNf()
    {
        return $this->data_nf;
    }

    public function setDataNf($data_nf)
    {
        $this->data_nf = $data_nf;
    }

    public function getProId()
    {
        return $this->pro_id;
    }

    public function setProId($pro_id)
    {
        $this->pro_id = $pro_id;
    }

    public function getForId()
    {
        return $this->for_id;
    }

    public function setForId($for_id)
    {
        $this->for_id = $for_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function gravarRelatorio()
    {
        $con = new Conexao();
        $sql = "INSERT INTO tb_relatorio_nao_conformidade 
                (rel_rnc, rel_or, rel_nota_fiscal, rel_data_emissao, rel_data_avaria, rel_quant_rep, rel_pedido_tray, rel_nota_venda, rel_data_nf, pro_id, for_id, user_id, origem_id) 
                VALUES(:rnc, :ordem_recebimento, :nota_fiscal, :data_emissao, :data_avaria, :quant_rep, :pedido_tray, :nota_venda, :data_nf, :pro_id, :for_id, :user_id, :origem_id)";

        $valores = [
            ':rnc' => $this->rnc,
            ':ordem_recebimento' => $this->or,
            ':nota_fiscal' => $this->nota_fical,
            ':data_emissao' => $this->data_emissao,
            ':data_avaria' => $this->data_avaria,
            ':quant_rep' => $this->quantidade_reprovado,
            ':pedido_tray' => $this->pedido_tray,
            ':nota_venda' => $this->nota_venda,
            ':data_nf' => $this->data_nf,
            ':pro_id' => $this->pro_id,
            ':for_id' => $this->for_id,
            ':user_id' => $this->user_id,
            ':origem_id' => $this->origem_id
        ];
        $stmt = $con->insert($sql, $valores);
        return $stmt;
    }
}
