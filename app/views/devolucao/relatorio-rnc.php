<?php $this->layout("master"); ?>
<script src="/js/relatorio-rnc.js"></script>
<div>
    <h5>Relatório de não conformidade</h5>
    <hr>
</div>

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
    <div class="d-flex justify-content-around">
        <div>
            <div>
                <label for="inputNomeProduto" class="form-label">Nome Produto:</label>
                <input type="text" name="nomeProduto" id="inputNomeProduto" class="form-control">
            </div>
            <div>
                <label for="inputCodRef" class="form-label">Código Referências:</label>
                <input type="text" name="codigoRef" id="inputCodRef" class="form-control">
            </div>
            <div>
                <label for="inputCodFut" class="form-label">Código FutFanatics:</label>
                <input type="text" name="codigoFut" id="inputCodFut" class="form-control">
            </div>
        </div>
        <div>
            <div class="d-flex flex-column justify-content-start ">
                <div class="mr-2">
                    <label for="inputVariacao" class="form-label">Variação:</label>
                </div>
                <div class="d-flex  align-items-center">
                    <input type="text" name="variacao" id="inputVariacao" class="form-control">
                    <button type="button" class="btn btn-primary ml-2">+Variação</button>
                </div>
            </div>

            <div>
                <label for="inputQuantidade" class="form-label">Quantidade:</label>
                <input type="text" name="quantidade" id="inputQuantidade" class="form-control">
            </div>
            <div>
                <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                <input type="text" name="quantFaturado" id="inputQuantFaturado" class="form-control">
            </div>
        </div>
        <div>
            <div>
                <label for="inputValorUnit" class="form-label">Valor Unitario:</label>
                <input type="text" name="valorUnit" id="inputValorUnit" class="form-control">
            </div>
            <div>
                <label for="inputQuantTotal" class="form-label">Quantidade Total:</label>
                <input type="text" name="quantTotal" id="inputQuantTotal" class="form-control">
            </div>
            <div>
                <label for="inputCusto" class="form-label">Custo:</label>
                <input type="text" name="custo" id="inputCusto" class="form-control">
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <div class="form-floating mt-4">
            <label for="floatingTextarea">Detalhes da Não Conformidade:</label>
            <textarea class="form-control" placeholder="Digite..." id="floatingTextarea" style="height: 100px; width: 500px;"></textarea>
        </div>
        <div class="ml-5 gap-4 row mr-4 d-flex flex-column">
            <label for="inputDestinacao">Destinação:</label>
            <div class="d-flex">
                <div class="form-check mr-4">
                    <input type="radio" class="form-check-input" name="destinacao" id="fornecedor">
                    <label class="form-check-label" for="fornecedor">Fornecedor</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="destinacao" id="descate">
                    <label class="form-check-label" for="descate">Descate</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mt-3 w-50">
        <label for="inputImagem" class="form-label">Evidências Fotográficas:</label>
        <input class="form-control" name="image[]" type="file" id="inputImagem"  multiple>
    </div>
    <div>
        <div id="previaImagens"></div>
    </div>
    <button type="submit" class="btn btn-primary">Gerar</button>
</form>