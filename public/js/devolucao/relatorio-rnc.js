// Objetivo: Script para adicionar campos dinamicamente no formulário de relatório de RNC
$(document).ready(function () {

    $("#selectOrigem").on("change", function () {
        let valor = $("#selectOrigem").val();
        if (valor == 4) {
            $("#divFornecedor").show();
        } else {
            $("#divFornecedor").hide();
        }

    })

    $("#inputMarca").on("change", function () {
        let fornecedor = $("#inputMarca").val();
        $.ajax({
            url: "/fornecedor",
            type: "POST",
            data: { marca: fornecedor },
            success: function (data) {
                var statusSelect = $('#selectFornecedor');
                statusSelect.empty();
                dados = JSON.parse(data);

                $.map(dados, function (obj) {
                    statusSelect.append($('<option>', {
                        value: obj.for_id,
                        text: obj.for_fornecedor
                    }));
                });

                statusSelect.on('change', function () {
                    var selectedFornecedorId = $(this).val();
                    var selectedFornecedor = dados.find(f => f.for_id == selectedFornecedorId);
                    if (selectedFornecedor) {
                        $("#inputCnpj").val(selectedFornecedor.for_cnpj);
                    } else {
                        $("#inputCnpj").val('');
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Erro na requisição AJAX:", error);
            }
        });
    });

    $("#btnVariacao").click(function (e) {
        e.preventDefault();
        let newField = $(`
            <div class="d-flex row justify-content-around remove">
                <div class="col-md-4">
                    <label for="inputVariacao" class="form-label">Variação:</label>
                    <div class="input-group">
                        <input type="text" name="variacao[]" class="form-control" required>
                        <button type="button" class="remove_item_btn btn btn-danger ml-3">- Remover</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="inputQuantidade" class="form-label">Quantidade:</label>
                    <input type="text" name="quantidade[]" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                    <input type="text" name="quantFaturado[]" class="form-control" required>
                </div>
            </div>
        `);
        $("#spaceButton").prepend(newField);

        // Adicionar regras de validação para novos campos
        newField.find('input').each(function () {
            $(this).rules('add', {
                required: true
            });
        });
    });

    $("#btnProduto").click(function (e) {
        e.preventDefault();
        let newProduct = $(`
            <div class="removeProduto">
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
                                <button type="button" id="btnVariacaoOpicional" class="btn btn-primary ml-3">+ Variação</button>
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
                    <div id="spaceButtonOpicional"></div>
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
        $(".containerProduto").prepend(newProduct);

        // Adicionar regras de validação para novos campos
        newProduct.find('input, textarea, select').each(function () {
            $(this).rules('add', {
                required: true
            });
        });
    });

    $(document).on("change", "#inputImagem", function (e) {
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

    $(document).on("click", "#btnVariacaoOpicional", function (e) {
        e.preventDefault();
        let newOptionalField = $(`
            <div class="d-flex row justify-content-around remove">
                <div class="col-md-4">
                    <label for="inputVariacao" class="form-label">Variação:</label>
                    <div class="input-group">
                        <input type="text" name="variacao[]" class="form-control" required>
                        <button type="button" class="remove_item_btn btn btn-danger ml-3">- Remover</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="inputQuantidade" class="form-label">Quantidade:</label>
                    <input type="text" name="quantidade[]" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="inputQuantFaturado" class="form-label">Quantidade Faturado:</label>
                    <input type="text" name="quantFaturado[]" class="form-control" required>
                </div>
            </div>
        `);
        $("#spaceButtonOpicional").prepend(newOptionalField);

        // Adicionar regras de validação para novos campos
        newOptionalField.find('input').each(function () {
            $(this).rules('add', {
                required: true
            });
        });
    });

    $(document).on("click", "#btnProdutoRemove", function (e) {
        e.preventDefault();
        $(this).closest('.removeProduto').remove();
    });

    $(document).on("click", ".remove_item_btn", function (e) {
        e.preventDefault();
        $(this).closest('.remove').remove();
    });

    $(document).ready(function () {
        $("#form").validate({
            rules: {
                marca: { required: true },
                fornecedor: { required: true },
                cnpj: { required: true },
                or: { required: true },
                nf: { required: true },
                emissao: { required: true },
                dataAvaria: { required: true },
                QuantReprovado: { required: true },
                origem: { required: true },
                "nomeProduto[]": { required: true },
                "codigoRef[]": { required: true },
                "codigoFut[]": { required: true },
                "valorUnit[]": { required: true },
                "quantTotal[]": { required: true },
                "custo[]": { required: true },
                "variacao[]": { required: true },
                "quantidade[]": { required: true },
                "quantFaturado[]": { required: true },
                "detalhes[]": { required: true },
                "destinacao[]": { required: true },
                "image[]": { required: true }
            },
            errorPlacement: function (error, element) {
                // Não inserir mensagens de erro
            },
            highlight: function (element) {
                $(element).addClass('error-input');
            },
            unhighlight: function (element) {
                $(element).removeClass('error-input');
            }
        });
    });

    $("#alertMessage").delay(5000).fadeOut("slow");

});