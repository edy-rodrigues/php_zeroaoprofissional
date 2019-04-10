<?php

interface APIDesenho {

    public function desenharCirculo($x, $y, $radio);

}

class APIDesenho1 implements APIDesenho {
    public function desenharCirculo($x, $y, $radio) {
        echo "Desenhando Círculo, v1: ". $x. " - ". $y . " - ". $radio;
    }
}

class APIDesenho2 implements APIDesenho {
    public function desenharCirculo($x, $y, $radio) {
        echo "Desenhando Círculo, v2: ". $x ." - ". $y ." - ". $radio;
    }
}

class APIDesenhoFrances implements APIDesenho {
    public function desenharCirculo($x, $y, $radio) {
        echo "Drawing Círculo: ". $x ." - ". $y ." - ". $radio;
    }
}

abstract class Forma {

    protected $api, $x, $y;

    public function __construct(APIDesenho $api) {
        $this->api = $api;
    }

}

class Circulo extends Forma {

    protected $radio;

    public function __construct($x, $y, $radio, APIDesenho $api) {
        parent::__construct($api);
        $this->x = $x;
        $this->y = $y;
        $this->radio = $radio;
    }

    public function desenhar() {
        $this->api->desenharCirculo($this->x, $this->y, $this->radio);
    }
}

$circulo = new Circulo(1, 3, 7, new APIDesenhoFrances());
$circulo->desenhar();

?>