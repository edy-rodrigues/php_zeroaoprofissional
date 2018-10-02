<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto PDF</title>
</head>
<body>
<?php
ob_start();
?>
<h1>Relatório</h1>
<table border="1" width="100%">
    <tr>
        <th>Nome</th>
        <th>Salário</th>
        <th>Data</th>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
    <tr>
        <td>Edinei</td>
        <td>700,00</td>
        <td>10/10/2018</td>
    </tr>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once "vendor/autoload.php";

$nome_arquivo = md5(time()."projetoPDF").".pdf";

$Mpdf = new \Mpdf\Mpdf();
$Mpdf->WriteHTML($html);
$Mpdf->Output($nome_arquivo, "F"); // I = Exibi no Navegador, D = Download, F = Salva no servidor
$link = "http://phpzeroaoprofissional.pc:8080/phpSuperAvancado/projetoPdf/".$nome_arquivo;

echo "Faça download do pdf: ". $link;
?>
</body>
</html>