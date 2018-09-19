<?php

class Calculadora {

    private $n;

    public function __construct($n) {
        $this->n = $n;
    }

    public function somar($n) {
        $this->n += $n;
        return $this;
    }

    public function subtrair($n) {
        $this->n -= $n;
        return $this;
    }

    public function multiplicar($n) {
        $this->n *= $n;
        return $this;
    }

    public function dividir($n) {
        $this->n /= $n;
        return $this;
    }

    public function resultado() {
        return $this->n;
    }

}

$calc = new Calculadora(10);

$calc->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);
$resultado = $calc->resultado();

echo "Resultado é: ". $resultado;


// echo "2 + 10 = ". $calc->somar(2, 10)."<br>";
// echo "2 - 10 = ". $calc->subtrair(2, 10)."<br>";
// echo "2 x 10 = ". $calc->multiplicar(2, 10)."<br>";
// echo "2 / 10 = ". $calc->dividir(2, 10)."<br>";

?>