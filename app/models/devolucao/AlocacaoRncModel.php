<?php

namespace app\models\devolucao;

use app\db\Conexao;

class AlocacaoRncModel
{
    private $rnc;

    function __construct($rnc)
    {
        $this->rnc = $rnc;
    }

    public function getRnc()
    {
        return $this->rnc;
    }

    public function setRnc($rnc)
    {
        $this->rnc = $rnc;
    }

    public function buscarRnc()
    {
        $conexao = new Conexao();
        $sql = "SELECT rel_rnc, rel_or, rel_nota_fiscal, rel_data_emissao, rel_data_avaria, rel_quant_rep, rel_pedido_tray, rel_nota_venda, rel_data_nf,
                pro_nome, pro_cod_referencia, pro_cod_futfanatics, pro_variacao, pro_quantidade, pro_quant_fat, pro_valor_unitario, pro_quant_total, pro_custo
                pro_detalhes, pro_destinacao, end_nome, for_marca, for_fornecedor, for_cnpj, user_nome, origem_nome 
                FROM tb_relatorio_nao_conformidade 
                INNER JOIN tb_produto_nao_conformidade ON tb_produto_nao_conformidade.pro_id = tb_relatorio_nao_conformidade.pro_id
                INNER JOIN tb_endereco_nao_conformidade ON tb_produto_nao_conformidade.end_id = tb_endereco_nao_conformidade.end_id
                INNER JOIN tb_fornecedor ON tb_fornecedor.for_id = tb_relatorio_nao_conformidade.for_id
                INNER JOIN tb_usuario ON tb_usuario.user_id = tb_relatorio_nao_conformidade.user_id
                INNER JOIN tb_origem ON tb_origem.origem_id = tb_relatorio_nao_conformidade.origem_id WHERE rel_rnc = :rnc";
        $stmt = $conexao->select($sql, [
            ":rnc" => $this->rnc
        ]);
        return $stmt;
    }

    public function consultaCodigoRnc($codigo)
    {
        $codigo = explode("+", $codigo); 

        $codigoFomatado = $codigo[0];
        $variacao = $codigo[1];

        $conexao = new Conexao();
        $sql = "SELECT rel_rnc, rel_or, rel_nota_fiscal, rel_data_emissao, rel_data_avaria, rel_quant_rep, rel_pedido_tray, rel_nota_venda, rel_data_nf,
                pro_nome, pro_cod_referencia, pro_cod_futfanatics, pro_variacao, pro_quantidade, pro_quant_fat, pro_valor_unitario, pro_quant_total, pro_custo
                pro_detalhes, pro_destinacao, end_nome, for_marca, for_fornecedor, for_cnpj, user_nome, origem_nome 
                FROM tb_relatorio_nao_conformidade 
                INNER JOIN tb_produto_nao_conformidade ON tb_produto_nao_conformidade.pro_id = tb_relatorio_nao_conformidade.pro_id
                INNER JOIN tb_endereco_nao_conformidade ON tb_produto_nao_conformidade.end_id = tb_endereco_nao_conformidade.end_id
                INNER JOIN tb_fornecedor ON tb_fornecedor.for_id = tb_relatorio_nao_conformidade.for_id
                INNER JOIN tb_usuario ON tb_usuario.user_id = tb_relatorio_nao_conformidade.user_id
                INNER JOIN tb_origem ON tb_origem.origem_id = tb_relatorio_nao_conformidade.origem_id WHERE rel_rnc = :rnc
				AND pro_cod_futfanatics = :codigo AND pro_variacao = :variacao";
        $stmt = $conexao->select($sql, [
            ":rnc" => $this->rnc,
            ":codigo" => $codigoFomatado,
            ":variacao" => $variacao
        ]);
        return $stmt;
    }
}
