<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Aula PHP - 022</title>
</head>
<body>
    <form id="formulario" action="processar.php" method="post" enctype="multipart/form-data">
        <h3>Formulário</h3><br><hr><br>
        Nome: <input type="text" name="name" id="name"><br><br>
        <small>Envie uma foto:</small><br>
        <input type="file" name="arquivo" id="arquivo">
        <br><br>
        <input type="submit" id="botao" value="Enviar">
    </form>
</body>
</html>