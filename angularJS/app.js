var app = angular.module('meuApp', [])

app.controller('meuCtrl', function($scope) {
    $scope.nome = "Testador"
    $scope.sobrenome = "Sobre Testador"
    $scope.cor = "darkcyan"
    $scope.real = "15"
})