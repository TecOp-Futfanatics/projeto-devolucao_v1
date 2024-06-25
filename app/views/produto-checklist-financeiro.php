<?php $this->layout("master"); ?>


<div class="d-flex justify-content-center" style="margin-bottom:50px;">
    <h1>Checklist Financeiro</h1>
</div>

<div class="d-flex justify-content-center" style="margin-bottom:50px;">
    <h4>Itens da checklist</h4>
</div>

<!-- GATILHO DO MODAL -->
<div class="d-flex flex-row mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formulario">Inserir produto</button>
</div>


<div class="d-flex justify-content-center">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>CÓDIGO+VARIAÇÃO</th>
                <th>N° DA NF</th>
                <th>QNTD FATURADA</th>
                <th>QNTD A DEVOLVER</th>
                <th>VALOR UNITÁRIO</th>
                <th>SUBTOTAL</th>
                <th>DEPÓSITO</th>
                <th>ALTERAR</th>
                <th>EXCLUIR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td><ion-icon name="create" size="large"></ion-icon></td>
               <td><ion-icon name="trash" size="large"></ion-icon></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-start">
    <button class="btn btn-primary">SALVAR</button>
    <button class="btn btn-primary" style="margin-left:5px;">GERAR PDF</button>
</div>


<!-- MODAL -->
<div class="modal fade" id="formulario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir Produto</h1>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Fechar</button>
      </div>
      <div class="modal-body">

        <form action="/produto-checklist-financeiro" method="post">
            <input class="form-control mb-3"  type="text" placeholder="Codigo + Variação">
            <input  class="form-control mb-3" type="text" placeholder="N° da NF">
            <input class="form-control mb-3" type="text" placeholder="QNTD Faturada">
            <input class="form-control mb-3" type="text" placeholder="QNTD a Devolver">
            <input type="text" class="form-control mb-3" placeholder="Valor unitário">
            <input type="text" class="form-control mb-3" placeholder="IPI">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>