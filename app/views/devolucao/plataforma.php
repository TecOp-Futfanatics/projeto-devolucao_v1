<?php $this->layout("master"); ?>

<div class="d-flex justify-content-center" style="margin-bottom:50px;">
    <h1>Plataformas</h1>
</div>




<!-- GATILHO DO MODAL -->
<div class="d-flex flex-row mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">Cadastrar Plataforma</button>
</div>

<div class="d-flex justify-content-center">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fornecedor</th>
                <th>Usuario</th>
                <th>Senha</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($plataformas as $plataforma): ?>
            <tr>
               <td><?php echo $plataforma['id'] ?></td>
               <td><a href="<?php echo 'o link deve estar aqui'; ?>"></a></td>
               <td><?php echo '' ?></td>
               <td></td>
               <td><ion-icon name="create" size="large"></ion-icon></td>
               <td><ion-icon name="trash" size="large"></ion-icon></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Plataforma</h1>
      </div>
      <div class="modal-body">

        <form action="/plataforma" method="post">
            <input class="form-control mb-3"  type="text" placeholder="Insira o LINK da plataforma" name="linkFornecedor">
            <input  class="form-control mb-3" type="text" placeholder="Insira o NOME do fornecedor" name="nomeFornecedor">
            <input  class="form-control mb-3" type="text" placeholder="Usuario" name="usuarioPlataforma">
            <input class="form-control mb-3" type="text" placeholder="Senha" name="senhaPlataforma">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>