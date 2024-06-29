<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Alocação</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        .container{
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .containerInput {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #rnc
        {
            width: 100%;
            height: 30px;
        }

        .button{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        #button{
            width: 100px;
            height: 40px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .alert{
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            border: 1px solid #f5c6cb;
        }
        .msgAlerta{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (isset($msg)) : ?>
            <div class="alert">
                <p class="msgAlerta"><?php echo $msg; ?></p>
            </div>
        <?php endif; ?>
        <form id="form" action="/alocacaoproduto" method="POST">
            <div class="containerInput">
                <div class="inputRnc">
                    <label for="rnc">rnc:</label>
                    <input type="text" id="rnc" name="rnc" required>
                </div>
                <div class="button">
                    <button id="button">Consultar</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#form').submit(function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>

</html>