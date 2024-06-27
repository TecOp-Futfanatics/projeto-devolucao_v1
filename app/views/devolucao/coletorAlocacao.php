<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/devolucao/coletorAlocacao.css">
</head>
<body>
    <nav class="classHeader navbar navbar-light bg-primary d-flex justify-content-center">
        <figure>
            <img src="/img/iconTecOp.png" width="40" height="40">
        </figure>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 id="textLogin" class="text-center">Login</h1>
            </div>
        </div>
        <div class="divMsg row">
            <div class="col-12">
                <?php if (isset($msg)) : ?>
                    <p class="alert alert-danger text-center"><?php echo $msg; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <form class="w-75" id="form" action="/loginAlocacao" method="POST">
                        <div class="input-group input-group-sm mb-3">
                            <label for="nome" class="form-label">Usuário:</label>
                            <input type="text" class="form-control w-100" id="nome" name="login" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control w-100" id="senha" name="senha" >
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
