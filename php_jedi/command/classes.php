<?php

class Luz {

    private $status;

    public function ligar() {
        $this->status = "On";
    }
    public function desligar() {
        $this->status = "Off";
    }
    public function getStatus() {
        return $this->status;
    }

}

class LuzOnCommand {
    private $luz;

    public function __construct(Luz $luz) {
        $this->luz = $luz;
    }
    public function execute() {
        $this->luz->ligar();
    }
}

class LuzOffCommand {
    private $luz;

    public function __construct(Luz $luz) {
        $this->luz = $luz;
    }
    public function execute() {
        $this->luz->desligar();
    }
}

function callCommand($c) {
    $c->execute();
}

?>