<?php $this->layout("master");
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

date_default_timezone_set("America/Sao_Paulo");
$numRnc = date("dmYHis");
?>
<script src="/js/relatorio-rnc.js"></script>
<div style="display: flex; justify-content: space-between;">
    <div>
        <h5>Relatório de não conformidade</h5>
    </div>
    <div style="height: 25px;">
        <?php echo $generator->getBarcode(
            $numRnc,
            $generator::TYPE_CODE_128
        ) ?>
        <p style="font-size: 15px;"><?php echo $numRnc ?></p>
    </div>
</div>
<hr>
<form action="/relatorio" method="POST" enctype="multipart/form-data">
    <div class="d-flex justify-content-around">
        <div>
            <div>
                <label for="inputMarca" class="form-label">Marca:</label>
                <input type="text" id="inputMarca" name="marca" class="form-control">
            </div>
            <div>
                <label for="inputFornecedor" class="form-label">Fornecedor:</label>
                <input type="text" id="inputFornecedor" name="fornecedor" class="form-control">
            </div>
            <div>
                <label for="inputCnpj" class="form-label">CNPJ:</label>
                <input type="text" id="inputCnpj" name="cnpj" class="form-control">
            </div>
        </div>
        <div>
            <div>
                <label for="inputOR" class="form-label">OR:</label>
                <input type="text" id="inputOR" name="or" class="form-control">
            </div>
            <div>
                <label for="inpitNF" class="form-label">NF:</label>
                <input type="text" id="inpitNF" name="nf" class="form-control">
            </div>
            <div>
                <label for="inputEmissao" class="form-label">Emissão:</label>
                <input type="date" id="inputEmissao" name="emaissao" class="form-control">
            </div>
        </div>
        <div>
            <div>
                <label for="inputDateAvaria" class="form-label">Data Avaria:</label>
                <input type="date" id="inputDateAvaria" name="dataAvaria" class="form-control">
            </div>
            <div>
                <label for="inputReprovado" class="form-label">Quantidade Reprovado:</label>
                <input type="text" id="inputReprovado" name="QuantReprovado" class="form-control">
            </div>
            <div>
                <label for="selectOrigem" class="form-label">Origem:</label>
                <select name="origem" class="form-control" id="selectOrigem">
                    <option selected disabled>Selecione uma opção</option>
                    <?php foreach ($lista as $origem) : ?>
                        <option value="<?php echo $origem['origem_id'] ?>"><?php echo $origem['origem_nome'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h5>Produto não conformes</h5>
        <hr>
    </div>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-4">
                <label for="inputNomeProduto" class="form-label">Nome Produto:</label>
                <input type="text" name="nomeProduto" id="inputNomeProduto" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputCodRef" class="form-label">Código Referência:</label>
                <input type="text" name="codigoRef" id="inputCodRef" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputCodFut" class="form-label">Código FutFanatics:</label>
                <input type="text" name="codigoFut" id="inputCodFut" class="form-control">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-4">
                <label for="inputValorUnit" class="form-label">Valor Unitário:</label>
                <input type="text" name="valorUnit" id="inputValorUnit" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputQuantTotal" class="form-label">Quantidade Total:</label>
                <input type="text" name="quantTotal" id="inputQuantTotal" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputCusto" class="form-label">Custo:</label>
                <input type="text" name="custo" id="inputCusto" class="form-control">
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-md-4">
                <label for="inputVariacao" class="form-label">Variação:</label>
                <div class="input-group">
                    <input type="text" name="variacao" id="inputVariacao" class="form-control">
                    <button type="button" id="btnVariacao" class="btn btn-primary ml-3">+ Variação</button>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputQuantidade" class="form-label">Quantidade:</label>
                <input type="text" name="quantidade" id="inputQuantidade" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                <input type="text" name="quantFaturado" id="inputQuantFaturado" class="form-control">
            </div>
        </div>
        <div class="row justify-content-around" id="spaceButton"></div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <label for="floatingTextarea">Detalhes da Não Conformidade:</label>
                    <textarea class="form-control" placeholder="Digite..." id="floatingTextarea" style="height: 100px;"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputDestinacao">Destinação:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="Fornecedor" name="destinacao" id="fornecedor">
                    <label class="form-check-label" for="fornecedor">Fornecedor</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="Descarte" name="destinacao" id="descarte">
                    <label class="form-check-label" for="descarte">Descarte</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="inputImagem" class="form-label">Evidências Fotográficas:</label>
                <input class="form-control" name="image[]" type="file" id="inputImagem" multiple>
            </div>
            <div class="col-md-6">
                <div id="previaImagens"></div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Gerar</button>
            </div>
        </div>
    </div>

</form>