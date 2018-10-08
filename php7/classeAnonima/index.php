<?php

// Pré-PHP7
// class Carro {

//     public function getName() {
//         return "Carro 1.0";
//     }

// }

// $Carro = new Carro();
// echo $Carro->getName();

// Pós-PHP7
// $Carro = new class {

//     public function getName() {
//         return "Carro 2.0";
//     }

// };

// echo $Carro->getName();

// function criar_carro() {
//     return new class {
//         public function getName() {
//             return "Carro 3.0";
//         }
//     };
// }

// $Carro = criar_carro();
// echo $Carro->getName();

class Automovel {
    private $carro;

    public function setCarro($carro) {
        $this->carro = $carro;
    }

    public function getName() {
        return $this->carro->getName();
    }
}

// class Carro {
//     public function getName() {
//         return "Carro 4.0";
//     }
// }

$Automovel = new class {
    private $carro;

    public function setCarro($carro) {
        $this->carro = $carro;
    }

    public function getName() {
        return $this->carro->getName();
    }
};
// $Carro = new Carro();
$Automovel->setCarro(new class {
    public function getName() {
        return "Carro 5.0";
    }
});
echo $Automovel->getName();

?>