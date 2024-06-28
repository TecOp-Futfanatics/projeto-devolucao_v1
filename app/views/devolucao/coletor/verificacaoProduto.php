<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<div>
    <h6><?php echo $rnc ?></h6>
</div>
<form action="/verificacaoproduto" method="POST">
    <p>codigo:</p>
    <?php echo  $contador . "/" .  $quantProduto[0]['total']?>
    <input type="text" name="codigo">
    <input type="hidden"  name="rnc" value="<?php echo $rnc?>">
</form>

<a href="/alocacaoproduto">Voltar</a>

<?php if (isset($success)) : ?>
    <p><?php echo $success; ?></p>
<?php elseif (isset($error)) : ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>

<script>
    $('#rnc').on('keypress', function(event) {
        console.log(event.which);
        if (event.which == 13) {
            event.preventDefault();
        }
    });
</script>