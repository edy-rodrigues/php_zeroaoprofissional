<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de Arquivos</title>
</head>
<body>

<h2>Enviar apenas um Arquivo</h2>
<form action="recebeArquivo.php" method="POST" enctype="multipart/form-data">
    Arquivo: <br/>
    <input type="file" name="txt-arquivo"><br/><br/>
    <input type="submit" value="Enviar">
</form>

<br/><br/>

<h2>Enviar Múltiplos Arquivos</h2>
<form action="recebeMultiploArquivos.php" method="POST" enctype="multipart/form-data">
    Arquivo: <br/>
    <input type="file" name="txt-mArquivo[]" multiple><br/><br/>
    <input type="submit" value="Enviar">
</form>

</body>
</html>