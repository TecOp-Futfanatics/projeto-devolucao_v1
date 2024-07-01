<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação Codigo</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .header {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .containerInput {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #codigo {
            width: 100%;
            height: 30px;
        }

        .button {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        #button {
            width: 100px;
            height: 40px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
        }

        .msgAlerta {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alertSuc {
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
        }

        .msgAlertaSuc {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div>
                <a href="/alocacaoproduto">Voltar</a>
            </div>
            <div>
                <h6><?php echo $rnc[0]['rel_rnc']; ?></h6>
            </div>
        </div>
        <?php if (isset($msg)) : ?>
            <div class="alert">
                <p class="msgAlerta"><?php echo $msg; ?></p>
            </div>
        <?php elseif (isset($sucesso)) : ?>
            <div class="alertSuc">
                <p class="msgAlertaSuc"><?php echo $sucesso; ?></p>
            </div>
        <?php endif; ?>
        <form id="form" action="/verificacaoCodigo" method="POST">
            <div class="containerInput">
                <input type="hidden" name="rnc" value="<?php echo $rnc[0]['rel_rnc'];  ?>" >
                <div class="inputCodigo">
                    <label for="codigo">Codigo:</label>
                    <input type="text" id="codigo" name="codigo" required>
                </div>
                <div class="button">
                    <button id="button" type="submit">
                        Consultar
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let form = document.getElementById('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let codigo = document.getElementById('codigo').value;
            console.log(codigo);
        })
    </script>
</body>

</html>