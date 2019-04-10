function Animal(raca, nome, idade, peso) {
    this.raca = raca
    this.nome = nome
    this.idade = idade
    this.peso = peso

    this.andar = function() {
        console.log("Andando")
        this.peso -= 0.2
    }

    this.comer = function() {
        console.log("Comendo");
        this.peso += 0.2
    }

}

var tay = new Animal('Vira-lata', 'Tay', 8, 15)
var pan = new Animal('Salsicha', 'Pan', 14, 7)