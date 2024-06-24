<?php $this->layout("master");
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

date_default_timezone_set("America/Sao_Paulo");
$numRnc = date("dmYHis");
?>
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
<form id="form" action="/relatorio" method="POST" novalidate>
    <?php if (isset($msg)) : ?>
        <p class="alert alert-danger"><?php echo $msg ?></p>
    <?php endif ?>
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
                <label for="inputNF" class="form-label">NF:</label>
                <input type="text" id="inputNF" name="nf" class="form-control">
            </div>
            <div>
                <label for="inputEmissao" class="form-label">Emissão:</label>
                <input type="date" id="inputEmissao" name="emissao" class="form-control">
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
                    <option selected value="0" disabled>Selecione uma opção</option>
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
    <div class="container  w-75 d-flex flex-column justify-content-between">
        <div class="row ">
            <div class="col-md-4">
                <label for="inputNomeProduto" class="form-label">Nome Produto:</label>
                <input type="text" name="nomeProduto[]" id="inputNomeProduto" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputCodRef" class="form-label">Código Referência:</label>
                <input type="text" name="codigoRef[]" id="inputCodRef" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputCodFut" class="form-label">Código FutFanatics:</label>
                <input type="text" name="codigoFut[]" id="inputCodFut" class="form-control">
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4">
                <label for="inputValorUnit" class="form-label">Valor Unitário:</label>
                <input type="text" name="valorUnit[]" id="inputValorUnit" class=" form-control">
            </div>
            <div class="col-md-4">
                <label for="inputQuantTotal" class="form-label">Quantidade Total:</label>
                <input type="text" name="quantTotal[]" id="inputQuantTotal" class=" form-control">
            </div>
            <div class="col-md-4">
                <label for="inputCusto" class="form-label">Custo:</label>
                <input type="text" name="custo[]" id="inputCusto" class="form-control">
            </div>
        </div>
        <div id="divCop" class=" row ">
            <div class="col-md-4">
                <label for="inputVariacao" class="form-label">Variação:</label>
                <div class="input-group ">
                    <input type="text" name="variacao[]" id="inputVariacao" class="form-control">
                    <button type="button" id="btnVariacao" class="btn btn-primary ml-3">+ Variação</button>
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputQuantidade" class="form-label">Quantidade:</label>
                <input type="text" name="quantidade[]" id="inputQuantidade" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                <input type="text" name="quantFaturado[]" id="inputQuantFaturado" class="form-control">
            </div>
        </div>
        <div id="spaceButton"></div>
        <div class="row  mt-5">
            <div class="col-md-6">
                <div class="form-floating">
                    <label for="floatingTextarea">Detalhes da Não Conformidade:</label>
                    <textarea class="form-control" name="datalhes[]" placeholder="Digite..." id="floatingTextarea" style="height: 100px;"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputDestinacao">Destinação:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="Fornecedor" name="destinacao[]" id="fornecedor">
                    <label class="form-check-label" for="fornecedor">Fornecedor</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="Descarte" name="destinacao[]" id="descarte">
                    <label class="form-check-label" for="descarte">Descarte</label>
                </div>
            </div>
            <div>
                <div>
                    <div class="mt-3">
                        <label for="inputImagem" class="form-label">Evidências Fotográficas:</label>
                        <input class="form-control w-100" name="image[]" accept="image/png, image/jpg, image/jpeg" type="file" id="inputImagem" multiple>
                    </div>
                    <div>
                        <div id="previaImagens"></div>
                    </div>
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
    <div id="messageContainer"></div>

</form>

<script>
    $(document).ready(function() {
        $("#btnVariacao").click(function(e) {
            e.preventDefault();
            $("#spaceButton").prepend(`
            <div class="d-flex row justify-content-around remove">
                <div class="col-md-4">
                    <label for="inputVariacao" class="form-label">Variação:</label>
                    <div class="input-group">
                        <input type="text" name="variacao[]" class="form-control">
                        <button type="button" class="remove_item_btn btn btn-danger ml-3">- Remover</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="inputQuantidade" class="form-label">Quantidade:</label>
                    <input type="text" name="quantidade[]" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                    <input type="text" name="quantFaturado[]" class="form-control">
                </div>
            </div>
        `);
        });

        $("#btnProduto").click(function(e) {
            e.preventDefault();
            $(".containerProduto").prepend(`
            <div class="removeProduto">
                <div class="mt-4">
                    <h5>Produto não conformes</h5>
                    <hr>
                </div>
                <div class="container w-75 d-flex flex-column justify-content-between">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputNomeProduto" class="form-label">Nome Produto:</label>
                            <input type="text" name="nomeProduto[]" id="inputNomeProduto" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCodRef" class="form-label">Código Referência:</label>
                            <input type="text" name="codigoRef[]" id="inputCodRef" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCodFut" class="form-label">Código FutFanatics:</label>
                            <input type="text" name="codigoFut[]" id="inputCodFut" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputValorUnit" class="form-label">Valor Unitário:</label>
                            <input type="text" name="valorUnit[]" id="inputValorUnit" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="inputQuantTotal" class="form-label">Quantidade Total:</label>
                            <input type="text" name="quantTotal[]" id="inputQuantTotal" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCusto" class="form-label">Custo:</label>
                            <input type="text" name="custo[]" id="inputCusto" class="form-control">
                        </div>
                    </div>
                    <div id="divCop" class="row">
                        <div class="col-md-4">
                            <label for="inputVariacao" class="form-label">Variação:</label>
                            <div class="input-group">
                                <input type="text" name="variacao[]" id="inputVariacao" class="form-control">
                                <button type="button" id="btnVariacaoOpicional" class="btn btn-primary ml-3">+ Variação</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputQuantidade" class="form-label">Quantidade:</label>
                            <input type="text" name="quantidade[]" id="inputQuantidade" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                            <input type="text" name="quantFaturado[]" id="inputQuantFaturado" class="form-control">
                        </div>
                    </div>
                    <div id="spaceButtonOpicional"></div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <label for="floatingTextarea">Detalhes da Não Conformidade:</label>
                                <textarea class="form-control" name="datalhes[]" placeholder="Digite..." id="floatingTextarea" style="height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputDestinacao">Destinação:</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="Fornecedor" name="destinacao[]" id="fornecedor">
                                <label class="form-check-label" for="fornecedor">Fornecedor</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="Descarte" name="destinacao[]" id="descarte">
                                <label class="form-check-label" for="descarte">Descarte</label>
                            </div>
                        </div>
                        <div>
                            <div class="mt-3">
                                <label for="inputImagemOpicional" class="form-label">Evidências Fotográficas:</label>
                                <input class="form-control w-100" name="image[]" accept="image/png, image/jpg, image/jpeg" type="file" id="inputImagemOpicional" multiple>
                            </div>
                            <div>
                                <div id="previaImagensOpicional"></div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="col-md-6">
                                    <button type="button" id="btnProdutoRemove" class="btn btn-danger w-75">- Remover</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
        });

        $(document).on("change", "#inputImagem", function(e) {
            e.preventDefault();
            var files = e.target.files;
            var div = document.getElementById("previaImagens");
            div.innerHTML = "";
            for (var i = 0; i < files.length; i++) {
                var img = document.createElement("img");
                img.src = URL.createObjectURL(files[i]);
                img.style.width = "150px";
                img.style.height = "150px";
                div.appendChild(img);
            }
        });

        $(document).on("click", "#btnVariacaoOpicional", function(e) {
            e.preventDefault();
            $("#spaceButtonOpicional").prepend(`
            <div class="d-flex row justify-content-around remove">
                <div class="col-md-4">
                    <label for="inputVariacao" class="form-label">Variação:</label>
                    <div class="input-group">
                        <input type="text" name="variacao[]" class="form-control">
                        <button type="button" class="remove_item_btn btn btn-danger ml-3">- Remover</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="inputQuantidade" class="form-label">Quantidade:</label>
                    <input type="text" name="quantidade" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                    <input type="text" name="quantFaturado" class="form-control">
                </div>
            </div>
        `);
        });

        $(document).on("click", "#btnProdutoRemove", function(e) {
            e.preventDefault();
            $(this).closest('.removeProduto').remove();
        });

        $(document).on("click", ".remove_item_btn", function(e) {
            e.preventDefault();
            $(this).closest('.remove').remove();
        });

        $("#btnCadastrar").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "/relatorio",
                type: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response['campos vazios'].length > 0) {
                        alert('Os seguintes campos estão vazios:');
                        response['campos vazios'].forEach(function(campo) {
                            $('#reportForm').find(`[name="${campo}"]`).css('border', '1px solid red');
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>