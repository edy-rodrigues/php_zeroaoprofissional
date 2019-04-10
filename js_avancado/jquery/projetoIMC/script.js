$(function() {
    $('#btn-calcular').on('click', function(e) {
        e.preventDefault();
        var altura = $('#txt-altura').val();
        var peso = $('#txt-peso').val();

        altura = altura.replace(',', '.');
        peso = peso.replace(',', '.');

        // IMC = peso + altura²
        var imc = peso / (altura * altura)

        if(imc < 16) {
            var texto = 'Baixo peso muito grave'
        } else if(imc >= 16 && imc < 16.99) {
            var texto = 'Baixo peso grave'
        } else if(imc >= 17 && imc < 18.49) {
            var texto = 'Baixo peso'
        } else if(imc >= 18.50 && imc < 24.99) {
            var texto = 'Peso normal'
        } else if(imc >= 25 && imc < 299.99) {
            var texto = 'Sobrepeso'
        } else if(imc >= 30 && imc < 34.99) {
            var texto = 'Obesidade grau I'
        } else if(imc >= 35 && imc < 39.99) {
            var texto = 'Obesidade grau II'
        } else if(imc >= 40) {
            var texto = 'Obesidade grau III'
        }

        $('#resultado').text('Seu IMC é: '+ imc +' kg/m² e seu status é: '+ texto)
    })
})