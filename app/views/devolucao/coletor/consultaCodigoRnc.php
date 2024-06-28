<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;

        }

        table {
            border-collapse: collapse;
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
    <div>
        <p>Verificar produtos</p>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Variacao</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
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
    </div>
</body>

</html>