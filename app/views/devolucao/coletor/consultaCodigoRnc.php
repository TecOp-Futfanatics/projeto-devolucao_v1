<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .header {
            display: flex;
            justify-content: space-around;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin: 0;
            display: flex;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
        }

        .alocarBtn {
            width: 100px;
            height: 40px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        .btnAlocar {
            display: flex;
            justify-content: center;
        }

        .table-container {
            max-height: 300px;
            /* Defina a altura máxima desejada */
            overflow-y: auto;
            /* Adiciona overflow vertical */
        }
    </style>
</head>

<body>

    <div class="header">
        <div>
            <a href="/alocacaoproduto">Voltar</a>
        </div>
        <div>
            <h6><?php echo $rnc[0]['rel_rnc']; ?></h6>
        </div>
    </div>
    <div class="container">
    <p>Verificar produtos</p>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Variacao</th>
                    <th>Quant.</th>
                </tr>
            </thead>
            <tbody class="scrollable-tbody">
                <?php foreach ($rnc as $r) : ?>
                    <tr>
                        <td><?php echo $r['pro_cod_futfanatics']; ?></td>
                        <td><?php echo $r['pro_variacao']; ?></td>
                        <td><?php echo $r['pro_quantidade']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="btnAlocar">
        <a class="alocarBtn" href="/alocacaoproduto">Alocar</a>
    </div>
</div>
</body>

</html>