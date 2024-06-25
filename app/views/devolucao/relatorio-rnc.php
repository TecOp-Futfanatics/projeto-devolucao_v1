<?php $this->layout("master");
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

date_default_timezone_set("America/Sao_Paulo");
$numRnc = date("dmYHis");
?>
<script src="/js/devolucao/relatorio-rnc.js"></script>
<link rel="stylesheet" href="/css/devolucao/relatorio-rnc.css">
<div style="display: flex; justify-content: space-between;">
    <div>
        <h5>Relatório de não conformidade</h5>
    </div>
    <div style="height: 25px; margin-bottom: 15px;">
        <?php echo $generator->getBarcode(
            $numRnc,
            $generator::TYPE_CODE_128
        ) ?>
        <p style="font-size: 15px;"><?php echo $numRnc ?></p>
    </div>
</div>
<hr>
<?php if (isset($error)) : ?>
    <div id="alertMessage" class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
<?php elseif (isset($success)) : ?>
    <div id="alertMessage" class="alert alert-success" role="alert">
        <?php echo $success ?>
    </div>
<?php endif ?>

<form id="form" action="/relatorio" method="POST" novalidate>
    <div class="d-flex justify-content-around">
        <div>
            <div>
                <label for="inputMarca" class="form-label">Marca:</label>
                <select name="marca" class="form-control" id="inputMarca" required>
                    <option selected value="0" disabled>Selecione uma opção</option>
                    <?php foreach ($fornecedor as $forne) : ?>
                        <option value="<?php echo $forne['for_marca'] ?>"><?php echo $forne['for_marca'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="selectFornecedor" class="form-label">Fornecedor:</label>
                <select name="fornecedor" id="selectFornecedor" class="form-control" required></select>
                
            </div>
            <div>
                <label for="inputCnpj" class="form-label">CNPJ:</label>
                <input type="text" id="inputCnpj" name="cnpj" class="form-control" disabled required>
            </div>
        </div>
        <div>
            <div>
                <label for="inputOR" class="form-label">OR:</label>
                <input type="text" id="inputOR" name="or" class="form-control" required>
            </div>
            <div>
                <label for="inputNF" class="form-label">NF:</label>
                <input type="text" id="inputNF" name="nf" class="form-control" required>
            </div>
            <div>
                <label for="inputEmissao" class="form-label">Emissão:</label>
                <input type="date" id="inputEmissao" name="emissao" class="form-control" required>
            </div>
        </div>
        <div>
            <div>
                <label for="inputDateAvaria" class="form-label">Data Avaria:</label>
                <input type="date" id="inputDateAvaria" name="dataAvaria" class="form-control" required>
            </div>
            <div>
                <label for="inputReprovado" class="form-label">Quantidade Reprovado:</label>
                <input type="text" id="inputReprovado" name="QuantReprovado" class="form-control" required>
            </div>
            <div>
                <label for="selectOrigem" class="form-label">Origem:</label>
                <select name="origem" class="form-control" id="selectOrigem" required>
                    <option selected value="0" disabled>Selecione uma opção</option>
                    <?php foreach ($lista as $origem) : ?>
                        <option value="<?php echo $origem['origem_id'] ?>"><?php echo $origem['origem_nome'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div id="divFornecedor">
                <label for="inputPedidoTray" class="form-label">Pedido Tray:</label>
                <input type="text" id="inputPedidoTray" name="pedidoTray" class="form-control" required>
                <label for="inputNotaVenda" class="form-label">NF venda:</label>
                <input type="text" id="inputNotaVenda" name="notaVenda" class="form-control" required>
                <label for="inputDataNF" class="form-label">Data NF:</label>
                <input type="date" id="inputDataNF" name="DatanF" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h5>Produto não conformes</h5>
        <hr>
    </div>
    <div class="container w-75 d-flex flex-column justify-content-between">
        <div class="row">
            <div class="col-md-4">
                <label for="inputNomeProduto" class="form-label">Nome Produto:</label>
                <input type="text" name="nomeProduto[]" id="inputNomeProduto" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="inputCodRef" class="form-label">Código Referência:</label>
                <input type="text" name="codigoRef[]" id="inputCodRef" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="inputCodFut" class="form-label">Código FutFanatics:</label>
                <input type="text" name="codigoFut[]" id="inputCodFut" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="inputValorUnit" class="form-label">Valor Unitário:</label>
                <input type="text" name="valorUnit[]" id="inputValorUnit" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="inputQuantTotal" class="form-label">Quantidade Total:</label>
                <input type="text" name="quantTotal[]" id="inputQuantTotal" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="inputCusto" class="form-label">Custo:</label>
                <input type="text" name="custo[]" id="inputCusto" class="form-control" required>
            </div>
        </div>
        <div id="divCop" class="row">
            <div class="col-md-4">
                <label for="inputVariacao" class="form-label">Variação:</label>
                <div class="input-group">
                    <input type="text" name="variacao[]" id="inputVariacao" class="form-control" required>
                    <button type="button" id="btnVariacao" class="btn btn-primary ml-3">+ Variação</button>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputQuantidade" class="form-label">Quantidade:</label>
                <input type="text" name="quantidade[]" id="inputQuantidade" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                <input type="text" name="quantFaturado[]" id="inputQuantFaturado" class="form-control" required>
            </div>
        </div>
        <div id="spaceButton"></div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="form-floating">
                    <label for="floatingTextarea">Detalhes da Não Conformidade:</label>
                    <textarea class="form-control" name="detalhes[]" placeholder="Digite..." id="floatingTextarea" style="height: 100px;" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputDestinacao">Destinação:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="Fornecedor" name="destinacao[]" id="fornecedor" required>
                    <label class="form-check-label" for="fornecedor">Fornecedor</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="Descarte" name="destinacao[]" id="descarte" required>
                    <label class="form-check-label" for="descarte">Descarte</label>
                </div>
            </div>
            <div>
                <div class="mt-3">
                    <label for="inputImagemOpicional" class="form-label">Evidências Fotográficas:</label>
                    <input class="form-control w-100" name="image[]" accept="image/png, image/jpg, image/jpeg" required type="file" id="inputImagemOpicional" multiple>
                </div>
                <div>
                    <div id="previaImagens"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="containerProduto"></div>

    <div class="d-flex justify-content-center mt-5">
        <div>
            <button type="submit" id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
        </div>
        <div class="ml-3">
            <button type="button" id="btnProduto" class="btn btn-primary">+ Produto</button>
        </div>
    </div>
</form>