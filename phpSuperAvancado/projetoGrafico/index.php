<?php
$vendas = array(10, 15, 5 ,40);
$custos = array(30, 10, 15, 5);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto Gráficos</title>
</head>
<body>

    <div style="width:500px">
        <canvas id="grafico"></canvas>
    </div>

    <script src="Chart.min.js"></script>
    <script>
        window.onload = function() {
            var context = document.getElementById("grafico").getContext("2d")
            new Chart(context, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr'],
                    datasets: [{
                        label: 'Vendas',
                        backgroundColor: 'darkcyan',
                        borderColor: 'darkcyan',
                        data: [<?php echo implode(",", $vendas); ?>],
                        fill: false
                    }, {
                        label: 'Custos',
                        backgroundColor: '#1e90ff',
                        borderColor: '#1e90ff',
                        data: [<?php echo implode(",", $custos); ?>],
                        fill: false
                    }],
                }
            })
        }
    </script>
</body>
</html>