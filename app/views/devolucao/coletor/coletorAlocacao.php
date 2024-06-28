<?php
// Supondo que você tenha uma variável que indica se houve um erro
$erroLogin = isset($msg);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Alocação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        
        .container {
            width: 100%;
            max-width: 320px; /* Aproximadamente 6,7 cm */
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .form-label {
            font-size: 1em;
            margin-bottom: 0.2em;
        }

        .form-control {
            font-size: 0.9em;
        }

        .btn {
            font-size: 1em;
        }

        /* Estilo para erro de login */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($erroLogin) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <form id="form" action="/loginAlocacao" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Usuário:</label>
                <input type="text" class="form-control" value="Rodrigo" id="nome" name="login">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" value="123" id="senha" name="senha">
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
