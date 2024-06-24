<?php $this->layout("master"); ?>

<div class="d-flex justify-content-center" style="margin-bottom:50px;">
    <h1>CHECKLIST FINANCEIRO</h1>
</div>

<form action="/checklist-financeiro" method="post">
    <div class="d-flex justify-content-around">
        <div>
            <h6>FORMA DE ABATIMENTO FINANCEIRO</h6>
            <div>    
                <label for="geracaoDeBoleto">Geração de boleto</label>
                <input type="checkbox" value="Geração de boleto" name="formaDeAbatimento" id="geracaoDeBoleto">
            </div>
            <div>    
                <label for="abatimentoDuplicado">Abatimento duplicado</label>
                <input type="checkbox" value="Abatimento duplicado" name="formaDeAbatimento" id="abatimentoDuplicado">
            </div>
            <div>    
                <label for="compSobraFalta">Comp sobra/ falta</label>
                <input type="checkbox" value="Comp sobra/ falta" name="formaDeAbatimento" id="compSobraFalta">
            </div>
        </div>
        <div>
            <h6>MOTIVO DA DEVOLUÇÃO</h6>
            <div>
                <label for="desacordoComercial">Desacordo Comercial</label>
                <input type="checkbox" value="geração de boleto" name="motivoDaDevolucao" id="geracaoDeBoleto">
            </div>
            <div>
                <label for="produtosDanificados">Produtos danificados</label>
                <input type="checkbox" value="produtos danificados" name="motivoDaDevolucao" id="produtosDanificados">
            </div>
            <div>
                <label for="erroOperacional">Erro operacional</label>
                <input type="checkbox" value="erro operacional" name="motivoDaDevolucao" id="erroOperacional">
            </div>
        </div>
        <div>
            <h6>NATUREZA DA OPERAÇÃO</h6>
            <div>
                <label for="notaFiscalDevolucao">NF devolução</label>
                <input type="checkbox" value="nota fiscal devolucao" name="naturezaDaOperacao" id="notaFiscalDevolucao">
            </div>
            <div>
                <label for="notaFiscalConserto">NF conserto</label>
                <input type="checkbox" value="nota fiscal conserto" name="naturezaDaOperacao" id="notaFiscalConserto">
            </div>
           <!--<div>
                <label for="outrosMotivos">Outros motivos:</label>
                <textarea name="naturezaDaOperacao" id="outrosMotivos"></textarea>
            </div>-->
        </div>
    </div>

    <div style="margin-top: 50px;">
            <div style="margin-bottom: 50px;">
                <h5>Dados da transportadora</h5>
            </div>
            <div class="d-flex flex-row justify-content-around">
                <div class="p2">
                    <label for="cnpjTransportadora">CNPJ</label>
                    <input type="text" id="cnpjTransportadora" name="cnpjDaTransportadora">
                </div>
                <div class="p2">
                    <label for="razaoSocial">Razão social</label>
                    <input type="text" id="razaoSocial" name="razaoSocial">
                </div>
                <div class="p2">
                    <label for="informacoesAdicionais">Informaçoes Adicionais</label>
                    <textarea id="informacoesAdicionais" name="informacoesAdicionais"></textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit">INSERIR PRODUTOS</button>
        </div>
    </div>
</form>