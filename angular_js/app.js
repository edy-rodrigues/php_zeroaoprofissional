var app = angular.module('meuApp', [])

app.controller('meuCtrl', function($scope, $http) {
    $scope.nome = "Testador"
    $scope.sobrenome = "Sobre Testador"
    $scope.cor = "darkcyan"
    $scope.real = "15"
    $scope.ingredientes = [
        {'nome': 'Farinha', 'qt': '200g'},
        {'nome': 'Ovo', 'qt': '3 un.'},
        {'nome': 'Chocolate', 'qt': '500g'}
    ]
    $scope.filtrarPor = 'o'
    $scope.nomes = [
        {nome: 'Edinei', pais: 'Brasil'},
        {nome: 'Giovanna', pais: 'Brasil'},
        {nome: 'Matheus', pais: 'Japão'},
        {nome: 'Bia', pais: 'Estados Unidos'},
        {nome: 'Diego', pais: 'Japão'},
        {nome: 'Jesus', pais: 'Estados Unidos'},
        {nome: 'Passáro', pais: 'Brasil'}
    ]
    $scope.filtrarPorNome = 'a'
    $scope.ordenarPor = 'nome'
    $scope.ordenarArray = Object.keys($scope.nomes[0])
    $scope.pessoas = []
    $scope.url = 'http://phpdozeroaoprofissional.com.br/testeangularjs.php'
    $http.get($scope.url).then(function(response) {
        $scope.pessoas = response.data.resultado
    })
    $scope.hora = 18
    $scope.contador = 0
    $scope.adicionar = (qt) => {
        $scope.contador += qt
    }
    $scope.lista = new Array('Leite', 'Pão')
    $scope.aviso = ''
    $scope.addItem = () => {
        $scope.aviso = ''
        if($scope.addTexto != '') {
            if($scope.lista.indexOf($scope.addTexto) == -1) {
                $scope.lista.push($scope.addTexto)
            } else {
                $scope.aviso = 'Este item já adicionado'
            }
        } else {
            $scope.aviso = 'Não é permitido inserir um item vazio'
        }

        $scope.addTexto = ''
    }
    $scope.removeItem = index => {
        $scope.aviso = ''
        $scope.addTexto = ''
        $scope.lista.splice(index, 1)
    }
})