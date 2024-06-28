<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        body {
            max-width: 300px;
        }

        .container {
            margin-top: 10%;
        }

        #form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #inputRnc {
            margin-bottom: 20px;
        }

        #inputRnc label {
            font-weight: bold;
        }

        #inputRnc input {
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            border: none;
            border-radius: 5px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($msg)) : ?>
            <div style="background-color: red; padding: 0.3em; color: white">
                <?= $msg ?>
            </div>
        <?php endif ?>
        <form id="form" action="/alocacaoproduto" method="POST">
            <div id="inputRnc" class="mb-3">
                <label for="nome" class="form-label">RNC:</label>
                <input type="text" class="form-control" id="nome" name="rnc">
            </div>
            <button type="button" class="btn btn-primary w-100">Consultar</button>
        </form>
    </div>
</body>

</html>
<script>
    $('#nome').on('keypress', function(event) {
        console.log(event.which);
        if (event.which == 13) {
            event.preventDefault();
        }
    });
</script>